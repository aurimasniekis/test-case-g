<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class BaseController
 *
 * @package App\Controller
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
abstract class BaseController
{
    public function success(string $message = 'Success', int $code = 200): JsonResponse
    {
        return new JsonResponse(
            [
                'code' => $code,
                'message' => $message,
                'date' => []
            ],
            $code
        );
    }

    public function error(string $message = 'Error occurred', int $code = 400): JsonResponse
    {
        return new JsonResponse(
            [
                'code' => $code,
                'message' => $message,
                'date' => []
            ],
            $code
        );
    }

    public function jsonDataView($data, int $code = 200): JsonResponse
    {
        return new JsonResponse(
            [
                'code' => $code,
                'message' => 'Success',
                'data' => $data,
            ],
            $code
        );
    }
}