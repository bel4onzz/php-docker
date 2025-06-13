<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController
{
    public function __construct()
    {
        return "HELLO WORLD";
    }

    public function index(Request $request): Response
    {
        return new Response(json_encode(['request' => $request->getRealMethod()]));
    }
}
