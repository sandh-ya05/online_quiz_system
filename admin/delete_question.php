<?php
include "../connect.php";
include("session.php");
// Check if the question ID is provided in the URL
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    // Construct the SQL DELETE query
    $delete_query = "DELETE FROM questions WHERE id = $question_id";

    // Execute the DELETE query
    if (mysqli_query($link, $delete_query)) {
        // If the deletion is successful, redirect back to the page where questions are listed
        header("Location: edit_questions.php?id=" . $_GET['quiz_id']);
        exit();
    } else {
        // If an error occurs during deletion, display an error message
        echo "Error deleting question: " . mysqli_error($link);
    }
} else {
    // If the question ID is not provided, display an error message
    echo "Question ID not provided.";
}
?>
