<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */



class AOS_QuotesViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function AOS_QuotesViewEdit()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function display()
    {
        $this->populateQuoteTemplates();
        parent::display();
    }

    public function populateQuoteTemplates()
    {
        global $app_list_strings, $current_user;

        if ($current_user->is_admin) {
            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted=0 AND type='AOS_Quotes'";
        } else {
            $sql = "SELECT template.id, template.name FROM aos_pdf_templates as template
            INNER JOIN securitygroups_records sgr on sgr.record_id=template.id AND sgr.deleted=0 
            INNER JOIN securitygroups_users sgu on sgu.user_id='$current_user->id' and sgu.securitygroup_id=sgr.securitygroup_id AND sgu.deleted=0 
            WHERE template.deleted=0 AND template.type='AOS_Quotes' AND template.active = 1
            GROUP BY template.id";
        }
        $res = $this->bean->db->query($sql);

        $app_list_strings['template_ddown_c_list'] = array();
        while ($row = $this->bean->db->fetchByAssoc($res)) {
            $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
        }
    }
}
