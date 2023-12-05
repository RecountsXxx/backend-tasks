<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['your_name'])){
    $name = $_POST['your_name'];
    echo 'Hello my name is ' . $name;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['your_age'])){
    $age = $_POST['your_age'];
    if(is_numeric($age))
        echo 'My age is ' . $age;
    else
        echo 'Is not number';
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['number_a']) && isset($_POST['number_b'])){
    $a = $_POST['number_a'];
    $b = $_POST['number_b'];
    echo 'Result: ' . $a + $b;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['question1']) && isset($_POST['question3'])){
    $score = 0;

    $question1_answer = $_POST["question1"];
    if ($question1_answer == "b") {
        $score++;
    }

    $question2_answers = $_POST["question2"];
    $correct_answers2 = ["a", "b"];
    if (array_diff($question2_answers, $correct_answers2) === array_diff($correct_answers2, $question2_answers)) {
        $score++;
    }

    $question3_answer = $_POST["question3"];
    if($question3_answer == "Word"){
        $score++;
    }

    echo 'Your score: ' . $score . ' / 3';
}
