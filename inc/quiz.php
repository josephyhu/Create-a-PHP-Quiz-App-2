<?php
session_start();
include 'questions.php';

$show_score = false;
$toast = null;
$totalQuestions = count($questions);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['answer'] == $questions[$_POST['id']]['correctAnswer']) {
        $toast = 'You are correct!';
        $_SESSION['totalCorrect']++;
    } else {
        $toast = 'Sorry, you are incorrect.';
    }
}

if (!isset($_SESSION['used_indexes'])) {
    $_SESSION['used_indexes'] = [];
    $_SESSION['totalCorrect'] = 0;
}

if (count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = [];
    $show_score = true;
} else {
    $show_score = false;
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION['totalCorrect'] = 0;
        $toast = '';
    }
    do {
        $index = array_rand($questions, 1);
    } while (in_array($index, $_SESSION['used_indexes']));
    $question = $questions[$index];
    array_push($_SESSION['used_indexes'], $index);
    $answers = [$question['correctAnswer'], $question['firstIncorrectAnswer'], $question['secondIncorrectAnswer']];
    shuffle($answers);
}
