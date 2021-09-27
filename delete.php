<?php
require_once('nav.php');
require_once('connection.php');
require_once('create.php');
require_once('delete.php');


if (isset($_GET['Delete'])) {
    $del_id = $_GET['Delete'];
    $del_sql = "DELETE FROM student_reg WHERE id='$del_id'";
    $result = mysqli_query($con, $del_sql);
}