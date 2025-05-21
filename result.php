<?php
include("session.php");
include "connect.php";
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d h:i:s", strtotime($date . "+ $_SESSION[exam_time] minutes"));
include "header.php";
?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
        $correct = 0;
        $wrong = 0;
        $total_questions = 0;
        
        // Fetch all questions for the given category
        $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
        $total_questions = mysqli_num_rows($res);
        echo"<center>";
        echo "<h3>Quiz Results</h3>";
        echo"</center>";
       
       // Display questions and check answers
    
       echo "<br>";
       echo "<br>";
       echo "<table border='1' style='width: 100%; text-align: left;'>";
       echo "<tr><th>Question No</th><th>Question</th><th>Your Answer</th><th>Correct Answer</th><th>Status</th></tr>";
       
       $i = 1;
       while ($row = mysqli_fetch_array($res)) {
           $question_no = $row["question_no"];
           $question = $row["question"];
           $correct_answer = $row["answer"];
           $user_answer = isset($_SESSION["answer"][$question_no]) ? $_SESSION["answer"][$question_no] : "Not Answered";
           
           $status = "Wrong";
           if ($user_answer == $correct_answer) {
               $correct++;
               $status = "Correct";
           } else {
               $wrong++;
           }
           
           echo "<tr>";
           echo "<td>$question_no</td>";
           echo "<td>$question</td>";
           echo "<td>$user_answer</td>";
           echo "<td>$correct_answer</td>";
           echo "<td>$status</td>";
           echo "</tr>";
           
           $i++;
       }
       echo "</table>";
       
       echo "<center>";
       echo "<br>";
       echo "Total Questions=" . $total_questions;
       echo "<br>";
       echo "Correct Answers=" . $correct;
       echo "<br>";
       echo "Wrong Answers=" . $wrong;
       echo "</center>";
       ?>

    </div>
</div>
<?php
if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($link, "insert into exam_results(id, username, exam_type, total_question, correct_answer, wrong_answer, exam_time) values(NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$total_questions', '$correct', '$wrong', '$date')") or die(mysqli_error($link));
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>