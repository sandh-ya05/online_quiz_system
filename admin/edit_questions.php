<?php
include "header.php";
include "../connect.php";
include("session.php");

if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];

    // Prepare the query to fetch quiz details
    $quiz_query = mysqli_prepare($link, "SELECT * FROM exam_category WHERE id = ?");
    mysqli_stmt_bind_param($quiz_query, "i", $quiz_id);
    mysqli_stmt_execute($quiz_query);
    $quiz_result = mysqli_stmt_get_result($quiz_query);
    $quiz = mysqli_fetch_assoc($quiz_result);

    // Prepare the query to fetch questions for the selected quiz
    $questions_query = mysqli_prepare($link, "SELECT * FROM questions WHERE category = ?");
    mysqli_stmt_bind_param($questions_query, "s", $quiz['category']);
    mysqli_stmt_execute($questions_query);
    $questions_result = mysqli_stmt_get_result($questions_query);
    $questions = $questions_result;
}
?>

<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Questions for <?php echo $quiz['category']; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="questionsForm" action="update_questions.php" method="post" onsubmit="return validateForm()">
                            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                            <?php
                            $count = 0;
                            if (mysqli_num_rows($questions) == 0) {
                                echo "<p>No questions to edit.</p>";
                                echo '<a href="add_edit_exam_questions.php" class="btn btn-primary">Go Back</a>';
                            } else {
                                while ($question = mysqli_fetch_assoc($questions)) {
                                    $count++;
                                    ?>
                                    <div class="form-group">
                                        <label for="question_<?php echo $count; ?>">Question <?php echo $count; ?></label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][question]" value="<?php echo htmlspecialchars($question['question']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="option1_<?php echo $count; ?>">Option 1</label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][opt1]" value="<?php echo htmlspecialchars($question['opt1']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="option2_<?php echo $count; ?>">Option 2</label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][opt2]" value="<?php echo htmlspecialchars($question['opt2']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="option3_<?php echo $count; ?>">Option 3</label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][opt3]" value="<?php echo htmlspecialchars($question['opt3']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="option4_<?php echo $count; ?>">Option 4</label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][opt4]" value="<?php echo htmlspecialchars($question['opt4']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer_<?php echo $count; ?>">Answer</label>
                                        <input type="text" class="form-control" name="questions[<?php echo $question['id']; ?>][answer]" value="<?php echo htmlspecialchars($question['answer']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger" onclick="deleteQuestion(<?php echo $question['id']; ?>)">Delete</button>
                                    </div>
                                    <hr>
                                <?php }
                                ?>
                                <button type="submit" class="btn btn-primary">Update Questions</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>

<script>
    function validateForm() {
        const form = document.getElementById('questionsForm');
        const questions = form.querySelectorAll('[name^="questions"]');
        
        for (let i = 0; i < questions.length; i += 7) {
            const question = questions[i].value.trim();
            const opt1 = questions[i + 1].value.trim();
            const opt2 = questions[i + 2].value.trim();
            const opt3 = questions[i + 3].value.trim();
            const opt4 = questions[i + 4].value.trim();
            const answer = questions[i + 5].value.trim();

            if (!question || !opt1 || !opt2 || !opt3 || !opt4 || !answer) {
                alert("All fields are required.");
                return false;
            }

            if (![opt1, opt2, opt3, opt4].includes(answer)) {
                alert("The answer must match one of the options.");
                return false;
            }
        }

        return true;
    }

    function deleteQuestion(questionId) {
        if (confirm("Are you sure you want to delete this question?")) {
            window.location.href = "delete_question.php?id=" + questionId;
        }
    }
</script>
