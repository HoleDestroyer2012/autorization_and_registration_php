<?php

use App\Controllers\Auth;
use App\Services\Router;
use App\Services\App;

require_once __DIR__ . "/vendor/autoload.php";

App::start();

Router::page("/login", "login");
Router::page("/register","register");
Router::page("/home","home");

Router::post("/auth/register", Auth::class, "register", true, true);



Router::enable();
