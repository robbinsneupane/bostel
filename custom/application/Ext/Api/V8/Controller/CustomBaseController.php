<?php

namespace CustomApi\Controller;

use Api\V8\Controller\BaseController;
use Slim\Http\Response as HttpResponse;

class CustomBaseController extends BaseController
{
    /**
     * @param HttpResponse $httpResponse
     * @param mixed $response
     * @param integer $status
     *
     * @return HttpResponse
     */
    public function customGenerateResponse(
        HttpResponse $httpResponse,
        $data,
        $msg = "Success",
        $status = 200,
        $success = true
    ) {
        ob_end_clean();
        $response = [
            'data' => isset($data['data']) ? $data['data'] : $data,
            'message' => $msg,
            'status' => $status,
            'success' => $success,
        ];
        if (isset($data['meta'])) {
            $response['meta'] = $data['meta'];
        }
        return $httpResponse
            ->withStatus($status)
            ->withHeader('Accept', static::MEDIA_TYPE)
            ->withHeader('Content-type', static::MEDIA_TYPE)
            ->write(
                json_encode(
                    $response,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
                )
            );
    }
}
