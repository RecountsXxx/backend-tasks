<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $keywordsForProgramming = ['programming', 'code', 'software', 'developer'];
    $keywordsForSports = ['sports', 'game', 'athlete', 'team'];
    $keywordsForTravel = ['travel', 'destination', 'trip', 'adventure'];

    $lowercaseText = strtolower($_GET['analyze_text']);

    if (containsKeywords($lowercaseText, $keywordsForProgramming)) {
        echo 'Текст связан с программированием.';
    } elseif (containsKeywords($lowercaseText, $keywordsForSports)) {
        echo 'Текст связан со спортом.';
    } elseif (containsKeywords($lowercaseText, $keywordsForTravel)) {
        echo 'Текст связан с путешествиями.';
    } else {
        echo 'Не удалось определить тему текста.';
    }
}

function containsKeywords($text, $keywords) {
    foreach ($keywords as $keyword) {
        if (strpos($text, $keyword) !== false) {
            return true;
        }
    }
    return false;
}

?>