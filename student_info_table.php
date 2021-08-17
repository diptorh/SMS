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

                

            </table>
        </div>
    </div>
</div>


<?
// header("Location: index.php"); 
?>