<?php
include("../session.php");
include"../connect.php";
$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";
$queno=$_GET["questionno"];
if(isset($_SESSION["answer"][$queno])){
    $ans=$_SESSION["answer"][$queno];
}
$res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[questionno]");
$count=mysqli_num_rows($res);

if($count==0){
    echo"over";
}
else{
    while($row=mysqli_fetch_array($res)){
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
        

    }
?>
<br>
<table>
    <tr>
        <td style="font-weight:bold; font-size: 18px; padding-left: 5px" colspan="2">
            <?php echo"(".$question_no .")". $question; ?>
        </td>
    </tr>
</table>
<table style="margin-left: 10px">
    <tr>
        <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt1;?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php
            if($ans==$opt1){
                echo"checked";
            }
            ?>>
        </td>
        <td style="padding-left:10 px">
        <?php
        echo $opt1;
        ?>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r2" value="<?php echo $opt2;?>"onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php
            if($ans==$opt2){
                echo"checked";
            }
            ?>>
        </td>
        <td style="padding-left:10 px">
        <?php
        echo $opt2;
        ?>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r3" value="<?php echo $opt3;?>"onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php
            if($ans==$opt3){
                echo"checked";
            }
            ?>>
        </td>
        <td style="padding-left:10 px">
        <?php
        echo $opt3;
        ?>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r4" value="<?php echo $opt4;?>"onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php
            if($ans==$opt4){
                echo"checked";
            }
            ?>>
        </td>
        <td style="padding-left:10 px">
        <?php
        echo $opt4;
        ?>
        </td>
    </tr>
</table>
<?php
}
?>