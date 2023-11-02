<?php

namespace App\Controllers;

use App\Services\App;
use App\Services\Viewes;

class Auth
{
    public function register($data = [], $files = [])
    {
        $email = $data["email"];
        $username = $data["username"];
        $full_name = $data["full_name"];
        $password = $data["password"];
        $password_confirm = $data["password_confirm"];
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
            } else die("error registration query");
        }
    }
    private function data_base_connection($config)
    {
        $conn = mysqli_connect($config["host"], $config["username"], $config["password"], $config["db"]);
        if (!$conn) {
            die("Error data base connect!");
        } else return $conn;
    }
}
