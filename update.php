<?php
require_once('nav.php');
require_once('connection.php');
require_once('create.php');
require_once('delete.php');


if (isset($_POST['update'])) {

    $update_id = $_POST['update_id'];
    //echo $update_id;

    $u_name = $_POST['students_name'];
    $u_fath = $_POST['fathers_name'];
    $u_moth = $_POST['mothers_name'];
    $u_dob = $_POST['dob'];
    $u_cla = $_POST['class'];



    $update_sql = "UPDATE student_reg SET name='$u_name', fathers_name = '$u_fath', mothers_name='$u_moth',class='$u_cla ', birth_date='$u_dob' WHERE id='$update_id'";
    $result = mysqli_query($con, $update_sql);
    //$edit_result = mysqli_fetch_assoc($result);



    //echo $edit_result['name'];
    //print_r($edit_result);
}