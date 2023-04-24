<?php

class smpl_Invoice_Sample
{
    public function getType()
    {
        return 'AOS_Invoices';
    }
        
    public function getBody()
    {
        global $locale;
        return '<table style="width: 1039px; font-family: Arial; text-align: center; height: 102px;" border="0" cellspacing="2" cellpadding="2">
        <tbody style="text-align: left;">
        <tr style="text-align: left;">
        <td style="text-align: left;">
        <p><span style="font-size: large;"><strong>$assigned_user_name_company_name</strong></span><br />$assigned_user_name_address_street<br />$assigned_user_name_address_city, $assigned_user_name_address_state $assigned_user_name_address_postalcode</p>
        <p>$assigned_user_name_phone_work</p>
        </td>
        <td style="text-align: right;">
        <p><strong><span style="font-size: xx-large;">INVOICE</span></strong></p>
        <p><span style="font-size: medium;"><strong>Number:</strong> $aos_invoices_number</span></p>
        <p><span style="font-size: medium;"><strong>Created:</strong> $aos_invoices_date_modified</span></p>
        <p><span style="font-size: medium;"><strong>Due Date:</strong> $aos_invoices_due_date</span></p>
        </td>
        </tr>
        </tbody>
        </table>
        <p style="font-family: Arial; text-align: center;"> </p>
        <table style="text-align: center; width: 100%; border: 0pt none; border-spacing: 0pt;">
        <tbody style="text-align: left;">
        <tr style="text-align: left;">
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Prepared For</td>
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;">Prepared By</td>
        </tr>
        <tr style="text-align: left;">
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">
        <div>$aos_invoices_billing_contact<br /> $aos_invoices_billing_address_street<br /> $aos_invoices_billing_address_city, $aos_invoices_billing_address_state $aos_invoices_billing_address_postalcode</div>
        <div>$billing_contact_phone_mobile</div>
        </td>
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;">
        <div>$aos_invoices_modified_by_name</div>
        </td>
        </tr>
        <tr style="text-align: left;">
        <td style="font-weight: bold; background-color: #b0c4de; padding: 2px 6px; border-style: solid; border-width: .5px; vertical-align: top; text-align: left; width: 50%;" colspan="2">Invoice Date</td>
        </tr>
        <tr style="text-align: left;">
        <td style="padding: 2px 6px; border-style: solid; border-width: .5px; width: 50%; vertical-align: top; text-align: left;" colspan="2">
        <div>$aos_invoices_date_entered</div>
        </td>
        </tr>
        </tbody>
        </table>
        <p> </p>
        <table style="width: 100%; border: 0pt none; border-spacing: 0pt;">
        <tbody>
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
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px;" colspan="3">$aos_services_quotes_name</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_list_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_discount</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_unit_price</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_vat</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$aos_services_quotes_service_total_price</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Total</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$total_amt</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Discount</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$discount_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Subtotal</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$subtotal_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Tax</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$tax_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Shipping</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$shipping_amount</td>
        </tr>
        <tr>
        <td colspan="6"> </td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; font-weight: bold; text-align: right;">Grand Total</td>
        <td style="border-style: solid; border-width: .5px; padding: 2px 6px; text-align: right;">$total_amount</td>
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
