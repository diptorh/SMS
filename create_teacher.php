<?php

require_once('connection.php');


//if (isset($_POST['submit'])) {
//echo ' Submit button okay. ';
$t_name = $_POST['teacher_name'];
$t_phone = $_POST['teacher_phone'];
$t_email = $_POST['teacher_email'];
$t_address = $_POST['teacher_address'];
$t_dob = $_POST['teacher_dob'];
$t_gender = $_POST['teacher_gender'];


$sql = "INSERT INTO teacher (teacher_name, mobile, email, address , teacher_dob, gender)
VALUES ('$t_name', '$t_phone', '$t_email','$t_address', '$t_dob', '$t_gender')";
$result = mysqli_query($con, $sql);

$sql3 = "select * from teacher";
$sql_read2 = mysqli_query($con, $sql3);

while ($res = mysqli_fetch_assoc($sql_read2)) {

    echo "<tr>
        <td>" . $res['teacher_id'] . "</td>
        <td>" . $res['teacher_name'] . " </td>
        <td>" . $res['mobile'] . "</td>
        <td>" . $res['email'] . "</td>
        <td>" . $res['address'] . "</td>
        <td>" . $res['teacher_dob'] . "</td>
        <td>" . $res['gender'] . "</td>
        <td><a class='btn btn-info' type='submit'
                href='teacher.php?Edit=" . $res['teacher_id'] . "'>Edit</a>
            <a class='btn btn-danger' type='submit'
                href='delete_teacher.php?Delete=" . $res['teacher_id'] . "'>Delete</a>
        </td>

    </tr>";
} 

//header("Location:teacher.php");