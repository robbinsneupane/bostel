<?php
class ListViewLogicHook
{
    public function attachmentsView(SugarBean $bean, $event, $arguments)
    {
        $files = json_decode(html_entity_decode($bean->attachments), true);
        if (count($files) > 0) {
            $bean->attachments_view = '<a href="index.php?module=Notes&action=DetailView&record=' . $bean->id . '" >Yes</a>';
        } else {
            $bean->attachments_view = 'No';
        }
    }
}
