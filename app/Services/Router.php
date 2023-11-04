<?php

namespace App\Services;

class Router
{
    private static $list = [];
    public static function page($uri, $page_name)
    {
        self::$list[] = [
            "uri" => $uri,
            "page_name" => $page_name,
            "post" => false,
        ];
    }
    public static function enable()
    {
        $query = $_GET["q"];
        foreach (self::$list as $route) {
            if ($route["post"] === true && $_SERVER["REQUEST_METHOD"] === "POST" && $route["method"] === explode("/", $query)[1] && isset($route["method"])) {
                $action = new $route["class"];
                $method = $route["method"];
                if ($route["formdata"] && $route["files"]) {
                    $action->$method($_POST, $_FILES);
                } elseif ($route["formdata"] && !$route["files"]) {
                    $action->$method($_POST);
                } elseif (!$route["formdata"] && !$route["files"]) {
                    $action->$method();
                }
                die;
            } else {
                if (isset($route["page_name"]) && $route["uri"] === "/" . $query) {
                    require_once "viewes/pages/" . $route["page_name"] . ".php";
                    die;
                }
            }
        }
        self::not_found_page();
    }
    private static function not_found_page()
    {
        require_once "viewes/errors/404.php";
    }

    public static function post($uri, $class, $method, $formdata = false, $files = false)
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true,
            "formdata" => $formdata,
            "files" => $files
        ];
    }

    public static function redirect($uri)
    {
        header("Location: http://registrationandautorizationphp/" . $uri);
    }
}
