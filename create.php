<?php
//require_once('nav.php');
require_once('connection.php');
//require_once('delete.php');


//if (isset($_POST['submit'])) {
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

//
//
//    "</td>
//                            <td>"
//                                .if ($update != true) { ?><!--."-->
<!--                                <a class='btn btn-info' type='submit'-->
<!--                                   href='registration.php?Edit=".$res['id']."'>Edit</a>-->
<!--                                <a class='btn btn-danger' type='submit'-->
<!--                                   href='save.php?Delete=". $res['id']."'>Delete</a>-->
<!--                            </td>";-->
<!--                            --><?php //} ?>
<!--                        </tr>-->
<!---->
<!--                    --><?php //} ?>


//}