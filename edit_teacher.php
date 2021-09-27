<?php
require_once('nav.php');
require_once('connection.php');
$t_name = $t_phone = $t_email = $t_address = $t_did = $t_dob = $t_gender = $update = '';

if (isset($_GET['Edit'])) {

    $edit_id = $_GET['Edit'];
    //echo $edit_id;

    $edit_sql = "Select * FROM teacher WHERE teacher_id='$edit_id'";
    $result = mysqli_query($con, $edit_sql);
    $edit_result = mysqli_fetch_assoc($result);

    $t_name = $edit_result['teacher_name'];
    $t_phone = $edit_result['mobile'];
    $t_email = $edit_result['email'];
    $t_address = $edit_result['address'];
    $t_did = $edit_result['designation_id'];
    $t_dob = $edit_result['teacher_dob'];
    $t_gender = $edit_result['gender'];
    $update = true;

    //echo $edit_result['name'];
    //print_r($edit_result);
}