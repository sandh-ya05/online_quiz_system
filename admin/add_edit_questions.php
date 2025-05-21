<?php
include "header.php";
include "../connect.php";
include("session.php");
$id = $_GET["id"];
$exam_category = '';
$res = mysqli_query($link, "select * from exam_category where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Questions Inside <?php echo $exam_category; ?></h1>
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
                        <div class="col-lg-6">
                            <form name="form1" id="questionForm" action="" method="POST" onsubmit="return validateForm()">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add New Questions</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Question</label>
                                            <input type="text" name="question" id="question" placeholder="Add Question" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Opt1</label>
                                            <input type="text" name="opt1" id="opt1" placeholder="Add opt1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Opt2</label>
                                            <input type="text" name="opt2" id="opt2" placeholder="Add opt2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Opt3</label>
                                            <input type="text" name="opt3" id="opt3" placeholder="Add opt3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Opt4</label>
                                            <input type="text" name="opt4" id="opt4" placeholder="Add opt4" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">Add Answer</label>
                                            <input type="text" name="answer" id="answer" placeholder="Answer" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateForm() {
        var question = document.getElementById('question').value.trim();
        var opt1 = document.getElementById('opt1').value.trim();
        var opt2 = document.getElementById('opt2').value.trim();
        var opt3 = document.getElementById('opt3').value.trim();
        var opt4 = document.getElementById('opt4').value.trim();
        var answer = document.getElementById('answer').value.trim();

        if (question === "" || opt1 === "" || opt2 === "" || opt3 === "" || opt4 === "" || answer === "") {
            alert("All fields are required.");
            return false;
        }

        if (answer !== opt1 && answer !== opt2 && answer !== opt3 && answer !== opt4) {
            alert("The answer must match one of the options.");
            return false;
        }

        return true;
    }
</script>

<?php
if (isset($_POST["submit1"])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count != 0) {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop' where id=$row[id]");
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") 
    or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("Question added Successfully!");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>
