<?php
require_once('nav.php');
require_once('connection.php');
$e_name = $e_fath = $e_moth = $e_dob = $e_cla = $update = '';

if (isset($_GET['Edit'])) {

    $edit_id = $_GET['Edit'];
    //echo $edit_id;

    $edit_sql = "Select * FROM student_reg WHERE id='$edit_id'";
    $result = mysqli_query($con, $edit_sql);
    $edit_result = mysqli_fetch_assoc($result);

    $e_name = $edit_result['name'];
    $e_fath = $edit_result['fathers_name'];
    $e_moth = $edit_result['mothers_name'];
    $e_dob = $edit_result['birth_date'];
    $e_cla = $edit_result['class'];
    $update = true;

    //echo $edit_result['name'];
    //print_r($edit_result);
}