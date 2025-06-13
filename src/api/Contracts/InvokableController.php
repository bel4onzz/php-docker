<?php

namespace Api\Contracts;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface InvokableController
{
    public function __invoke(Request $request): JsonResponse;
}