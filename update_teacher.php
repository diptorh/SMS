<?php
//require_once('nav.php');
require_once('connection.php');
//require_once('create_teacher.php');
//require_once('delete_teacher.php');


//if (isset($_POST['update'])) {

$update_id = $_POST['update_id'];
//echo $update_id;

$u_tname = $_POST['teacher_name'];
$u_tphone = $_POST['teacher_phone'];
$u_temail = $_POST['teacher_email'];
$u_taddress = $_POST['teacher_address'];

$u_tdob = $_POST['teacher_dob'];
$u_tgender = $_POST['teacher_gender'];



$update_sql = "UPDATE teacher SET teacher_name='$u_tname', mobile = '$u_tphone', email='$u_temail',address='$u_taddress ',teacher_dob='$u_tdob', gender='$u_tgender' WHERE teacher_id='$update_id'";
$result = mysqli_query($con, $update_sql);
//$edit_result = mysqli_fetch_assoc($result);


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

    //echo $edit_result['name'];
    //print_r($edit_result);
//}