<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>

<?php
require_once 'script.php';

$users = [
    new User('John Doe', 'john@example.com'),
    new User('Jane Smith', 'jane@example.com'),
    new User('Bob Johnson', 'bob@example.com'),
    new User('Alice Brown', 'alice@example.com'),
    new User('Charlie Davis', 'charlie@example.com'),
];

foreach ($users as $user) {
    $sessionId = uniqid();
    $date = date('Y-m-d H:i:s');
    $user->addToPurchaseHistory($sessionId, $date);

    echo "<a href='session.php?user={$user->getUser()}&sessionId={$sessionId}'>{$user->getUser()}</a><br>";
}
?>

</body>
</html>
