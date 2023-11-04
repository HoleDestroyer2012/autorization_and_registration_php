<?php

use App\Controllers\Auth;
use App\Services\Router;
use App\Services\App;

require_once __DIR__ . "/vendor/autoload.php";

Router::page("/login", "login");
Router::page("/register", "register");
Router::page("/home", "home");
Router::page("/profile", "profile");


Router::post("/auth/register", Auth::class, "register", true, true);
Router::post("/auth/login", Auth::class, "login", true);
Router::post("/auth/logout", Auth::class, "logout");


Router::enable();
