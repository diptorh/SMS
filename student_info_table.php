<?php

require_once('connection.php');

$sql2 = "select * from student_reg";
$sql_read = mysqli_query($con, $sql2);
//$res_array = mysqli_fetch_assoc($sql_read);
// print_r($res_array);
?>

    <div class="card" style="background-color: #F5F5F5;">
        <div class="card-title py-3  text-black text-center">
            <h3> Student's Information </h3>
        </div>

        <div class="card-body">

            <div class=" row justify-content-center text-white">

                <table class="table">

                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Father </th>
                        <th> Mother </th>
                        <th> Date of Birth </th>
                        <th> Class </th>
                        <th colspan="2"> Action </th>
                    </tr>
                    </thead>

                    <?php while ($res = mysqli_fetch_assoc($sql_read)) { ?>

                        <tr>
                            <td><?php echo $res['id']; ?> </td>
                            <td><?php echo $res['name']; ?> </td>
                            <td><?php echo $res['fathers_name']; ?> </td>
                            <td><?php echo $res['mothers_name']; ?> </td>
                            <td><?php echo $res['birth_date']; ?> </td>
                            <td><?php echo $res['class']; ?> </td>
                            <td><a class="btn btn-info" type="submit" href="index.php?Edit=<?php echo $res['id']; ?>">Edit</a>
                                <a class="btn btn-danger" type="submit"
                                   href="save.php?Delete= <?php echo $res['id']; ?> ">Delete</a>
                            </td>

                        </tr>

                    <?php } ?>

                </table>
            </div>
        </div>
    </div>


<?
// header("Location: index.php"); 
?>