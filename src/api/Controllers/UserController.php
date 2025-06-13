<?php

namespace Api\Controllers;

use Api\Contracts\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController implements ApiController
{
    public function index(Request $request): JsonResponse
    {
        return new JsonResponse(['data' => []]);
    }
    public function show($id): JsonResponse
    {
        return new JsonResponse(['data' => []]);
    }
    public function store(Request $request): JsonResponse
    {
        return new JsonResponse(['data' => []]);
    }
    public function update(Request $request): JsonResponse
    {
        return new JsonResponse(['data' => []]);
    }
    public function delete(Request $request): JsonResponse
    {
        return new JsonResponse(['data' => []]);
    }
}
