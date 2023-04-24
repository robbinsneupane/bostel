<?php

namespace CustomApi\Service;

class SecurityGroupModuleService
{
    protected $currenUser;
    protected $customModuleService;
    protected $module = 'Users';
    public $currentUser;

    public function __construct()
    {
        $this->customModuleService = new CustomModuleService();
    }

    public function add($attributes, $userId = '')
    {
        $new = false;
        if (!empty($attributes['id'])) {
            $bean = \BeanFactory::getBean('SecurityGroups', $attributes['id']);
        } else {
            $new = true;
            $bean = \BeanFactory::newBean('SecurityGroups');
        }

        $attributes = array_merge($attributes, $this->customModuleService->getCommonAttr());
        foreach ($attributes as $property => $value) {
            $bean->$property = $value;
        }
        $bean->save();
        if ($new)
            $this->addIntoRole($bean);

        return $bean->retrieve($bean->id);
    }

    private function addIntoRole($bean)
    {
        $roleQuery = 'SELECT id from acl_roles where deleted=0 and name="Bostel Clients"';
        $role = $this->customModuleService->getQueryData($roleQuery, true);
        $data = [
            'id' => create_guid(),
            'securitygroup_id' => $bean->id,
            'role_id' => $role['id'],
            'date_modified' => $this->customModuleService->nowDb()
        ];
        $query = 'INSERT into securitygroups_acl_roles (' . implode(', ', array_keys($data)) . ') values("' . implode('", "', array_values($data)) . '")';
        $existBean = $this->customModuleService->executeQuery($query);
    }
}
