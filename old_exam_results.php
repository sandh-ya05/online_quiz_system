<?php
include("session.php");

include "connect.php";
include "header.php";
?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <center>
            <h1>Old Quiz Results</h1>
        </center>

        <?php
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM exam_results WHERE username='$_SESSION[username]' ORDER BY id DESC");

        if (!$res) {
            echo "<center><h1>Error executing query: " . mysqli_error($link) . "</h1></center>";
            exit;
        }

        $count = mysqli_num_rows($res);
        if ($count == 0) {
            ?>
            <center>
                <h1>No Results Found </h1>
            </center>
            <?php
        } else {
            echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #006df0; color:white'>";
            echo "<th>Username</th>";
            echo "<th>Exam Type</th>";
            echo "<th>Total Questions</th>";
            echo "<th>Correct Answers</th>";
            echo "<th>Wrong Answers</th>";
            echo "<th>Exam Time</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["exam_type"] . "</td>";
                echo "<td>" . $row["total_question"] . "</td>";
                echo "<td>" . $row["correct_answer"] . "</td>";
                echo "<td>" . $row["wrong_answer"] . "</td>";
                echo "<td>" . $row["exam_time"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

</div>

<?php
include "footer.php";
?>
