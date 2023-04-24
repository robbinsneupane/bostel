<?php

namespace CustomApi\Controller;

use CustomApi\Service\UserModuleService;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersController extends CustomBaseController
{

    protected $userModuleService;

    public function __construct()
    {
        $this->userModuleService = new UserModuleService();
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function register(Request $request, Response $response)
    {
        // return $this->customGenerateResponse($response, [], 'Work in progress');
        try {
            $jsonResponse = $this->userModuleService->register($request);
            return $this->customGenerateResponse($response, $jsonResponse, 'Created', 201);
        } catch (\Exception $exception) {
            return $this->customGenerateResponse($response, '', $exception->getMessage(), 400, false);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function get(Request $request, Response $response)
    {
        \LoggerManager::getLogger()->debug($request->getParsedBody());
        try {
            $jsonResponse = $this->saleModuleService->get($request);

            return $this->customGenerateResponse($response, $jsonResponse);
        } catch (\Exception $exception) {
            return $this->customGenerateResponse($response, '', $exception->getMessage(), 400, false);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @param $params
     *
     * @return Response
     */
    public function getModuleRecords(Request $request, Response $response)
    {
        try {
            $jsonResponse = $this->tokenModuleService->getRecords($request);

            // return $this->generateResponse($response, $jsonResponse, 200);
            return $this->customGenerateResponse($response, $jsonResponse);
        } catch (\Exception $exception) {
            return $this->generateErrorResponse($response, $exception, 400);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function update(Request $request, Response $response)
    {
        try {
            $jsonResponse = $this->userModuleService->update($request);

            return $this->customGenerateResponse($response, $jsonResponse, 'Updated');
        } catch (\Exception $exception) {
            return $this->customGenerateResponse($response, '', $exception->getMessage(), 400, false);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function getCurrentUser(Request $request, Response $response)
    {
        try {
            $jsonResponse = $this->userModuleService->getCurrentUser($request, true);

            return $this->customGenerateResponse($response, $jsonResponse);
        } catch (\Exception $exception) {
            return $this->customGenerateResponse($response, '', $exception->getMessage(), 400, false);
        }
    }
}
