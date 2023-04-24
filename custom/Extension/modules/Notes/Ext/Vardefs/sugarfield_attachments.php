<?php

$dictionary["Note"]["fields"]["attachments"] = array(
  'required' => false,
  'name' => 'attachments',
  'vname' => 'LBL_ATTACHMENTS',
  'type' => 'text',
  'massupdate' => 0,
  'no_default' => false,
  'comments' => '',
);
$dictionary['Note']['fields']['attachments_view'] = array(
  'required' => false,
  'name' => 'attachments_view',
  'vname' => 'LBL_ATTACHMENTS',
  'type' => 'function',
  'source' => 'non-db',
  'massupdate' => 0,
  'importable' => 'false',
  'duplicate_merge' => 'disabled',
  'duplicate_merge_dom_value' => 0,
  'audited' => false,
  'reportable' => false,
  'inline_edit' => false,
  'function' =>
  array(
    'name' => 'multifile_upload',
    'returns' => 'html',
    'include' => 'custom/modules/Notes/MultiFileUpload.php'
  ),
);
