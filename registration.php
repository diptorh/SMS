<?php
require_once('nav.php');
require_once('connection.php');
require_once('edit.php');
//require_once('update.php');

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4  ">
            <div class="card" style="background-color: #7600a9;">
                <div class="card-title py-3  text-white text-center">
                    <h3> Student's Registration </h3>
                </div>

                <div class="card-body">

                    <form   method="post">

                        <div class="form-group">
                            <input type="text" class=" form-control" id='students_name' name='students_name' placeholder="Students Name"
                                   value="<?php echo $e_name; ?>" required>

                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" id='fathers_name' name='fathers_name' placeholder="Fathers Name"
                                   value="<?php echo $e_fath; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" id='mothers_name' name='mothers_name' placeholder="Mothers Name"
                                   value="<?php echo $e_moth; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" id='dob' name='dob' placeholder="MM/DD/YYYY - DATE OF BIRTH"
                                   value="<?php echo $e_dob; ?>" onfocus="(this.type='date')" onblur="(this.type='text')"
                                   required>
                        </div>

                        <div class="form-group">
                            <select id="class" name="class" class=" form-control " value="<?php echo $e_cla; ?>"
                                    required >
                                <option value="">--Choose Class --</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                                <option value="4">Class 4</option>
                                <option value="5">Class 5</option>
                                <option value="6">Class 6</option>
                                <option value="7">Class 7</option>
                                <option value="8">Class 8</option>
                                <option value="9">Class 9</option>
                                <option value="10">Class 10</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="id_update" class=" form-control" name='update_id' value="<?php echo $edit_id; ?>">
                        </div>

                        <div class="form-group">
                            <?php if ($update == true) { ?>
                                <button class="btn btn-warning" id="update" name="update" type="submit">Update</button>
                            <?php  } else { ?>
                                <button class="btn btn-success" id="create" name="submit" type="submit">Submit</button>
                            <?php  }  ?>
                        </div>

                    </form>

                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <?php require_once('student_info_table.php');
            $update = false;
            ?>
        </div>
    </div>
</div>


</body>

<script>
    $(document).ready(function() {

        $('#create').click(function(e) {
            e.preventDefault();

            //var fieldval = '';
            var students_name1 = $('#students_name').val();
            var fathers_name1 = $('#fathers_name').val();
            var mothers_name1 = $('#mothers_name').val();
            var students_dob1 = $('#dob').val();
            var students_class1 = $('#class').val();
            $.ajax({
                url: 'create.php',
                method: 'POST',
                data: {
                    students_name: students_name1,
                    fathers_name: fathers_name1,
                    mothers_name: mothers_name1,
                    dob: students_dob1,
                    class: students_class1,

                },
                success: function(data) {
                    //alert("Data inserted Successfully");
                    $('tbody').html(data);

                }

            });
            // }
            $('form :input').val('');
        });



        $('#update').click(function(e) {
            e.preventDefault();
            var text = $('#id_update').val();
            var students_name1 = $('#students_name').val();
            var fathers_name1 = $('#fathers_name').val();
            var mothers_name1 = $('#mothers_name').val();
            var students_dob1 = $('#dob').val();
            var students_class1 = $('#class').val();
            $.ajax({
                url: 'update.php',
                method: 'POST',
                data: {
                    students_name: students_name1,
                    fathers_name: fathers_name1,
                    mothers_name: mothers_name1,
                    dob: students_dob1,
                    class: students_class1,
                    update_id: text

                },
                success: function(data) {
                    //alert("Data updated Successfully");
                    $('tbody').html(data);


                }

            });
            $('form :input').val('');

        });



        // $('#delete_id').click(function(e) {
        //     e.preventDefault();
        //
        //     //var text = $('#delete_id').val();
        //
        //     var text = $('#delete_id').data('tvalue');
        //
        //     console.log(text);
        //
        //     // var teacher_name1 = $('#teacher_name').val();
        //     // // console.log(teacher_name1);
        //     // var teacher_phone1 = $('#teacher_phone').val();
        //     // var teacher_email1 = $('#teacher_email').val();
        //     // var teacher_address1 = $('#teacher_address').val();
        //     // var teacher_dob1 = $('#teacher_dob').val();
        //     // var teacher_gender1 = $('#teacher_gender').val();
        //     //console.log(teacher_gender1);
        //     //return false;
        //     // if (fieldval != '') {
        //     $.ajax({
        //         url: 'delete_teacher.php',
        //         method: 'GET',
        //         data: {
        //
        //             delete_id: text
        //         },
        //         success: function(data) {
        //             //alert("Data updated Successfully");
        //             $('tbody').html(data);
        //
        //
        //         }
        //
        //     });
        //     // }
        //
        // });
        //
        //


    });
</script>


</html>