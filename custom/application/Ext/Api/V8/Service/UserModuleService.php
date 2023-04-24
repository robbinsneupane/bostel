<?php

namespace CustomApi\Service;

use Api\V8\JsonApi\Response\DocumentResponse;
use Slim\Http\Request;
use SugarEmailAddress;

class UserModuleService
{
    protected $currenUser;
    protected $customModuleService;
    protected $module = 'Users';
    public $currentUser;

    public function __construct()
    {
        $this->customModuleService = new CustomModuleService();
        $this->sgModuleService = new SecurityGroupModuleService();
    }

    /**
     * @param Request $request
     */
    public function getCurrentUser(Request $request, $attributes = false)
    {
        global $currentUser;
        if (empty($currentUser)) {
            $oauth2Token = \BeanFactory::newBean('OAuth2Tokens');
            $oauth2Token->retrieve_by_string_fields(
                ['access_token' => $request->getAttribute('oauth_access_token_id')]
            );
            $currentUser = \BeanFactory::getBean('Users', $oauth2Token->assigned_user_id);
            $res = $currentUser->toArray();
            if ($attributes) {
                $res = $this->genrateUserRes($currentUser);
            }
            // setting up for global
            $currentUser = $currentUser->toArray();
            return $res;
        }

        return $currentUser;
    }

    public function register(Request $request)
    {
        $attributes = $request->getParsedBody();
        // echo "<pre>"; print_r($attributes); die;
        if (empty($attributes) || ($attributes && (empty($attributes['user_name']) ||
            empty($attributes['last_name']) ||
            empty($attributes['password']) ||
            empty($attributes['email'])
        ))) {
            throw new \InvalidArgumentException(sprintf('Invalid format!, Please check your data.'));
        }

        $this->validateUser($attributes);
        $createdUser = $this->createUser($attributes);
        $this->setRole($createdUser);
        $workGroup = $this->sgModuleService->add($attributes['work_group']);

        return array_merge($createdUser->toArray(), ['work_group' => $workGroup->toArray()]);
    }

    /**
     * @param Request $request
     * @return DocumentResponse
     * @throws AccessDeniedException
     */
    public function getRecords(Request $request)
    {
        $routeParams = $request->getAttribute('route')->getArguments();
        $currentUser = $this->getCurrentUser($request);
        $queryParams = $request->getQueryParams();
        $parsedBody = $request->getParsedBody();

        // echo "<pre>";
        // print_r($routeParams);
        // echo "<pre>";
        // print_r($queryParams);

        global $db;
        // this whole method should split into separated classes later
        // $orderBy = $params->getSort();
        $orderBy = '';
        // $where = '';
        // $where = $params->getFilter();
        // $fields = $params->getFields();
        $fields = [];

        // $size = $params->getPage()->getSize();
        // $number = $params->getPage()->getNumber();

        $bean = $bean = \BeanFactory::newBean($this->module);
        // echo "<pre>";
        // print_r($bean->table_name);
        // die;
        // if (!$bean->ACLAccess('view')) {
        //     throw new AccessDeniedException();
        // }

        // negative numbers are validated in params
        // $offset = $number !== 0 ? ($number - 1) * $size : $number;
        $offset = 0;
        // $realRowCount = $this->beanManager->countRecords($this->module, $where);
        // $limit = $size === BeanManager::DEFAULT_ALL_RECORDS ? BeanManager::DEFAULT_LIMIT : $size;
        $limit = $size = -1;
        // $deleted = $params->getDeleted();
        $deleted = 0;

        $where = " where $bean->table_name.deleted=0";
        $select = "SELECT $bean->table_name.* from $bean->table_name ";
        $joins = "";

        if ($currentUser['business_owner'] == 1) {
            $joins .= "INNER JOIN accounts_cl_tokens_1_c at ON at.accounts_cl_tokens_1cl_tokens_idb=$bean->table_name.id AND at.deleted=0 
            INNER JOIN accounts_users_1_c au on au.accounts_users_1accounts_ida=at.accounts_cl_tokens_1accounts_ida AND au.deleted=0 AND au.accounts_users_1users_idb='" . $currentUser['id'] . "'";
        } else {
            $joins .= "INNER JOIN users_cl_tokens_1_c ut ON ut.users_cl_tokens_1cl_tokens_idb=$bean->table_name.id AND ut.deleted=0 AND ut.users_cl_tokens_1users_ida='" . $currentUser['id'] . "'";
        }

        // Joins parts together to form query
        // $query = $idSelect . $fromQuery . $where;
        // $countQuery = $quotedCountSelect . $fromQuery . $where;
        // $realRowCount = (int)$db->fetchRow($db->query($countQuery, true, ''))['cnt'];

        // Sets order by into the query
        // $order_by = $bean->process_order_by($orderBy);
        // if (!empty($orderBy)) {
        //     $query .= ' ORDER BY ' . $order_by;
        // }
        $query = $select . $joins . $where;
        // echo $query; die;
        $result = $bean->process_list_query($query, $offset, $limit, -1);
        // $beanResult['row_count'] = $result['row_count'];        
        // echo "<pre>"; print_r($result); die;
        $beanArray = [];
        foreach ($result['list'] as $bean) {
            $beanArray[]  = $bean->retrieve($bean->id)->toArray();
        }
        $response = new DocumentResponse();
        $response->setData($beanArray);

        // pagination
        // if ($beanArray && $limit !== BeanManager::DEFAULT_LIMIT) {
        //     $totalPages = ceil($realRowCount / $size);

        //     $paginationMeta = $this->paginationHelper->getPaginationMeta($totalPages, count($beanArray));
        //     $paginationLinks = $this->paginationHelper->getPaginationLinks($request, $totalPages, $number);

        //     $response->setMeta($paginationMeta);
        //     $response->setLinks($paginationLinks);
        // }
        // echo "<pre>"; print_r($beanArray); die;
        return $beanArray;
    }

