<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<form style="padding: 10px;" action="script.php" method="POST">
    <input type="text" name="your_name" placeholder="Enter your name"/>
    <input type="submit" value="Ok">
</form>
<form style="padding: 10px;"  action="script.php" method="POST">
    <input type="text" placeholder="Enter your age" name="your_age">
    <input type="submit" value="Ok">
</form>
<form style="padding: 10px;"  action="script.php" method="POST">
    <input type="number" placeholder="Enter a" name="number_a">
    <input type="number" placeholder="Enter b" name="number_b">
    <input type="submit" value="Ok">
</form>

<?php
$a = 10;
$b = 50;
echo 'before: ' . $a . ',' . $b . ' | ';
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo 'after: ' . $a . ',' . $b;
?>


<h1>Tests</h1>
<form method="post" action="script.php">
    <p>1 Question</p>
    <label><input type="radio" name="question1" value="a">A</label>
    <label><input type="radio" name="question1" value="b">B(correct)</label>
    <label><input type="radio" name="question1" value="c">C</label>
    <label><input type="radio" name="question1" value="d">D</label>

    <p>2 Question</p>
    <label><input type="checkbox" name="question2[]" value="a"> A (correct)</label>
    <label><input type="checkbox" name="question2[]" value="b"> B (correct)</label>
    <label><input type="checkbox" name="question2[]" value="c">C</label>
    <label><input type="checkbox" name="question2[]" value="d">D</label>

    <p>3 Question:</p>
    <label><input type="text" name="question3"></label>

    <br><br>
    <input type="submit" value="Send">
</form>

<?php
$tag = "div";
$background_color = "#3498db";
$color = "#ffffff";
$width = "300px";
$height = "150px";
?>

<<?php echo $tag; ?> style="background-color: <?php echo $background_color; ?>;
color: <?php echo $color; ?>;
width: <?php echo $width; ?>;
height: <?php echo $height; ?>;">
Text <?php echo $tag; ?>
</<?php echo $tag; ?>>

</body>
</html>