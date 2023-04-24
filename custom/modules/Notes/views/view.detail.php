<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/Notes/views/view.detail.php';

class CustomNotesViewDetail extends NotesViewDetail
{
    public function preDisplay()
    {
        if (empty($this->bean->filename)) {
            $js = <<<EOF
        <script>
        $(document).ready(function(){
            console.log($('.glyphicon-eye-open').parent('a'));
            $('.glyphicon-eye-open').parent('a').attr('href','testcheck.com');
            $('.glyphicon-eye-open').each(function(){
                var file = $(this).parent().prev().html();
                if(file.trim() == ''){
                    $(this).parent().remove()
                }
            })
        })
        </script>
EOF;

            echo $js;
        }else{
            $js = <<<EOF
            <script>
            $(document).ready(function(){
                console.log($('.glyphicon-eye-open').parent('a'));
                var url = $('.glyphicon-eye-open').parent('a').attr('href');
                $('.glyphicon-eye-open').parent('a').attr('href', url +'&'+new Date().getTime());
            })
            </script>
EOF;
    
                echo $js;
        }

        parent::preDisplay();
    }
}
