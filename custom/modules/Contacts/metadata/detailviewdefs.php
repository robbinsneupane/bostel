<?php
$viewdefs['Contacts'] =
  array(
    'DetailView' =>
    array(
      'templateMeta' =>
      array(
        'form' =>
        array(
          'buttons' =>
          array(
            'SEND_CONFIRM_OPT_IN_EMAIL' =>
            array(
              'customCode' => '<input type="submit" class="button hidden" disabled="disabled" title="{$APP.LBL_SEND_CONFIRM_OPT_IN_EMAIL}" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'Contacts\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'sendConfirmOptInEmail\'; this.form.module.value=\'Contacts\'; this.form.module_tab.value=\'Contacts\';" name="send_confirm_opt_in_email" value="{$APP.LBL_SEND_CONFIRM_OPT_IN_EMAIL}"/>',
              'sugar_html' =>
              array(
                'type' => 'submit',
                'value' => '{$APP.LBL_SEND_CONFIRM_OPT_IN_EMAIL}',
                'htmlOptions' =>
                array(
                  'class' => 'button hidden',
                  'id' => 'send_confirm_opt_in_email',
                  'title' => '{$APP.LBL_SEND_CONFIRM_OPT_IN_EMAIL}',
                  'onclick' => 'this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'sendConfirmOptInEmail\'; this.form.module.value=\'Contacts\'; this.form.module_tab.value=\'Contacts\';',
                  'name' => 'send_confirm_opt_in_email',
                  'disabled' => true,
                ),
              ),
            ),
            0 => 'EDIT',
            1 => 'DUPLICATE',
            2 => 'DELETE',
            'view_summary' =>
            array(
              'customCode' => '<input type="button" class="button" onClick="window.location=\'index.php?module=Activities&action=Popup&query=true&record={$fields.id.value}&module_name=Contacts&mode=single&create=false\'" value="{$APP.LBL_VIEW_SUMMARY}">',
            ),
            // 3 => 'FIND_DUPLICATES',
            // 4 => 
            // array (
            //   'customCode' => '<input type="submit" class="button" title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}"/>',
            //   'sugar_html' => 
            //   array (
            //     'type' => 'submit',
            //     'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
            //     'htmlOptions' => 
            //     array (
            //       'class' => 'button',
            //       'id' => 'manage_subscriptions_button',
            //       'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
            //       'onclick' => 'this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';',
            //       'name' => 'Manage Subscriptions',
            //     ),
            //   ),
            // ),
            'AOS_GENLET' =>
            array(
              'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_PRINT_AS_PDF}">',
            ),
            'AOP_CREATE' =>
            array(
              'customCode' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'createPortalUser\';" value="{$MOD.LBL_CREATE_PORTAL_USER}"> {/if}',
              'sugar_html' =>
              array(
                'type' => 'submit',
                'value' => '{$MOD.LBL_CREATE_PORTAL_USER}',
                'htmlOptions' =>
                array(
                  'title' => '{$MOD.LBL_CREATE_PORTAL_USER}',
                  'class' => 'button',
                  'onclick' => 'this.form.action.value=\'createPortalUser\';',
                  'name' => 'buttonCreatePortalUser',
                  'id' => 'createPortalUser_button',
                ),
                'template' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
            'AOP_DISABLE' =>
            array(
              'customCode' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'disablePortalUser\';" value="{$MOD.LBL_DISABLE_PORTAL_USER}"> {/if}',
              'sugar_html' =>
              array(
                'type' => 'submit',
                'value' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
                'htmlOptions' =>
                array(
                  'title' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
                  'class' => 'button',
                  'onclick' => 'this.form.action.value=\'disablePortalUser\';',
                  'name' => 'buttonDisablePortalUser',
                  'id' => 'disablePortalUser_button',
                ),
                'template' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
            'AOP_ENABLE' =>
            array(
              'customCode' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'enablePortalUser\';" value="{$MOD.LBL_ENABLE_PORTAL_USER}"> {/if}',
              'sugar_html' =>
              array(
                'type' => 'submit',
                'value' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
                'htmlOptions' =>
                array(
                  'title' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
                  'class' => 'button',
                  'onclick' => 'this.form.action.value=\'enablePortalUser\';',
                  'name' => 'buttonENablePortalUser',
                  'id' => 'enablePortalUser_button',
                ),
                'template' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
          ),
        ),
        'maxColumns' => '2',
        'widths' =>
        array(
          0 =>
          array(
            'label' => '10',
            'field' => '30',
          ),
          1 =>
          array(
            'label' => '10',
            'field' => '30',
          ),
        ),
        'includes' =>
        array(
          0 =>
          array(
            'file' => 'modules/Contacts/Contact.js',
          ),
        ),
        'useTabs' => false,
        'tabDefs' =>
        array(
          'LBL_CONTACT_INFORMATION' =>
          array(
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
        ),
        'syncDetailEditViews' => true,
      ),
      'panels' =>
      array(
        'lbl_contact_information' =>
        array(
          0 =>
          array(
            0 => 'category_name',
            1 => '',
          ),
          1 =>
          array(
            0 => 'company_name',
            1 =>
            array(
              'name' => 'department',
              'label' => 'LBL_DEPARTMENT',
            ),
          ),
          2 =>
          array(
            0 =>
            array(
              'name' => 'title',
              'comment' => 'The title of the contact',
              'label' => 'LBL_TITLE',
            ),
            1 => array(
              'name' => 'full_name',
              'label' => 'LBL_NAME',
            ),
          ),
          3 =>
          array(
            0 =>
            array(
              'name' => 'phone_work',
              'label' => 'LBL_OFFICE_PHONE',
              // 'customCode' => '<a href="tel:{$fields.phone_work.value}">{$fields.phone_work.value}</a> '
            ),
            1 =>
            array(
              'name' => 'phone_mobile',
              'label' => 'LBL_MOBILE_PHONE',
              // 'customCode' => '<a href="tel:{$fields.phone_mobile.value}">{$fields.phone_mobile.value}</a> '
            ),
          ),
          4 =>
          array(
            0 => array(
              'name' => 'phone_fax',
              'label' => 'LBL_FAX_PHONE',
            ),
            1 => 'website',
          ),
          5 =>
          array(
            0 =>
            array(
              'name' => 'email1',
              'studio' => 'false',
              'label' => 'LBL_EMAIL_ADDRESS',
            ),
          ),
          6 =>
          array(
            0 =>
            array(
              'name' => 'primary_address_street',
              'label' => 'LBL_PRIMARY_ADDRESS',
              'type' => 'address',
              'displayParams' =>
              array(
                'key' => 'primary',
              ),
            ),
            1 =>
            array(
              'name' => 'alt_address_street',
              'label' => 'LBL_ALTERNATE_ADDRESS',
              'type' => 'address',
              'displayParams' =>
              array(
                'key' => 'alt',
              ),
            ),
          ),
          7 =>
          array(
            0 =>
            array(
              'name' => 'description',
              'comment' => 'Full text of the note',
              'label' => 'LBL_DESCRIPTION',
            ),
            1 => ''
          ),
        ),
      ),
    ),
  );;
