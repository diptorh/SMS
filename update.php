<?php
//require_once('nav.php');
require_once('connection.php');
//require_once('create.php');
//require_once('delete.php');


//if (isset($_POST['update'])) {
$update=false;
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




$sql2 = "select * from student_reg  order by id desc ";
$sql_read = mysqli_query($con, $sql2);

while ($res = mysqli_fetch_assoc($sql_read)) {

    echo "<tr>
                            <td>".$res['id']."</td>
                            <td>".$res['name']."</td>
                            <td>".$res['fathers_name']."</td>
                            <td>".$res['mothers_name']." </td>
                            <td>".$res['birth_date']."</td>
                            <td>".$res['class']."</td>
        <td><a class='btn btn-info' type='submit'
                href='registration.php?Edit=" . $res['id'] . "'>Edit</a>
            <a class='btn btn-danger' type='submit'
                href='delete.php?Delete=" . $res['id'] . "'>Delete</a>
        </td>

    </tr>";
}
$update=false;