<?php

require_once('connection.php');

$sql2 = "select * from student_reg  order by id desc ";
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
                        <th> Birth Date </th>
                        <th> Class </th>
                        <?php if ($update != true) { ?>
                            <th colspan="2" style="text-align: center;"> Action </th>
                        <?php } ?>
                    </tr>
                    </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($sql_read)) { ?>

                        <tr>
                            <td><?php echo $res['id']; ?> </td>
                            <td><?php echo $res['name']; ?> </td>
                            <td><?php echo $res['fathers_name']; ?> </td>
                            <td><?php echo $res['mothers_name']; ?> </td>
                            <td><?php echo $res['birth_date']; ?> </td>
                            <td><?php echo $res['class']; ?> </td>
                            <td>
                                <?php if ($update != true) { ?>
                                <a class="btn btn-info" type="submit"
                                   href="registration.php?Edit=<?php echo $res['id']; ?>">Edit</a>
                                <a class="btn btn-danger" type="submit"
                                   href="delete.php?Delete= <?php echo $res['id']; ?> ">Delete</a>
                            </td>
                            <?php } $update = false; ?>
                        </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>


<?
// header("Location: index.php"); 
?>