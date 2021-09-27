<?php
require_once('nav.php');
require_once('connection.php');


$sql3 = "select  DISTINCT   class from student_reg order by class asc ";
$sql_class = mysqli_query($con, $sql3);


$sql4 = "select  DISTINCT   * from teacher order by teacher_name asc ";
$sql_teacher = mysqli_query($con, $sql4);

?>


<div class="container">
    <form action="attendance_save.php" method="post">
        <div class="row">
            <div class="col-lg-3  ">
                <div class="card" style="background-color: #7600a9;">
                    <div class="card-title py-3 text-white text-center">
                        <h3> Select Class </h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">

                            <select id="student_list" name="student_class" class=" form-control " required>
                                <option value="">--Choose Class --</option>
                                <?php while ($res = mysqli_fetch_assoc($sql_class)) {
                                    echo '<option value="' . $res['class'] . '">' . $res['class'] . '</option>';
                                } ?>
                            </select>

                        </div>

                        <button class="btn btn-success" id="btnclick" name="submit" type="submit">Load</button>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">

                <div class="card " style="background-color: #F5F5F5;">
                    <div class="card-title py-3  text-black text-center">
                        <h3> Student's Attendance List </h3>
                    </div>

                    <div class="card-body">

                        <table class="table justify-content-center">
                            <thead>
                                <tr>
                                    <th> Student's ID </th>
                                    <th> Student's Name </th>
                                    <th> Present </th>
                                </tr>
                            </thead>

                            <tbody id="resultdiv">
                                <!-- Ajax data table -->

                            </tbody>

                        </table>
                        <div class="row  ">

                            <div class="col-lg-6  ">
                                <div class="form-group">

                                    <!-- <input type="text" id="teachers_name" name="teachers_name" class="form-control"
                                        placeholder="TEACHER'S NAME"> -->

                                    <select id="teacher_name" name="teacher_name" class=" form-control " required>
                                        <option value="">--Choose Teacher --</option>
                                        <?php while ($res2 = mysqli_fetch_assoc($sql_teacher)) {
                                            echo '<option value="' . $res2['teacher_name'] . '">' . $res2['teacher_name'] . ' ( ID : ' . $res2['teacher_id'] . ' ) ' .  '</option>';
                                        } ?>
                                    </select>

                                </div>



                            </div>


                            <div class="col-lg-6  ">
                                <div class="form-group">
                                    <input type="text" required placeholder='MM/DD/YYYY - ATTENDANCE DATE'
                                        class="form-control" name='attendance_date' id='attendance_date'
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>
                            </div>

                        </div>
                        <button class=" btn btn-success mt-2" id="submit_button" name="submit"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </form>
</div>


</body>


<script>
$(document).ready(function() {

    let submit_button = document.getElementById("submit_button");
    submit_button.disabled = true;

    $('#btnclick').click(function(e) {
        submit_button.disabled = false;
    });

    $('#btnclick').click(function(e) {
        e.preventDefault();
        submit_button.disabled = false;
        var fieldval = '';
        var fieldval = $('#student_list option:selected').val();

        if (fieldval != '') {
            $.ajax({
                url: 'attendance_student_list.php',
                method: 'post',
                data: {
                    x: fieldval
                },
                success: function(data) {
                    $('#resultdiv').html(data);
                }

            });
        }

    });



    // let input = document.querySelector("#attendance_date");
    // let button = document.querySelector("#submit_button");
    // button.disabled = true;
    // input.addEventListener("change", stateHandle);

    // function stateHandle() {
    //     if (document.querySelector("#attendance_date").value == null) {
    //         button.disabled = true;
    //     } else {

    //     }
    // }

});
</script>

</html>