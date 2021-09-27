<?php
require_once('nav.php');
require_once('connection.php');


if (isset($_POST['submit'])) {

    //$studentCheckbox = $_POST['studentCheckbox'];
    $stu_class = $_POST['student_class'];
    $attendance_date = date('Y-m-d', strtotime($_POST['attendance_date']));
    $teacher_name = $_POST['teacher_name'];
    $option =  $_POST['option'];


    foreach ($option as $student => $value) {
        $sql = "INSERT INTO attendance (student_id, present_yn,class,teacher_name,attendance_date)
                VALUES ('$student', '$value', '$stu_class', '$teacher_name', '$attendance_date')";
        $result = mysqli_query($con, $sql);
    }

    // foreach ($studentCheckbox as $student) { // $studentCheckbox = $_POST['studentCheckbox']; for checkbox
    //     $sql = "INSERT INTO attendance (student_id, present_yn,class,teacher_name,attendance_date)
    //                             VALUES ('$student', 'Y', '$stu_class', '$teacher_name', '$attendance_date')";
    //     $result = mysqli_query($con, $sql);
    // }
}
echo '<script>alert("Attendance completed")</script>';
echo "<script> window.location.href = 'attendance_form.php';</script>";