<?php
require_once('connection.php');


$fieldval2 = $_GET['x'];

//die();
$sql4 = "SELECT * FROM student_reg where class=" . $fieldval2;
$sql_student_id = mysqli_query($con, $sql4);
echo '<option value="">--Choose Student ID --</option>';
?>



<?php while ($res_st_id = mysqli_fetch_assoc($sql_student_id)) {
  echo '<option value="' . $res_st_id['id'] . '">'. $res_st_id['name'].' - ( ID :' . $res_st_id['id'] .')'. '</option>';
} ?>

<!-- <? //php while ($res2 = mysqli_fetch_assoc($sql_student_id)) {

      //echo $data = $res2['id'];


      ?> -->