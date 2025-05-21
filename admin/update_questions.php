<?php
include "../connect.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quiz_id = $_POST['quiz_id'];
    $questions = $_POST['questions'];

    foreach ($questions as $question_id => $question_data) {
        $question = mysqli_real_escape_string($link, $question_data['question']);
        $option1 = mysqli_real_escape_string($link, $question_data['opt1']);
        $option2 = mysqli_real_escape_string($link, $question_data['opt2']);
        $option3 = mysqli_real_escape_string($link, $question_data['opt3']);
        $option4 = mysqli_real_escape_string($link, $question_data['opt4']);
        $answer = mysqli_real_escape_string($link, $question_data['answer']);

        $query = "UPDATE questions SET 
                  question='$question', 
                  opt1='$option1', 
                  opt2='$option2', 
                  opt3='$option3', 
                  opt4='$option4', 
                  answer='$answer' 
                  WHERE id=$question_id";

        mysqli_query($link, $query);
    }

    header("Location: add_edit_exam_questions.php?id=$quiz_id");
}
?>
