<?php

namespace Api\Contracts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface ApiController {
    public function index(Request $request): JsonResponse;
    public function show($id): JsonResponse;
    public function store(Request $request): JsonResponse;
    public function update(Request $request): JsonResponse;
    public function delete(Request $request): JsonResponse;
}
