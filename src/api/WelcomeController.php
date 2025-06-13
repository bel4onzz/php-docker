<?php

namespace Api;

use Api\Contracts\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class WelcomeController implements ApiController
{

    public function __construct()
    {
        return "HELLO WORLD";
    }

    public function index(Request $request): JsonResponse
    {
        $data = [
            'status' => 'success',
            'message' => 'This is a JSON response',
            'request_method' => $request->getMethod(),
        ];

        return new JsonResponse($data);
    }

    public function show($id): JsonResponse
    {
        $data = ['message' => "show method", 'data' => ['id' => $id]];

        return new JsonResponse($data);
    }
    public function store(Request $request): JsonResponse
    {
        $data = ['message' => "store method", 'data' => ['request' => $request]];

        return new JsonResponse($data);
    }
    public function update(Request $request): JsonResponse
    {
        $data = ['message' => "update method", 'data' => ['request' => $request]];

        return new JsonResponse($data);
    }
    public function delete(Request $request): JsonResponse
    {
        $data = ['message' => "delete method", 'data' => ['request' => $request]];

        return new JsonResponse($data);
    }
}
