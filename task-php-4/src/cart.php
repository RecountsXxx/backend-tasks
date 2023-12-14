<?php
if (isset($_GET['sessionId'])) {
    $sessionId = htmlspecialchars($_GET['sessionId']);
    echo "Cart Contents for Session ID: $sessionId<br>";

} else {
    echo "Session ID not specified.";
}
?>
