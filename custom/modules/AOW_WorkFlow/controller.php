<?php
/**
 * Advanced OpenWorkflow, Automating SugarCRM.
 * @package Advanced OpenWorkflow for SugarCRM
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
 *
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Method to getSMSFields
 * 
 */
require_once("modules/AOW_WorkFlow/aow_utils.php");
require_once("modules/AOW_WorkFlow/controller.php");

class CustomAOW_WorkFlowController extends AOW_WorkFlowController {

    protected function action_getSMSField()
    {
        $module = $_REQUEST['aow_module'];
        $aow_field = $_REQUEST['aow_newfieldname'];

        if(isset($_REQUEST['view'])) $view = $_REQUEST['view'];
        else $view= 'EditView';

        if(isset($_REQUEST['aow_value'])) $value = $_REQUEST['aow_value'];
        else $value = '';

        switch($_REQUEST['aow_type']) {
            case 'Record SMS';
                echo '';
                break;
            case 'Related Field':
                $rel_field_list = getRelatedEmailableFields($module);
                if($view == 'EditView'){
                    echo "<select type='text'  name='$aow_field' id='$aow_field' title='' tabindex='116'>". get_select_options_with_id($rel_field_list, $value) ."</select>";
                }else{
                    echo $rel_field_list[$value];
                }
                break;
            case 'Specify User':
                echo getModuleField('Accounts','assigned_user_name', $aow_field, $view, $value);
                break;
            case 'Users':
                echo getAssignField($aow_field, $view, $value);
                break;
            case 'Mobile Number':
            default:
                if($view == 'EditView'){
                    echo "<input id='$aow_field' type='text' tabindex='116' size='25' name='$aow_field' value='$value' onkeypress='javascript:return validatePhone(event,this);'>";
                }else{
                    echo $value;
                }
                break;
        }
        die;

    }



}
