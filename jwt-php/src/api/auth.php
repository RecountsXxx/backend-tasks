<?php
include_once './models/Database.php';
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnect();

    $username = mysqli_real_escape_string($conn, $username);

    $request = "SELECT username, password FROM users WHERE username = '$username'";
    $result = $conn->query($request);

    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $key = "key";
                $payload = array(
                    "username" => $username
                );

                $token = JWT::encode($payload, $key,"HS256");
                echo json_encode(array("username" =>$username, "token" => $token));
            } else {
                echo json_encode(array("error" => "Invalid password"));
            }
        }
    }
    else {
            echo json_encode(array("error" => "User not found"));
        }

    $conn->close();
}