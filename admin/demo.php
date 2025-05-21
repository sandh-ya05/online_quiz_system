<?php
include "header.php";
include "../connect.php";
include("session.php");
// Fetch some basic statistics from the database
$total_users = mysqli_query($link, "SELECT COUNT(*) AS count FROM student");
$total_users_count = mysqli_fetch_assoc($total_users)['count'];

$total_quizzes = mysqli_query($link, "SELECT COUNT(*) AS count FROM exam_category");
$total_quizzes_count = mysqli_fetch_assoc($total_quizzes)['count'];

$total_questions = mysqli_query($link, "SELECT COUNT(*) AS count FROM questions");
$total_questions_count = mysqli_fetch_assoc($total_questions)['count'];

$recent_results = mysqli_query($link, "SELECT * FROM exam_results ORDER BY id DESC LIMIT 5");
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Welcome Admin</h1>
            </div>
        </div>
    </div>
</div>



        <!-- Section to View All Students -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">All Students</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = mysqli_query($link, "SELECT id, firstname, lastname, username, email FROM student");
                                while ($row = mysqli_fetch_assoc($students)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['firstname']}</td>";
                                    echo "<td>{$row['lastname']}</td>";
                                    echo "<td>{$row['username']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>
