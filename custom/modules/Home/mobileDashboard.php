<?php

class MobileDashboard
{
    public function getDashBoardData()
    {

        global $current_user, $sugar_config, $beanFiles, $app_list_strings;
        
        $returnArray = [
            ['title'=>'Contacts','module'=>'Contacts'],
            ['title'=>'Leads','module'=>'Leads'],
            ['title'=>'Calls','module'=>'Calls'],
            ['title'=>'Tasks','module'=>'Tasks'],
            ['title'=>'Meetings','module'=>'Meetings'],
            ['title'=>'Notes','module'=>'Notes'],
        ];
        return $returnArray;
    }
}
