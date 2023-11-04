<?php

namespace App\Controllers;

use App\Services\App;
use App\Services\Router;

class Auth
{
    public function login($data)
    {
        $username = $data["username"];
        $password = $data["password"];

        $this->check_login_query($username, $password);
    }
    public function logout()
    {
        session_start();
        unset($_SESSION["loggined"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["user"]);
        Router::redirect("home");
        die;
    }
    public function register($data = [], $files = [])
    {
        $email = $data["email"];
        $username = $data["username"];
        $full_name = $data["full_name"];
        $password = $data["password"];
        $avatar = $files["avatar"];

        $fileName = time() . "_" . $avatar["name"];
        $path = "uploads/avatars/" . $fileName;

        if (move_uploaded_file($avatar["tmp_name"], $path)) {
            $this->register_query_db($email, $username, $full_name, $password, $path);
        } else {
            die("error downloading user avatar");
        }
    }
    private function register_query_db($email, $username, $full_name, $password, $avatar_path)
    {
        $db_settings = App::$db_settings;
        $conn = $this->data_base_connection($db_settings);
        $sql = "INSERT INTO users (email, username, full_name, password, avatar_path) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $email, $username, $full_name, $password, $avatar_path);
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                Router::redirect("home");
            } else die("error registration query");
        }
    }
    private function check_login_query($username, $password)
    {
        $db_settings = App::$db_settings;
        $conn = $this->data_base_connection($db_settings);
        $sql = "SELECT * FROM `users` WHERE username = ?;";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    if ($password === $user["password"]) {
                        session_start();
                        $_SESSION["loggined"] = true;
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["user"] = $user;
                        unset($_SESSION["login_error"]);
                        print_r($_SESSION);
                        Router::redirect("home");
                    } else {
                        session_start();
                        $_SESSION["loggined"] = false;
                        $_SESSION["login_error"] = "wrong password";
                        Router::redirect("login");
                    }
                } else {
                    session_start();
                    $_SESSION["loggined"] = false;
                    $_SESSION["login_error"] = "user is not found";
                    Router::redirect('login');
                }
            }
        } else die("error login query");
    }
    private function data_base_connection($config)
    {
        $conn = mysqli_connect($config["host"], $config["username"], $config["password"], $config["db"]);
        if (!$conn) {
            die("Error data base connect!");
        } else return $conn;
    }
}
