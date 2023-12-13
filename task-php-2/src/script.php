<?php
//1
$a = 10;
$b = 2;
$c = 4;

if($a % $b == 0){
 echo "$a kratno $b";
}
else{
    echo 'Ne kratno';
}
echo '</br>';
if($a % $c == 0){
    echo "$a kratno $c";
}
else{
    echo 'Ne kratno';
}
echo '</br>';
//2
function getMaxNumberSquare($a, $b){
    $square = max($a,$b);
    return $square * $square;
}

echo getMaxNumberSquare(10,52);
echo '</br>';
//3
$month = 3;
$year = date('Y');
$firstDayOfMonth = new DateTime("$year-$month-01");
$lastDayOfMonth = $firstDayOfMonth->format('t');
echo 'Days in month: ' . $lastDayOfMonth;
echo '</br>';
//4
if(2001 % 4 == 0){
    echo '2001 visokostnii';
}
else{
    echo '2001 ne visokostnii';
}
echo '</br>';
//5
$number_a = 3;
$number_b = 9;
if($number_a % 3 == 0 && $number_b % 3 == 0){
    echo 'Suma: ' . $number_a + $number_b;
}
else if($number_b != 0){
    echo 'Delenie: ' . $number_a / $number_b;
}
else{
    echo 'Ne correct vvod';
}
echo '</br>';
//6
if(isset($_SESSION['session_id'])){
    $session_id = $_SESSION['session_id'];

    if($session_id == 0){
        $actionText = "Вы успешно зарегестрировались!";
        echo '<form action="' . htmlspecialchars($actionText) . '" method="post">';
        echo '  <label for="login">Логин:</label>';
        echo '  <input type="text" id="login" name="login" required><br>';
        echo '  <label for="password">Пароль:</label>';
        echo '  <input type="password" id="password" name="password" required><br>';
        echo '  <input type="submit" value="Зарегистрироваться">';
        echo '</form>';
        $_SESSION['session_id'] = 1;
    } elseif ($session_id == 1) {
        echo 'Вы зарегистрированы, войдите.';
    }
}
?>
