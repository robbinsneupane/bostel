<?php

require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
require_once('modules/AOS_PDF_Templates/templateParser.php');
require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');

global $sugar_config, $current_user;

$module = isset($_REQUEST['pdf_module']) ? $_REQUEST['pdf_module'] : $_REQUEST['module'];
$bean = BeanFactory::getBean($module);

if (!$bean) {
    sugar_die("Invalid Module");
}

$recordIds = array();

if (isset($_REQUEST['current_post']) && $_REQUEST['current_post'] != '') {
    $order_by = '';
    require_once('include/MassUpdate.php');
    $mass = new MassUpdate();
    $mass->generateSearchWhere($module, $_REQUEST['current_post']);
    $ret_array = create_export_query_relate_link_patch($module, $mass->searchFields, $mass->where_clauses);
    $query = $bean->create_export_query($order_by, $ret_array['where'], $ret_array['join']);
    $result = DBManagerFactory::getInstance()->query($query, true);
    $uids = array();
    while ($val = DBManagerFactory::getInstance()->fetchByAssoc($result, false)) {
        array_push($recordIds, $val['id']);
    }
} else {
    $recordIds = explode(',', $_REQUEST['uid']);
}


$template = BeanFactory::getBean('AOS_PDF_Templates', $_REQUEST['templateID']);

if (!$template) {
    sugar_die("Invalid Template");
}

$file_name = str_replace(" ", "_", $template->name) . ".pdf";

$format = $template->page_size . ($template->orientation === 'Landscape' ? '-L' : '');

$pdf = new mPDF('en', $format, '', 'DejaVuSansCondensed', $template->margin_left, $template->margin_right, $template->margin_top, $template->margin_bottom, $template->margin_header, $template->margin_footer);

foreach ($recordIds as $recordId) {
    $bean->retrieve($recordId);
    $pdf_history = new mPDF('en', $format, '', 'DejaVuSansCondensed', $template->margin_left, $template->margin_right, $template->margin_top, $template->margin_bottom, $template->margin_header, $template->margin_footer);

    $object_arr = array();
    $object_arr[$bean->module_dir] = $bean->id;

    if ($bean->module_dir === 'Contacts') {
        $object_arr['Accounts'] = $bean->account_id;
    }

    $search = array(
        '@<script[^>]*?>.*?</script>@si',        // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',        // Strip out HTML tags
        '@([\r\n])[\s]+@',            // Strip out white space
        '@&(quot|#34);@i',            // Replace HTML entities
        '@&(amp|#38);@i',
        '@&(lt|#60);@i',
        '@&(gt|#62);@i',
        '@&(nbsp|#160);@i',
        '@&(iexcl|#161);@i',
        '@<address[^>]*?>@si'
    );

    $replace = array(
        '',
        '',
        '\1',
        '"',
        '&',
        '<',
        '>',
        ' ',
        chr(161),
        '<br>'
    );

    $text = preg_replace($search, $replace, $template->description);
    $text = preg_replace_callback(
        '/\{DATE\s+(.*?)\}/',
        function ($matches) {
            return date($matches[1]);
        },
        $text
    );
    $header = preg_replace($search, $replace, $template->pdfheader);
    $footer = preg_replace($search, $replace, $template->pdffooter);

    $converted = templateParser::parse_template($text, $object_arr);
    $header = templateParser::parse_template($header, $object_arr);
    $footer = templateParser::parse_template($footer, $object_arr);

    $printable = str_replace("\n", "<br />", $converted);

    ob_clean();
    try {
        $note = new Note();
        $note->modified_user_id = $current_user->id;
        $note->created_by = $current_user->id;
        $note->name = $file_name;
        $note->parent_type = $bean->module_dir;
        $note->parent_id = $bean->id;
        $note->file_mime_type = 'application/pdf';
        $note->filename = $file_name;
        if ($bean->module_dir == 'Contacts') {
            $note->contact_id = $bean->id;
            $note->parent_type = 'Accounts';
            $note->parent_id = $bean->account_id;
        }
        $note->save();

        $fp = fopen($sugar_config['upload_dir'] . 'nfile.pdf', 'wb');
        fclose($fp);

        $pdf_history->SetAutoFont();
        $pdf_history->SetHTMLHeader($header);
        $pdf_history->SetHTMLFooter($footer);
        $pdf_history->WriteHTML($printable);
        $pdf_history->Output($sugar_config['upload_dir'] . 'nfile.pdf', 'F');

        $pdf->SetHTMLHeader($header);
        $pdf->AddPage();
        $pdf->setAutoFont();
        $pdf->SetHTMLFooter($footer);
        $pdf->writeHTML($printable);

        rename($sugar_config['upload_dir'] . 'nfile.pdf', $sugar_config['upload_dir'] . $note->id);
    } catch (mPDF_exception $e) {
        echo $e;
    }
}

$pdf->Output($file_name, "D");
