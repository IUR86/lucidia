<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected string|null $subdomain;

    public function __construct()
    {
        $this->subdomain = request()->route('subdomain');
    }
}
