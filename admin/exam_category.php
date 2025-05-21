<?php
include "header.php";
include "../connect.php";
include("session.php");
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Quiz</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form class="form1" action="" method="Post">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Quiz</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="New Exam" class="form-control-label">New Quiz Category</label>
                                            <input type="text" name="examname" placeholder="Add exam Category" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Exam Time In Minutes" class="form-control-label">Quiz Time In Minutes</label>
                                            <input type="text" name="examtime" placeholder="Exam Time In Minutes" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Add Exam" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Quiz Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Quiz Name</th>
                                                    <th scope="col">Quiz Time</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count=0;
                                                $res=mysqli_query($link,"select * from exam_category");
                                                while($row=mysqli_fetch_array($res)){
                                                    $count=$count+1;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count; ?></th>
                                                        <td><?php echo $row["category"]; ?></td>
                                                        <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                        <td><a href="edit.php?id=<?php echo $row["id"]?>">Edit</a></td>
                                                        <td><a href="delete.php?id=<?php echo $row["id"] ?>">Delete</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["submit1"])) {
    $examname = trim($_POST["examname"]);
    $examtime = trim($_POST["examtime"]);

    if (empty($examname) || empty($examtime)) {
        ?>
        <script type="text/javascript">
            alert("Both fields are required.");
        </script>
        <?php
    } else {
        mysqli_query($link, "insert into exam_category values(NULL, '$examname', '$examtime')")
            or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            alert("Quiz added successfully");
            window.location.href = window.location.href;
        </script>
        <?php
    }
}
?>

<?php
include "footer.php";
?>
