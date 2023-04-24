<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('custom/include/multiFileUpload/UploadHandler.php');
$options = [];
if (isset($_GET['files']))
    $options = ['files' => explode(',', $_GET['files'])];

$upload_handler = new UploadHandler($options);
