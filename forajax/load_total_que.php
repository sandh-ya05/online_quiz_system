<?php
include("../session.php");
include "../connect.php";

$total_que = 0;
$resl = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
$total_que = mysqli_num_rows($resl);
echo $total_que;
?>
