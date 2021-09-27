<?php
require_once('nav.php');
require_once('connection.php');
require_once('delete_teacher.php');


if (isset($_POST['submit'])) {
    //echo ' Submit button okay. ';
    $t_name = $_POST['teacher_name'];
    $t_phone = $_POST['teacher_phone'];
    $t_email = $_POST['teacher_email'];
    $t_address = $_POST['teacher_address'];
    $t_did = $_POST['teacher_did'];
    $t_dob = $_POST['teacher_dob'];
    $t_gender = $_POST['teacher_gender'];

    echo $t_name;

    $sql = "INSERT INTO teacher (teacher_name, mobile, email, address, designation_id, teacher_dob, gender)
    VALUES ('$t_name', '$t_phone', '$t_email','$t_address','$t_did', '$t_dob', '$t_gender')";
    $result = mysqli_query($con, $sql);
}