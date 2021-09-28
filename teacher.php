<?php
require_once('nav.php');
require_once('connection.php');
require_once('edit_teacher.php');
//require_once('update_teacher.php');

?>

<div class="">
    <div class="row">
        <div class="ml-3 col-lg-3  ">
            <div class="card" style="background-color: #b2b3b3;">
                <!-- #7600a9 -->
                <div class="card-title py-3  text-black text-center">
                    <h3> Teacher's Registration </h3>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="form-group">
                            <input type="text" id='teacher_name' class=" form-control" name='teacher_name'
                                placeholder="Teacher Name" value="<?php echo $t_name; ?>" required>

                        </div>

                        <div class="form-group">
                            <input type="text" id='teacher_phone' class=" form-control" name='teacher_phone'
                                placeholder="Phone" value="<?php echo $t_phone; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" id='teacher_email' class=" form-control" name='teacher_email'
                                placeholder="Email" value="<?php echo $t_email; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" id='teacher_address' class=" form-control" name='teacher_address'
                                placeholder="Address" value="<?php echo $t_address; ?>">
                        </div>



                        <div class="form-group">
                            <input type="date" id='teacher_dob' class=" form-control" name='teacher_dob'
                                placeholder="Birth Date" value="<?php echo $t_dob; ?>" required>
                        </div>

                        <div class="form-group">
                            <select id="teacher_gender" name="teacher_gender" class=" form-control " required
                                value="<?php echo $t_gender; ?>">
                                <option value="">__Gender__</option>
                                <option value=" Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="id_update" class=" form-control" name='update_id'
                                value="<?php echo $edit_id; ?>">
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

        <!--        -->
        <div class="col-lg-8">
            <?php require('teacher_info_table.php');
            //header("Location: teacher.php");
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
        var teacher_name1 = $('#teacher_name').val();
        var teacher_phone1 = $('#teacher_phone').val();
        var teacher_email1 = $('#teacher_email').val();
        var teacher_address1 = $('#teacher_address').val();
        var teacher_dob1 = $('#teacher_dob').val();
        var teacher_gender1 = $('#teacher_gender').val();
        console.log(teacher_gender1);
        //return false;
        // if (fieldval != '') {
        $.ajax({
            url: 'create_teacher.php',
            method: 'POST',
            data: {
                teacher_name: teacher_name1,
                teacher_phone: teacher_phone1,
                teacher_email: teacher_email1,
                teacher_address: teacher_address1,
                teacher_dob: teacher_dob1,
                teacher_gender: teacher_gender1
            },
            success: function(data) {
                //alert("Data inserted Successfully");
                $('tbody').html(data);

            }

        });
        // }

    });

    $('#update').click(function(e) {
        e.preventDefault();

        var text = $('#id_update').val();
        //console.log(text);

        var teacher_name1 = $('#teacher_name').val();
        // console.log(teacher_name1);
        var teacher_phone1 = $('#teacher_phone').val();
        var teacher_email1 = $('#teacher_email').val();
        var teacher_address1 = $('#teacher_address').val();
        var teacher_dob1 = $('#teacher_dob').val();
        var teacher_gender1 = $('#teacher_gender').val();
        //console.log(teacher_gender1);
        //return false;
        // if (fieldval != '') {
        $.ajax({
            url: 'update_teacher.php',
            method: 'POST',
            data: {
                teacher_name: teacher_name1,
                teacher_phone: teacher_phone1,
                teacher_email: teacher_email1,
                teacher_address: teacher_address1,
                teacher_dob: teacher_dob1,
                teacher_gender: teacher_gender1,
                update_id: text
            },
            success: function(data) {
                //alert("Data updated Successfully");
                $('tbody').html(data);


            }

        });
        // }

    });




});
</script>



</html>