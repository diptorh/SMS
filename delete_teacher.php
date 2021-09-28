<?php
require_once('nav.php');
require_once('connection.php');
//require_once('create_teacher.php');
//require_once('delete_teacher.php');


if (isset($_GET['Delete'])) {
    $del_id = $_GET['Delete'];
    $del_sql = "DELETE FROM teacher WHERE teacher_id='$del_id'";
    $result = mysqli_query($con, $del_sql);
    header("Location: teacher.php");
}