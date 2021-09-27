<?php


//require_once('nav.php');
require_once('connection.php');

$enable_button = false;
$fieldval2 = $_POST['x'];


$sql = "select ct.id, ct.name from student_reg ct where '$fieldval2' = ct.class ";

$res = mysqli_query($con, $sql); ?>


<?php while ($res2 = mysqli_fetch_assoc($res)) {

    $student_id = $res2['id'];

?>

<tr>
    <td><?php echo $res2['id']; ?> </td>
    <td><?php echo $res2['name']; ?> </td>
    <td>
        <?php // cheeck box attendance
            //echo '<input  checked name="studentCheckbox[' . $student_id . ']" type="checkbox" id="selectYN_' . $student_id . '" value="' . $student_id . '"  />';
            ?>

        <?php
            echo ' <input checked type="radio"  name="option[' . $student_id . ']" value="Y" /> <label>Yes</label>  

            <input type="radio" name="option[' . $student_id . ']"  value="N" /><label>No</label>';
            ?>
    </td>



</tr>


<?php $enable_button = true;
}   ?>