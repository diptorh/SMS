<?php
require_once('nav.php');
require_once('connection.php');


if (isset($_POST['submit'])) {

    $subjectArrayCheckbox = $_POST['studentCheckbox'];
    //echo $studentCheckbox;
    //die();
    $stu_class = $_POST['student_class2'];
    // $attendance_date = date('Y-m-d', strtotime($_POST['attendance_date']));
    $teacher_id_arr = $_POST['teacher_id'];
    // echo '<pre>';
    // print_r($teacher_id_arr);
    // print_r($_POST);
    // die();
    // $option =  $_POST['option'];
    $start_time_array = $_POST['start_time'];
    $end_time_array = $_POST['end_time'];

    // foreach ($option as $student => $value) {
    //     $sql = "INSERT INTO attendance (student_id, present_yn,class,teacher_name,attendance_date)
    //             VALUES ('$student', '$value', '$stu_class', '$teacher_name', '$attendance_date')";
    //     $result = mysqli_query($con, $sql);
    // }

    foreach ($subjectArrayCheckbox as $subjectId) { // $subjectArrayCheckbox = $_POST['studentCheckbox']; for checkbox
        // echo $subjectId;
        // echo '------------';
        // echo $teacher_id_arr[$subjectId];
        // echo '##############<br/>';
        $sql = "INSERT INTO subject_detail (subject_id,class_id,teacher_id,start_time,END_time)
                                VALUES ('$subjectId', '$stu_class', '$teacher_id_arr[$subjectId]','$start_time_array[$subjectId]','$end_time_array[$subjectId]')";
        $result = mysqli_query($con, $sql);
    }
}
echo '<script>alert("Assignment completed")</script>';
echo "<script> window.location.href = 'subject_and_teacher_assignment.php';</script>";