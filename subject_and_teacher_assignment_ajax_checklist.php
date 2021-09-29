<?php
require_once('connection.php');


$fieldval2 = $_GET['y'];



//php while ($res2 = mysqli_fetch_assoc($sql_student_id)) {

//echo $data = $res2['id'];


$sql5 = "SELECT * FROM l_subject";
$sql_subject_id = mysqli_query($con, $sql5);


// while ($res_subject_id = mysqli_fetch_assoc($sql_subject_id)) {
//   // print_r($res_subject_id); 
//   echo $res_subject_id['subject_name'];
// }
//die();
//$subject_id = mysqli_fetch_assoc($sql_subject_id);
// echo '<option value="">--Choose Subject--</option>';


while ($res_subject_id = mysqli_fetch_assoc($sql_subject_id)) {
  echo "<tr> <td>" . $res_subject_id['subject_name'] . "</td>";
  echo '<td><input  name="studentCheckbox[' . $res_subject_id['subject_id'] . ']" type="checkbox" id="selectYN_' . $res_subject_id['subject_id'] . '" value="' . $res_subject_id['subject_id'] . '"  /></td>';
  echo " <td>  <div class='form-group text-center'>  <select id='teacher_id' name='teacher_id[" . $res_subject_id['subject_id'] . "] class=' form-control ' ><option value=''>--Choose Teacher --</option>";
  $sql4 = "select  DISTINCT   * from teacher order by teacher_id asc ";
  $sql_teacher = mysqli_query($con, $sql4);
  while ($res2 = mysqli_fetch_assoc($sql_teacher)) {
    echo '<option value="' . $res2['teacher_id'] . '">' . $res2['teacher_name'] . ' ( ID : ' . $res2['teacher_id'] . ' ) </option>';
  }
  echo "  </select></div> </td>";
  echo "<td><input type='time' class='form-control' value='" . date('H:i', strtotime($row['time_d'])) . "' id='start_time' 
  name='start_time[" . $res_subject_id['subject_id'] . "]' /></td>";
  echo "<td><input type='time' class='form-control' value='" . date('H:i', strtotime($row['time_d'])) . "' id='end_time' 
  name='end_time[" . $res_subject_id['subject_id'] . "]' /></td>";

  echo "</tr>";
}