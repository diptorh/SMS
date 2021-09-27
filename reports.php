<?php
require_once('nav.php');
require_once('connection.php');


$sql3 = "select  DISTINCT   class from student_reg order by class asc ";
$sql_class = mysqli_query($con, $sql3);

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
                                        <input type="text" required placeholder='MM/DD/YYYY - DATE' class="form-control"
                                            name='attendance_sheet_report_date' id='attendance_sheet_report_date'
                                            onfocus="(this.type='date')" onblur="(this.type='text')">
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


</body>

</html>