<?php
require_once('nav.php');
require_once('connection.php');


$sql3 = "select  DISTINCT   class from student_reg order by class asc ";
$sql_class = mysqli_query($con, $sql3); // Query for Attendance Sheet Report

$sql5 = "select  DISTINCT   class from student_reg order by class asc ";
$sql_class5 = mysqli_query($con, $sql5);


//$result = mysqli_fetch_assoc($sql_class5);
//print_r($result);
// while ($result = mysqli_fetch_assoc($sql_class)) {
//     $result['class'] ;
// } 
//print_r($result['class']);
// $class_id = $result['class'];
//$sql4 = "SELECT * FROM student_reg where  class=" . $class_id;
//$class_from_ajax = $_GET['x'];
// $sql4 = "SELECT * FROM student_reg where class=" . $class_from_ajax;
// $sql_student_id = mysqli_query($con, $sql4);


?>


<div class="container">
    <form action="report_attendance_sheet.php" method="post">
        <h1 style="text-align: center;">Student Reports</h1> <br><br>
        <div class="row">
            <div class="col-lg-12">

                <p>

                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse"
                        aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">1. Attendance
                        Sheet Report</button>
                </p>

                <div class="row">
                    <form action="report_attendance_sheet.php" method="post">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <select id="student_list" name="student_class" class=" form-control " required>
                                            <option value="">--Choose Class --</option>
                                            <?php while ($res = mysqli_fetch_assoc($sql_class)) {
                                                echo '<option value="' . $res['class'] . '">' . $res['class'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <input type="text" required placeholder='MM/DD/YYYY - ATTENDANCE DATE'
                                            class="form-control" name='attendance_sheet_report_date'
                                            id='attendance_sheet_report_date' onfocus="(this.type='date')"
                                            onblur="(this.type='text')">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                    <div class="form-group text-center">
                                        <button class="btn btn-success" target="_blank" name="submit"
                                            type="submit">Generate
                                            Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </form>
</div>


<div class="container">
    <form action="report_student_details.php" method="post">

        <div class="row">
            <div class="col-lg-12">

                <p>

                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse2"
                        aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">2.Student
                        Details Report</button>
                </p>

                <div class="row">
                    <form action="report_attendance_sheet.php" method="post">
                        <div class="col">
                            <div class="collapse multi-collapse2" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <select id="student_list2" name="student_class2" class=" form-control "
                                            required>
                                            <option value="">--Choose Class --</option>
                                            <?php while ($res_class2 = mysqli_fetch_assoc($sql_class5)) {
                                                echo '<option value="' . $res_class2['class'] . '">' . $res_class2['class'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="collapse multi-collapse2" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <select id="student_id" name="student_id" class=" form-control " required>
                                            <option value="">--Choose Student ID --</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="collapse multi-collapse2" id="multiCollapseExample2">
                                <div class="card card-body">
                                    <div class="form-group text-center">
                                        <button class="btn btn-success" target="_blank" name="submit2"
                                            type="submit">Generate
                                            Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

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
                url: 'report_student_details_ajax.php',
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

});
</script>

</html>