<?php
require_once('nav.php');
require_once('connection.php');
require_once('edit_teacher.php');

?>

<div class="">
    <div class="row">
        <div class="col-lg-3  ">
            <div class="card" style="background-color: #7600a9;">
                <div class="card-title py-3  text-white text-center">
                    <h3> Teacher's Registration </h3>
                </div>

                <div class="card-body">

                    <form action="save_teacher.php" method="post">

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_name' placeholder="Teacher Name"
                                   value="<?php echo $t_name; ?>" required>

                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_phone' placeholder="Phone Number"
                                   value="<?php echo $t_phone; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_email' placeholder="Email"
                                   value="<?php echo $t_email; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_address' placeholder="Address"
                                   value="<?php echo $t_address; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_did' placeholder="Designation Id"
                                   value="<?php echo $t_did; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='teacher_dob' placeholder="Date of Birth"
                                   value="<?php echo $t_dob; ?>" required>
                        </div>

                        <div class="form-group">
                            <select id="class" name="teacher_gender" class=" form-control " value="<?php echo $t_gender; ?>"
                                    required>
                                <option value="">__Gender__</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                                

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class=" form-control" name='update_id' value="<?php echo $edit_id; ?>">
                        </div>

                        <div class="form-group">
                            <?php if ($update == true) { ?>
                                <button class="btn btn-warning" name="update" type="submit">Update</button>
                            <?php  } else { ?>
                                <button class="btn btn-success" name="submit" type="submit">Submit</button>
                            <?php  }  ?>
                        </div>

                    </form>

                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <?php require_once('teacher_info_table.php');
            ?>
        </div>
    </div>
</div>


</body>

</html>