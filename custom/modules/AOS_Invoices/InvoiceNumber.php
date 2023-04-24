<?php
class InvoiceNumber
{
    public function InvoiceNumberMethod($bean, $event, $arguments)
    {
        //Only execute on new rows
        if ($bean->fetched_row == false) {
            global $db, $timedate, $current_user;

            $date = date('Y-m-d', strtotime($timedate->to_display_date_time($timedate->nowDb(), true, true, $current_user)));

            $year = date("Y", strtotime($date));
            $month = date("m", strtotime($date));

            $countQuery = "SELECT count(aos_invoices.id) as count from aos_invoices
            INNER JOIN securitygroups_records as sgr on sgr.record_id=aos_invoices.id AND sgr.module='AOS_Invoices' 
            INNER JOIN securitygroups_users as sgu on sgu.securitygroup_id=sgr.securitygroup_id AND sgu.user_id='$current_user->id' 
            WHERE year(aos_invoices.date_entered) = $year AND month(aos_invoices.date_entered) = $month";
            $result = $db->query($countQuery);
            $row = $db->fetchByAssoc($result);
            // echo $countQuery;
            $count = $row['count'] + 1;
            while (strlen($count) < 3) {
                $count = '0' . $count;
            }
            $number = 'I-' . $year . $month . '-' . $count;
            // die($number);
            $bean->number = $number;
        }
    }
}
