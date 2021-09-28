<?php
require_once('nav.php');
require_once('connection.php');
require_once('delete.php');


// if (isset($_POST['submit'])) {
//echo ' Submit button okay. ';
$stu_name = $_POST['students_name'];
$fath_name = $_POST['fathers_name'];
$moth_name = $_POST['mothers_name'];
$dob = $_POST['dob'];
$class = $_POST['class'];

//echo $stu_name;

$sql = "INSERT INTO student_reg (name, fathers_name, mothers_name,class,birth_date)
    VALUES ('$stu_name', '$fath_name', '$moth_name','$class','$dob')";
$result = mysqli_query($con, $sql);
// }