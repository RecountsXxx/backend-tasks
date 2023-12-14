<?php
require_once('script.php');
if (isset($_GET['user']) && isset($_GET['sessionId'])) {
    $userDetails = htmlspecialchars($_GET['user']);
    $sessionId = htmlspecialchars($_GET['sessionId']);

    echo "User Details: $userDetails<br>";
    echo "Session ID: $sessionId<br>";

    $user = new User('', '');
    echo "Purchase History:<br>";
    foreach ($user->getPurchaseHistory() as $purchase) {
        echo "Date: {$purchase['date']}, Session ID: {$purchase['sessionId']}<br>";
    }

    echo "<a href='cart.php?sessionId={$sessionId}'>View Cart</a>";
} else {
    echo "User or Session ID not specified.";
}
?>
