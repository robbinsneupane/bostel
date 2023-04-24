<?php

function multifile_upload($focus, $field, $value, $view)
{
    global $app_strings;
    $files = json_decode(html_entity_decode($focus->attachments), true);
    if ($view == 'DetailView') {
        $html = '';
        foreach ($files['files'] as $file) {
            $file_headers = @get_headers($file['url']);
            if (stripos($file_headers[0], "200 OK") > 0) {

                if (isset($file['thumbnailUrl'])) {
                    $html .= ' <span class="preview">
                            <a target="_blank" href="' . $file['url'] . '" ><img src="' . $file['thumbnailUrl'] . '"></a>
                        </span>';
                } else {
                    $html .= ' <span class="preview">
                    <a href="' . $file['url'] . '" >
                        <i style="font-size:45px" class="suitepicon suitepicon-module-documents"></i>
                        <p>' . $file['name'] . '</p>
                    </a>
                </span>';
                }
            }
        }
        return $html;
    }
    $fileNames = '';
    foreach ($files['files'] as $file) {
        $fileNames .= (($fileNames == '') ? '' : ',') . $file['name'];
    }
    $html = '
    <input type="hidden" name="attachments" id="fileUploadValues" data-file-names="' . $fileNames . '" 
    value="' . (empty($focus->attachments) ? '' : $focus->attachments) . '"/>

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="custom/include/multiFileUpload/css/jquery.fileupload.css" />
    <link rel="stylesheet" href="custom/include/multiFileUpload/css/jquery.fileupload-ui.css" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href="custom/include/multiFileUpload/css/jquery.fileupload-noscript.css" /></noscript>
    <noscript>
        <link rel="stylesheet" href="custom/include/multiFileUpload/css/jquery.fileupload-ui-noscript.css" /></noscript>
    <link href="custom/include/doka/doka.min.css" rel="stylesheet" type="text/css"/>';

    $html .= <<<EOT
        <!-- The file upload form used as target for the file upload widget -->
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            <noscript><input type="hidden" name="redirect"
                    value="https://blueimp.github.io/jQuery-File-Upload/" /></noscript>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-lg-12">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-primary fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>{$app_strings['LBL_FILE_UPLOAD_ADD_FILES']}...</span>
                        <input type="file" id="files" name="files[]" multiple />
                    </span>
                    <button type="submit" class="btn btn-primary start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>{$app_strings['LBL_FILE_UPLOAD_START_UPLOAD']}</span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>{$app_strings['LBL_FILE_UPLOAD_CANCEL_UPLOAD']}</span>
                    </button>
                    <button type="button" class="btn btn-danger delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>{$app_strings['LBL_FILE_UPLOAD_DELETE_SELECTED']}</span>
                    </button>
                    <input type="checkbox" class="toggle" />
                    <!-- The global file processing state -->
                    <span class="fileupload-process"></span>
                </div>
                <!-- The global progress state -->
                <div class="col-lg-5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                    </div>
                    <!-- The extended global progress state -->
                    <div class="progress-extended">&nbsp;</div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped">
                <tbody class="files"></tbody>
            </table>
        
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" aria-label="image gallery"
        aria-modal="true" role="dialog" data-filter=":even">
        <div class="slides" aria-live="polite"></div>
        <h3 class="title"></h3>
        <a class="prev" aria-controls="blueimp-gallery" aria-label="previous slide" aria-keyshortcuts="ArrowLeft"></a>
        <a class="next" aria-controls="blueimp-gallery" aria-label="next slide" aria-keyshortcuts="ArrowRight"></a>
        <a class="close" aria-controls="blueimp-gallery" aria-label="close" aria-keyshortcuts="Escape"></a>
        <a class="play-pause" aria-controls="blueimp-gallery" aria-label="play slideshow" aria-keyshortcuts="Space"
            aria-pressed="false" role="button"></a>
        <ol class="indicator"></ol>
    </div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>{$app_strings['LBL_FILE_UPLOAD_EDIT']}</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>{$app_strings['LBL_FILE_UPLOAD_START']}</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>{$app_strings['LBL_FILE_UPLOAD_CANCEL']}</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } else { %}
                        <i style="font-size:45px" class="suitepicon suitepicon-module-documents"></i>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
EOT;


    $html .= <<<EOD
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="custom/include/multiFileUpload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="custom/include/multiFileUpload/js/jquery.fileupload-ui.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
      <script src="custom/include/multiFileUpload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->

    <script src="custom/include/doka/doka.min.js"></script>
    <script>
    $(function () {
        'use strict';
    
        // Initialize the jQuery File Upload widget:
        $('#EditView').fileupload({
            doka: Doka.create({
                cropAspectRatioOptions: [
                    {
                        label: 'Free',
                        value: null
                    },
                    {
                        label: 'Portrait',
                        value: 1.25
                    },
                    {
                        label: 'Square',
                        value: 1
                    },
                    {
                        label: 'Landscape',
                        value: .75
                    }
                ]
            }),
            edit: Doka.supported() &&
                function (file) {
                  return this.doka.edit(file).then(function (output) {
                    return output && output.file;
                  });
                },
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            disableImageResize: false,
            maxNumberOfFiles: 5,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
            url: 'index.php?entryPoint=file_uploads' + '&files=' + $('#fileUploadValues').data('file-names')
        });
    
        // Enable iframe cross-domain access via redirect option:
        $('#EditView').fileupload(
            'option',
            'redirect',
            window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
        );
    
        // Load existing files:
        $('#EditView').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#EditView').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#EditView')[0]
        }).always(function () {
                $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this)
                .fileupload('option', 'done')
                // eslint-disable-next-line new-cap
                .call(this, $.Event('done'), { result: result });
        });
    
        $('#EditView').on('fileuploaddone', function (e, data) {
            let attachments = $('#fileUploadValues').val();
            if(attachments != ''){
                attachments = JSON.parse(attachments);
                let newFiles = {files:[]};
                let i = 0;
                for (let file of attachments.files) {
                    newFiles['files'][i] = file;
                    i++;
                }
                newFiles['files'][i] = data.result.files[0];
                $('#fileUploadValues').val(JSON.stringify(newFiles));
            } else {
                $('#fileUploadValues').val(JSON.stringify(data.result));
            }
        })
    
        $('#EditView').on('fileuploaddestroyed', function (e, data) {
            let fileName = data.url.slice(data.url.indexOf('file=') + 5, data.url.indexOf('&record='));
            let attachments = $('#fileUploadValues').val();
            if(attachments != ''){
                attachments = JSON.parse(attachments);
            }
            let newAttachments = attachments.files.filter(attachment => (fileName != encodeURI(attachment.name)));
            $('#fileUploadValues').val((newAttachments.length > 0) ? JSON.stringify({files:newAttachments}) : '');
        });

        $('#EditView').on('fileuploaddestroy', function (e, data) {            
            data.url += '&record=' + $('#EditView').find('input[name="record"]').val();
            data.url += '&module=' + $('#EditView').find('input[name="module"]').val();
            var con = confirm('Are you sure, you want to delete this file?');
            if(!con){ 
                e.preventDefault();
            }
        });
    });
    </script>
EOD;
    return $html;
}
