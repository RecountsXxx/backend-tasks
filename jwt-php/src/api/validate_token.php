<?php
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
    $key = "your-secret-key";

    try {
        $decoded = JWT::decode($token, $key);

        echo "Access granted!";
    } catch (Exception $e) {
        echo json_encode(array("error" => "Invalid token"));
    }
}