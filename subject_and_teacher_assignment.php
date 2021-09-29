<?php
require_once('nav.php');
require_once('connection.php');


// $sql3 = "select  DISTINCT   class from student_reg order by class asc ";
// $sql_class = mysqli_query($con, $sql3); // Query for Attendance Sheet Report

$sql5 = "select  DISTINCT   class from student_reg order by class asc ";
$sql_class5 = mysqli_query($con, $sql5);

$sql6 = "select  *  from l_subject order by subject_id ";
$sql_subject = mysqli_query($con, $sql6);


$sql4 = "select  DISTINCT   * from teacher order by teacher_name asc ";
$sql_teacher = mysqli_query($con, $sql4);

?>

<div class="container">
    <form action="subject_and_teacher_assignment_save.php" method="post">
        <h2 style="text-align: center;">Subject and Teacher Assignment</h2> <br>
        <div class="row">

            <div class="col-lg-12">


                <div class="row">
                    <form action="report_attendance_sheet.php" method="post">
                        <div class="col-3">

                            <div class="card card-body">
                                <div class="form-group text-center">
                                    <label for="student_class2">Class</label>
                                    <select id="student_list2" name="student_class2" class=" form-control " required>
                                        <option value="">-- --</option>
                                        <?php while ($res_class2 = mysqli_fetch_assoc($sql_class5)) {
                                            echo '<option value="' . $res_class2['class'] . '">' . $res_class2['class'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="card card-body">


                                <table class="table justify-content-center">
                                    <thead>
                                        <tr>
                                            <th> Subject Name </th>
                                            <th> Select </th>
                                            <th style="text-align: center;"> Teacher </th>
                                            <th style="text-align: center;"> Class Start Time </th>
                                            <th style="text-align: center;"> Class End Time </th>

                                        </tr>
                                    </thead>

                                    <tbody id="subject_name">


                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <!-- <div class="col">
                            <div class="collapse multi-collapse2" id="multiCollapseExample1"> -->
                        <!-- <div class="card card-body">
                                <div class="form-group">
                                    <select id="student_id" name="student_id" class=" form-control " required>
                                        <option value="">--Student --</option>

                                    </select>
                                </div>
                            </div> -->
                        <!-- </div> -->
                        <!-- <div class="col">

                            <div class="card card-body">
                                <div class="form-group text-center">
                                    <label for="start_time">Class Start Time</label>
                                    <input type="time" class="form-control" value="<? //php $date = date("H:i", strtotime($row['time_d']));
                                                                                    //echo "$date"; 
                                                                                    ?>" id="start_time"
                                        name="start_time" />
                                </div>
                            </div>

                        </div> -->

                        <!-- <div class="col">
                            <div class="card card-body">
                                <div class="form-group text-center">
                                    <label for="end_time">Class End Time</label>
                                    <input type="time" class="form-control" value="<? //php $date = date("H:i", strtotime($row['time_d']));
                                                                                    //echo "$date"; 
                                                                                    ?>" id="end_time"
                                        name="end_time" />
                                </div>
                            </div>

                        </div> -->


                </div> <!-- 1st row ends -->
                <!-- <div class="row mt-5">
                    <div class="col">

                        <div class="card card-body">


                            <table class="table justify-content-center">
                                <thead>
                                    <tr>
                                        <th> Subject Name </th>
                                        <th> Select </th>
                                        <th style="text-align: center;"> Teacher </th>
                                        <th style="text-align: center;"> Class Start Time </th>
                                        <th style="text-align: center;"> Class End Time </th>

                                    </tr>
                                </thead>

                                <tbody id="subject_name">


                                </tbody>

                            </table>
                        </div>
                    </div>


                      <div class="col">

                        <div class="card card-body">
                            <div class="form-group text-center">
                                <select id="teacher_name" name="teacher_name" class=" form-control " required>
                                    <option value="">--Choose Teacher --</option>
                                    <? //php while ($res2 = mysqli_fetch_assoc($sql_teacher)) {
                                    // echo '<option value="' . $res2['teacher_id'] . '">' . $res2['teacher_name'] . ' ( ID : ' . $res2['teacher_id'] . ' ) ' .  '</option>';
                                    // } 
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div> -->
                <!-- </div>  -->


                <div class="row mt-5">



                    <div class="col-4">

                    </div>
                    <div class="col-4">
                    </div>

                    <div class="col-4">

                        <div class="col">

                            <div class="card card-body">
                                <div class="form-group text-center">
                                    <button class="btn btn-success" target="_blank" id="assign" name="submit"
                                        type="submit">Assign</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



    </form>
    <!-- </div> -->

</div>
</div>
</form>
</div>
<!-- <div id=resultdiv> </div> -->

</body>

<script>
$(document).ready(function() {



    $('#student_list2').click(function() {
        //e.preventDefault();

        var fieldval = '';
        var fieldval = $('#student_list2 option:selected').val();

        if (fieldval != '') {
            $.ajax({
                url: 'subject_and_teacher_assignment_ajax.php',
                method: 'GET',
                data: {
                    x: fieldval
                },
                success: function(data) {
                    $('#student_id').html(data);
                }

            });
        }

    });

    let input = document.querySelector("#student_list2");
    let button = document.querySelector("#assign");
    button.disabled = true;
    input.addEventListener("change", stateHandle);

    function stateHandle() {
        if (document.querySelector("#student_list2").value == null) {
            button.disabled = true;
        } else {
            button.disabled = false;
        }
    }




    $('#student_list2').click(function() {
        //e.preventDefault();

        var fieldval2 = '';
        var fieldval2 = $('#student_list2 option:selected').val();

        if (fieldval2 != '') {
            $.ajax({
                url: 'subject_and_teacher_assignment_ajax_checklist.php',
                // url: 'subject_and_teacher_assignment_ajax.php',

                method: 'GET',
                data: {
                    y: fieldval2
                },
                success: function(data) {
                    $('#subject_name').html(data);
                }

            });
        }

    });



});
</script>

</html>