<?php
include "../connect.php";
include "header.php";
session_start();
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Quiz Results</h1>
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
                       

                        <?php
                        $count = 0;
                        $res = mysqli_query($link, "select * from exam_results order by id desc");
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
                            echo "<th>Quiz Category</th>";
                            echo "<th>Total Questions</th>";
                            echo "<th>Correct Answers</th>";
                            echo "<th>Wrong Answers</th>";
                            echo "<th>Quiz Time</th>";
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
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
