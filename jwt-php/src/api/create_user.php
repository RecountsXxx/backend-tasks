<?php
include_once './models/Database.php';
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

    $db = new Database();
    $conn = $db->getConnect();

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $key = "key";
        $payload = array(
            "username" => $username
        );

        $token = JWT::encode($payload, $key,"HS256");
        echo json_encode(array("username" => $username,"token" => $token));

        $conn->close();
    } else {
        echo json_encode(array("error" => "Registration failed"));
    }
}