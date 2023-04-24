<?php

namespace CustomApi\Service;

use Api\V8\BeanDecorator\BeanListResponse;
use Api\V8\JsonApi\Response\AttributeResponse;
use Api\V8\JsonApi\Response\DataResponse;
use Api\V8\JsonApi\Response\DocumentResponse;
use Slim\Http\Request;
use SuiteCRM\Exception\AccessDeniedException;
use CustomApi\Service\UserModuleService;

class CustomModuleService
{
    /**
     * @param Request $request
     * @return DocumentResponse
     * @throws AccessDeniedException
     */
    public function getRecords(Request $request)
    {
        $routeParams = $request->getAttribute('route')->getArguments();
        $customUserService = new UserModuleService();
        $currentUser = $customUserService->getCurrentUser($request);

        $queryParams = $request->getQueryParams();
        $parsedBody = $request->getParsedBody();

        // echo "<pre>";
        // print_r($routeParams);
        // echo "<pre>";
        // print_r($queryParams);
        // echo "<pre>";
        // print_r($parsedBody);
        // die;
        global $db;
        // this whole method should split into separated classes later
        $module = $routeParams['moduleName'];
        // $orderBy = $params->getSort();
        $orderBy = '';
        // $where = '';
        // $where = $params->getFilter();
        // $fields = $params->getFields();
        $fields = [];

        // $size = $params->getPage()->getSize();
        // $number = $params->getPage()->getNumber();

        $bean = $bean = \BeanFactory::newBean($module);

        // if (!$bean->ACLAccess('view')) {
        //     throw new AccessDeniedException();
        // }

        // negative numbers are validated in params
        // $offset = $number !== 0 ? ($number - 1) * $size : $number;
        $offset = 0;
        // $realRowCount = $this->beanManager->countRecords($module, $where);
        // $limit = $size === BeanManager::DEFAULT_ALL_RECORDS ? BeanManager::DEFAULT_LIMIT : $size;
        $limit = $size = -1;
        // $deleted = $params->getDeleted();
        $deleted = 0;

        $where = $bean->table_name . '.assigned_user_id="' . $currentUser['id'] . '"';

        // if (empty($fields)) {
        //     $fields = $this->beanManager->getDefaultFields($bean);
        // }

        // Detect if bean has email field
        if ((property_exists($bean, 'email1')
                && strpos($where, 'email1') !== false)
            || (property_exists($bean, 'email2')
                && strpos($where, 'email2') !== false)
        ) {

            $selectedModule = strtolower($module);

            // Selects Module or COUNT(*) and will add one to the query.
            $idSelect = 'SELECT ' . $selectedModule . '.id ';
            $countSelect = 'SELECT COUNT(*) AS cnt ';

            $quotedCountSelect = $db->quote($countSelect);

            // Email where clause
            $fromQuery
                = 'FROM email_addresses JOIN email_addr_bean_rel ON email_addresses.id = email_addr_bean_rel.email_address_id JOIN '
                . $selectedModule . ' ON ' . $selectedModule
                . '.id = email_addr_bean_rel.bean_id ';
            $modifiedWhere = str_replace(
                'accounts.email1',
                'email_addresses.email_address',
                $where
            );
            $where = $modifiedWhere;

            // Sets and adds deleted to the query
            if ($deleted == 0) {
                $whereAuto = '' . $bean->table_name . ' .deleted=0';
            } elseif ($deleted == 1) {
                $whereAuto = '' . $bean->table_name . ' .deleted=1';
            }
            if ($where != '') {
                $where = ' where (' . $where . ') AND ' . $whereAuto . '';
            } else {
                $where = ' where ' . $whereAuto . '';
            }

            // Joins parts together to form query
            $query = $idSelect . $fromQuery . $where;
            $countQuery = $quotedCountSelect . $fromQuery . $where;
            $realRowCount = (int)$db->fetchRow($db->query($countQuery, true, ''))['cnt'];

            // Sets order by into the query
            $order_by = $bean->process_order_by($orderBy);
            if (!empty($orderBy)) {
                $query .= ' ORDER BY ' . $order_by;
            }

            $result = $bean->process_list_query($query, $offset, $limit, -1, $where);
            $beanResult['row_count'] = $result['row_count'];
            $beanList = [];

            foreach ($result['list'] as $resultBean) {
                $queryModuleBean = \BeanFactory::newBean($module);
                $queryModuleBean->id = $resultBean->id;
                $beanList[] = $queryModuleBean;
            }
            $beanResult['list'] = $beanList;
            $beanListResponse = new BeanListResponse($beanResult);
        } else {
            $beanListResponse = $bean->get_list(
                '',
                $where,
                0,
                10,
                -1,
                false,
                0,
                $fields
            );
        }

        $beanArray = [];
        foreach ($beanListResponse['list'] as $bean) {
            $beanArray[]  = \BeanFactory::getBean($module, $bean->id)->toArray();
        }
        // $data = [];
        // foreach ($beanArray as $bean) {
        //     $dataResponse = $this->getDataResponse(
        //         $bean,
        //         $fields,
        //         $request->getUri()->getPath() . '/' . $bean->id
        //     );

        //     $data[] = $dataResponse;
        // }
        // echo "<pre>"; print_r($beanArray); die;
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

    /**
     * @param Request $request
     *
     * @return DocumentResponse
     * @throws \InvalidArgumentException When bean is already exist.
     * @throws AccessDeniedException
     */
    public function createRecord(Request $request)
    {
        $parsedBody = $request->getParsedBody();
        if ($parsedBody == null || !isset($parsedBody['data']) || empty($parsedBody['data'])) {
            throw new \InvalidArgumentException(sprintf('Invalid format.'));
        }
        // echo "<pre>"; print_r($parsedBody); die;
        $module = $parsedBody['data']['type'];
        $attributes = $parsedBody['data']['attributes'];

        $bean = \BeanFactory::newBean($module);

        if (!$bean instanceof \SugarBean) {
            throw new \InvalidArgumentException(sprintf('Module %s does not exist', $module));
        }

        if (!$bean->ACLAccess('save')) {
            throw new AccessDeniedException();
        }

        $customUserService = new UserModuleService();
        $currentUser = $customUserService->getCurrentUser($request);
        $attributes['created_by'] = $currentUser['id'];
        $this->setRecordUpdateParams($bean, $attributes);
        // echo "<pre>"; print_r($currenUser);
        // echo "<pre>"; print_r($attributes); die;
        $fileUpload = $this->processAttributes($bean, $attributes);

        $bean->save();

        // if ($fileUpload) {
        //     $this->addFileToNote($bean->id, $attributes);
        // }
        $bean->retrieve($bean->id);

        $attributes = $this->getAttributes($bean);

        $dataResponse = $this->getDataResponse(
            $bean,
            null,
            $attributes,
            $request->getUri()->getPath() . '/' . $bean->id
        );

        $response = new DocumentResponse();
        $response->setData($dataResponse);

        return $response;
    }

    /**
     * @param \SugarBean $bean
     * @param array $attributes
     */
    protected function setRecordUpdateParams(\SugarBean $bean, array $attributes)
    {
        $bean->set_created_by = !(isset($attributes['created_by']) || isset($attributes['created_by_name']));
        $bean->update_modified_by = !(isset($attributes['modified_user_id']) || isset($attributes['modified_by_name']));
        $bean->update_date_entered = isset($attributes['date_entered']);
        $bean->update_date_modified = !isset($attributes['date_modified']);
    }

    /**
     * @param $bean
     * @param $attributes
     * @return bool
     */
    protected function processAttributes(&$bean, $attributes)
    {
        $createFile = false;

        foreach ($attributes as $property => $value) {

            if ($property === 'filecontents') {
                continue;
            } elseif ($property === 'filename') {
                $createFile = true;
                continue;
            }

            $bean->$property = $value;
        }

        return $createFile;
    }

    /**
     * @param \SugarBean $bean
     * @param array|null $fields
     * @param string|null $path
     *
     * @return DataResponse
     */
    public function getDataResponse(\SugarBean $bean, $fields = null, $attributes = null, $path = null)
    {
        // this will be split into separated classed later
        $dataResponse = new DataResponse($bean->getObjectName(), $bean->id);
        $dataResponse->setAttributes($attributes);
        // $dataResponse->setRelationships($this->relationshipHelper->getRelationships($bean, $path));

        return $dataResponse;
    }

    /**
     * @param \SugarBean $bean
     * @param array|null $fields
     *
     * @return AttributeResponse
     */
    public function getAttributes(\SugarBean $bean, $fields = null)
    {
        $bean->fixUpFormatting();

        // using the ISO 8601 format for dates
        $attributes = array_map(function ($value) {
            return is_string($value)
                ? (\DateTime::createFromFormat('Y-m-d H:i:s', $value)
                    ? date(\DateTime::ATOM, strtotime($value))
                    : $value)
                : $value;
        }, $bean->toArray());

        if ($fields !== null) {
            $attributes = array_intersect_key($attributes, array_flip($fields));
        }

        unset($attributes['id']);

        return new AttributeResponse($attributes);
    }

    public function checkExist($module, $fields)
    {
        $bean = \BeanFactory::newBean($module);

        if (!$bean instanceof \SugarBean) {
            throw new \InvalidArgumentException(sprintf('Module %s does not exist', $module));
        }

        $bean = $bean->retrieve_by_string_fields($fields);
        if (!$bean || !$bean->id) return null;
        return \BeanFactory::getBean($module, $bean->id);
    }

    public function executeQuery($query)
    {
        global $db;
        return $db->query($query);
    }

    public function getQueryData($query, $first = false)
    {
        global $db;
        $queryResult = $this->executeQuery($query);
        $return = [];
        while ($row = $db->fetchByAssoc($queryResult)) {
            $return[] = $row;
        }
        if ($first) {
            return $return[0];
        }
        return $return;
    }

    public function nowDb()
    {
        global $timedate;
        return $timedate->getInstance()->nowDb();
    }

    public function getCommonAttr()
    {
        global $currentUser;
        return [
            'created_by' => $currentUser['id'],
            'assigned_user_id' => $currentUser['id'],
            'modified_user_id' => $currentUser['id'],
            'date_entered' => $this->nowDb(),
            'date_modified' => $this->nowDb(),
        ];
    }

    public function getCurrency($id = null)
    {
        global $userCurrency;
        if (empty($userCurrency)) {
            $where = ' where deleted=0 ';
            if ($id) {
                $where .= " AND id='$id' ";
            } else {
                $where .= " AND iso4217='INR' ";
            }
            $query = "SELECT * from currencies $where  limit 1";
            $userCurrency = $this->getQueryData($query, true);
        }
        return $userCurrency;
    }

    public function getUserPreferences($userId)
    {
        $query = "SELECT contents from user_preferences where deleted=0 AND category='global' AND assigned_user_id='$userId' limit 1";
        $contents = $this->getQueryData($query, true);
        return unserialize(base64_decode($contents['contents']));
    }


    public function getRecord(Request $request)
    {
        $routeParams = $request->getAttribute('route')->getArguments();
        $moduleName = $routeParams['moduleName'];
        $id = $routeParams['id'];

        $customUserService = new UserModuleService();
        $currentUser = $customUserService->getCurrentUser($request);

        $bean = \BeanFactory::getBean($moduleName, $id);
        $returnArr = $bean->toArray();
        // if ($moduleName == 'AOS_Invoices') {
        //     $productQuoteModuleService = new ProductQuoteModuleService();
        //     $returnArr['items'] = $productQuoteModuleService->getSalesProducts($id);
        // }

        return $returnArr;
    }

    public function upload($image, $path, $oldPath)
    {
        $file_name = $image['name'];
        $file_tmp = $image['tmp_name'];

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $fullPath = $path . time() . '_' . $file_name;
        move_uploaded_file($file_tmp, $fullPath);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
        return $fullPath;
    }
}
