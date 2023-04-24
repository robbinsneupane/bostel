<?php

class smpl_Contact_Sample
{
    public function getType()
    {
        return 'Contacts';
    }
        
    public function getBody()
    {
        global $locale;
        return '<table style="width: 100%;" border="0" cellspacing="2" cellpadding="2">
        <tbody style="text-align: left;">
        <tr>
        <td valign="top">
        <p> </p>
        </td>
        <td style="font-weight: bold; text-align: right;">$assigned_user_name_company_name<br />$assigned_user_name_address_street<br />$assigned_user_name_address_city, $assigned_user_name_address_state $assigned_user_name_address_postalcode<br /><br /></td>
        </tr>
        </tbody>
        </table>
        <div> </div>
        <div>$contacts_name</div>
        <div>$contacts_company_name</div>
        <div>$contacts_primary_address_street<br /> $contacts_primary_address_city, $contacts_primary_address_state $contacts_primary_address_postalcode</div>
        <div> </div>
        <div>{DATE m/d/Y}</div>
        <div> </div>
        <p>Dear $contacts_first_name,</p>
        <p> </p>
        <p>Thank you for your interest in our products.</p>
        <p> </p>
        <p>Yours sincerely,</p>
        <p> </p>
        <p>$assigned_user_name_name</p>
        <p>$assigned_user_name_email1</p>
        <p>$assigned_user_name_phone_work</p>';
    }

    public function getHeader()
    {
        return '';
    }

    public function getFooter()
    {
        return '';
    }
}
