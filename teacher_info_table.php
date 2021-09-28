<?php

require_once('connection.php');

$sql2 = "select * from teacher";
$sql_read = mysqli_query($con, $sql2);
//$res_array = mysqli_fetch_assoc($sql_read);
// print_r($res_array);
?>

<div class="card" style="background-color: #cce7f1;">
    <div class="card-title py-3  text-black text-center">
        <h3> Teacher's Information </h3>
    </div>

    <div class="card-body">

        <div class=" row justify-content-center text-white">

            <table class="table">

                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Name </th>
                        <th> Phone </th>
                        <th> Email </th>
                        <th> Address </th>
                        <!-- <th> Designation Id </th> -->
                        <th> Birth Date </th>
                        <th> Gender </th>
                        <th colspan="2"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($sql_read)) { ?>

                    <tr>
                        <td><?php echo $res['teacher_id']; ?> </td>
                        <td><?php echo $res['teacher_name']; ?> </td>
                        <td><?php echo $res['mobile']; ?> </td>
                        <td><?php echo $res['email']; ?> </td>
                        <td><?php echo $res['address']; ?> </td>
                        <!-- <td><? //php echo $res['designation_id']; 
                                        ?> </td> -->
                        <td><?php echo $res['teacher_dob']; ?> </td>
                        <td><?php echo $res['gender']; ?> </td>
                        <td><a class='btn btn-info' type='submit'
                                href='teacher.php?Edit=<?php echo $res['teacher_id']; ?>'>Edit</a>
                            <a class='btn btn-danger' type='submit'
                                href='delete_teacher.php?Delete=<?php echo $res['teacher_id']; ?> '>Delete</a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?
header("Location: index.php");
?>