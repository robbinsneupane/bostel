<?php

require_once('modules/AOS_PDF_Templates/TemplateSampleService.php');
class smpl_Quote_Group_Sample
{
    public function getType()
    {
        return 'AOS_Quotes';
    }
        
    public function getBody()
    {
        global $locale;
        return '<table style="width: 100%; font-family: Arial; text-align: center;" border="0" cellspacing="2" cellpadding="2">
        <tbody style="text-align: left;">
        <tr style="text-align: left;">
        <td style="text-align: left;">
        <p><strong><span style="font-size: large;">$assigned_user_name_company_name</span></strong></p>
        <p>$assigned_user_name_address_street</p>
        <p>$assigned_user_name_address_city, $assigned_user_name_address_state $assigned_user_name_address_postalcode</p>
        <p>$assigned_user_name_phone_work</p>
        </td>
        <td style="text-align: right;">
        <p><strong> <span style="font-size: xx-large;">QUOTATION</span></strong></p>
        <p><span style="font-size: medium;"><strong>Number:</strong> $aos_quotes_number</span></p>
        <p><span style="font-size: medium;"><strong>Created:</strong> $aos_quotes_date_modified</span></p>
        <p><strong>Valid Until:</strong> $aos_quotes_expiration</p>
        </td>
        </tr>
        </tbody>
        </table>
        <p style="font-family: Arial; text-align: center;"><span style="font-size: xx-small;"> </span></p>
        <table style="text-align: center; width: 100%; border: 0pt none; border-spacing: 0pt;">
        <tbody style="text-align: left;">
        <tr style="text-align: left;">
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Prepared For</td>
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Prepared By</td>
        </tr>
        <tr style="text-align: left;">
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">
        <div>$aos_quotes_billing_contact<br />$aos_quotes_billing_address_street<br />$aos_quotes_billing_address_city, $aos_quotes_billing_address_state $aos_quotes_billing_address_postalcode</div>
        <div>$billing_contact_phone_mobile</div>
        </td>
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">
        <div>$aos_quotes_modified_by_name</div>
        </td>
        </tr>
        <tr style="text-align: left;">
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Quotation Date</td>
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Payment Terms</td>
        </tr>
        <tr style="text-align: left;">
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">
        <div>$aos_quotes_date_entered</div>
        </td>
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">$aos_quotes_term</td>
        </tr>
        </tbody>
        </table>
        <p><span style="font-size: xx-small;"> </span></p>
        <table style="width: 100%; border: 0pt none; border-spacing: 0pt;">
        <tbody>
        <tr>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;" colspan="8">$aos_line_item_groups_name</td>
        </tr>
        <tr>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Description</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Product</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Qty</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">List</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Disc.</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Sale</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Tax</td>
        <td style="border-style: solid; background-color: #b0c4de; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: center;">Total</td>
        </tr>
        <tr>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px;">$aos_products_description $aos_products_quotes_item_description</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px;">$aos_products_quotes_name</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: center;"><span>$aos_products_quotes_product_qty</span></td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_products_quotes_product_list_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_products_quotes_product_discount</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_products_quotes_product_unit_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_products_quotes_vat</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_products_quotes_product_total_price</td>
        </tr>
        <tr>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: left;" colspan="3">$aos_services_quotes_name</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_list_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_discount</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_unit_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_vat</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_total_price</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Total</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_line_item_groups_total_amt</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Discount</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_line_item_groups_discount_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Subtotal</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_line_item_groups_subtotal_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Tax</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_line_item_groups_tax_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Group Total</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_line_item_groups_total_amount</td>
        </tr>
        </tbody>
        </table>
        <table align="right">
        <tbody>
        <tr align="right">
        <td> </td>
        <td> </td>
        </tr>
        <tr>
        <td><span style="font-size: large;"><strong>Grand Total:</strong></span></td>
        <td><span style="font-size: large;">$aos_quotes_total_amount</span></td>
        </tr>
        </tbody>
        </table>';
    }

    public function getHeader()
    {
        return '';
    }

    public function getFooter()
    {
        global $locale;
        return '<table style="width: 100%; border: 0pt none; border-spacing: 0pt;">
<tbody>
<tr>
<td>'.translate('LBL_PAGE', 'AOS_PDF_Templates').' {PAGENO}</td>
<td style="text-align: right;">{DATE '.$locale->getPrecedentPreference('default_date_format').'}</td>
</tr>
</tbody>
</table>';
    }
}