    public function update(Request $request)
    {
        $attributes = $request->getParsedBody();
        if (empty($attributes) || !isset($attributes['id']) || empty($attributes['id'])) {
            throw new \InvalidArgumentException(sprintf('Invalid format.'));
        }
        $this->currentUser = $this->getCurrentUser($request);
        $bean = \BeanFactory::newBean($this->module);
        $bean = $bean->retrieve($attributes['id']);

        $saveAttr = array_merge([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'phone_mobile' => $attributes['phone_mobile'],
            'address_street' => $attributes['address_street'],
            'address_city' => $attributes['address_city'],
            'address_state' => $attributes['address_state'],
            'address_postalcode' =>  $attributes['address_postalcode'],
            'address_country' => 'India'
        ], $this->customModuleService->getCommonAttr());

        $image = [];
        if (isset($_FILES['profile_image'])) {
            $customModuleService = new CustomModuleService();
            $saveAttr['profile_image'] = $customModuleService->upload($_FILES['profile_image'], 'public/img/profile/', $bean->profile_image);
        }

        // echo "<pre>"; print_r($invoiceAttr); die;
        foreach ($saveAttr as $property => $value) {
            $bean->$property = $value;
        }
        $bean->save();
        $bean = $bean->retrieve($bean->id);
        // if (($bean->business_owner == '1')) {
        //     $accountData = [
        //         'name' => $attributes['business']['name'],
        //         'phone_office' => $attributes['business']['phone_office'],
        //         'billing_address_street' => $attributes['business']['billing_address_street'],
        //         'billing_address_city' => $attributes['business']['billing_address_city'],
        //         'billing_address_state' => $attributes['business']['billing_address_state'],
        //         'billing_address_postalcode' => $attributes['business']['billing_address_postalcode'],
        //         'address_country' => 'India'
        //     ];
        //     $accountModuleService = new AccountModuleService();
        //     $accountModuleService->saveData($accountData, $bean->accounts_users_1accounts_ida);
        // }
        return $this->genrateUserRes($bean);
    }

    private function genrateUserRes($currentUser)
    {
        $res = [
            'id' => $currentUser->id,
        ];
        $res['attributes'] = $currentUser->toArray();
        $res['preferences'] = $this->customModuleService->getUserPreferences($currentUser->id);
        $res['preferences']['currency_data'] = $this->customModuleService->getCurrency($res['preferences']['currency']);
        if ($currentUser->business_owner == '1') {
            $company = \BeanFactory::getBean('Accounts', $currentUser->accounts_users_1accounts_ida);
            $res['business'] = $company->toArray();
        }
        // echo "<pre>"; print_r($userCurrency); die;
        return $res;
    }

    public function createUser($attributes)
    {
        $bean = \BeanFactory::newBean('Users');
        $currency = $this->customModuleService->getCurrency();
        // $_POST['currency'] = $currency['id'];
        // $_POST['timezone'] = 'Asia/Kolkata';

        $attributes = array_merge($attributes, $this->customModuleService->getCommonAttr());
        foreach ($attributes as $property => $value) {
            $bean->$property = $value;
        }
        $bean->save();
        $Email = new SugarEmailAddress;
        $Email->addAddress($attributes['email'], true);
        $Email->save($bean->id, "Users");
        return $bean->retrieve($bean->id);
    }

    private function validateUser($data)
    {
        $checkUserQuery = 'SELECT count(id) as user_count from users where user_name="' . $data['user_name'] . '"';
        $existBean = $this->customModuleService->getQueryData($checkUserQuery, true);
        if ($existBean['user_count'] > 0) {
            throw new \InvalidArgumentException(sprintf('User already exist'));
        }

        $checkUserQuery = 'SELECT count(id) as email_count from email_addresses where email_address="' . $data['email'] . '"';
        $existBean = $this->customModuleService->getQueryData($checkUserQuery, true);
        if ($existBean['email_count'] > 0) {
            throw new \InvalidArgumentException(sprintf('User already exist'));
        }
    }

    public function setRole($user)
    {
        $roleQuery = "SELECT id from acl_roles where name='Bostel Clients'";
        $role = $this->customModuleService->getQueryData($roleQuery, true);
        $countQuery = "SELECT count(id) as role_count from acl_roles_users where deleted=0 and user_id='$user->id' ANd role_id='" . $role['id'] . "'";

        $userRole = $this->customModuleService->getQueryData($countQuery, true);
        if ($userRole['role_count'] > 0) {
            return;
        }
        $data = [
            'id' => create_guid(),
            'user_id' => $user->id,
            'role_id' => $role['id'],
            'date_modified' => $this->customModuleService->nowDb()
        ];
        $query = 'INSERT into acl_roles_users (' . implode(', ', array_keys($data)) . ') values("' . implode('", "', array_values($data)) . '")';
        $this->customModuleService->executeQuery($query);
    }
}
