<?php

/*
 * Created by Taction Software LLC - Copyright 2017
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Global search action view of results
 * 
 */
 
class InboundMessagePanel {
  
    function showPanel()
    {
        global $app_strings,$sugar_config;
        $config_modules=explode(',',$sugar_config['enabled_modules_twilio']);
        
        $module = $_REQUEST['module'];
        if(isset($_REQUEST['record']) && $_REQUEST['record']!='' && in_array($module,$config_modules)){
            $bean_id = $_REQUEST['record'];
            $bean = BeanFactory::getBean($module, $bean_id);
            $smsTo= $bean->phone_alternate;
        }
        // Based on what action we're in, add some buttons!
        if(in_array($module,$config_modules)){
			switch ($GLOBALS['app']->controller->action) 
			{
				case "DetailView": // Add buttons to Detail View
				$related_beans="SELECT * FROM `tac_inbound_message_bean_rel` where bean_id='$bean_id' AND bean_module='$module' and deleted=0";
        $result_related_qry =$GLOBALS['db']->query($related_beans);
		if($GLOBALS['db']->getRowCount($result_related_qry)>0){
			$display_related_beans='<b>Message Log</b><table cellpadding="0" cellspacing="0" width="100%" border="0" class="list View">
			<tbody><tr><td width="1%" nowrap="nowrap" ></td></tr></tbody>
			  <thead>
				<tr height="20">
					<th scope="col" width="30%" data-toggle="true">
							<span sugar="sugar1">
								<div style="white-space: nowrap;" width="100%" align="left">
									Message                    </div>
							</span>
					</th>
					<th scope="col" width="30%" data-hide="phone">
							<span sugar="sugar1">
								<div style="white-space: nowrap;" width="100%" align="left">
									From                    </div>
							</span>
					</th>
					<th scope="col" width="30%" data-hide="phone">
							<span sugar="sugar1">
								<div style="white-space: nowrap;" width="100%" align="left">
									To                    </div>
							</span>
					</th><th scope="col" width="30%" data-hide="phone">
                            <span sugar="sugar1">
                                <div style="white-space: nowrap;" width="100%" align="left">
                                    Status                    </div>
                            </span>
                    </th>
                    <th scope="col" width="30%" data-hide="phone,phonelandscape">
							<span sugar="sugar1">
                            <div style="white-space: nowrap;" width="100%" align="left">
                                   Date           </div>
                            </span>
                    </th>
                    <th scope="col" width="30%" data-hide="phone,phonelandscape">
							<span sugar="sugar1">
                            <div style="white-space: nowrap;" width="100%" align="left">
                                   Date Delivered       </div>
                            </span>
                    </th>
                 </tr>
               </thead>';
                        while($row_bean=$GLOBALS["db"]->fetchByAssoc($result_related_qry)){
                        $record_id = $row_bean['message_id'];
                        $bean = BeanFactory::getBean('tac_inbound_message', $record_id);

                                $display_related_beans .='<tbody><tr><td><a href="index.php?module=tac_inbound_message&amp;action=DetailView&amp;record='.$record_id.'">'.$bean->name.'</a></td><td>'.$bean->from_phone.'</td><td>'.$bean->to_phone.'</td><td>'.$bean->status.'</td><td>'.$bean->date_entered.'</td><td>'.$bean->date_delivered.'</td></tr></tbody>';
                        }

			
			$display_related_beans .='</table><br/></div>';
			echo $display_related_beans;
			}
				
				break;
			}
		}
    }
}
