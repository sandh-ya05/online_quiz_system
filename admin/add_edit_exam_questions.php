<?php
include "header.php";
include"../connect.php";
include("session.php");
?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Select To Add and Edit</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Quiz Name</th>
                                                    <th scope="col">Quiz Time</th>
                                                    <th scope="col">Add Questions</th>
                                                    <th scope="col">Edit Question</th>
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
                                                    <td><a href="add_edit_questions.php? id=<?php echo $row["id"]?>">Add</a></td>
                                                    <td><a href="edit_questions.php? id=<?php echo $row["id"]?>">Edit</a></td>
                                                    
                                                </tr>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>