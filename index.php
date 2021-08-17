<?php
require_once('nav.php');
require_once('connection.php');
require_once('edit.php');

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4  ">
            <div class="card" style="background-color: #7600a9;">
                <div class="card-title py-3  text-white text-center">
                    <h3> Student's Registration </h3>
                </div>

                <div class="card-body">

                    <form action="save.php" method="post">

                        <div class="form-group">
                            <input type="text" class=" form-control" name='students_name' placeholder="Students Name"
                                   value="<?php echo $e_name; ?>" required>

                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='fathers_name' placeholder="Fathers Name"
                                   value="<?php echo $e_fath; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class=" form-control" name='mothers_name' placeholder="Mothers Name"
                                   value="<?php echo $e_moth; ?>">
                        </div>

                        <div class="form-group">
                            <input type="date" class=" form-control" name='dob' placeholder="Date of Birth"
                                   value="<?php echo $e_dob; ?>" required>
                        </div>

                        <div class="form-group">
                            <select id="class" name="class" class=" form-control " value="<?php echo $e_cla; ?>"
                                    required>
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


        <div class="col-lg-8">
            <?php require_once('student_info_table.php');
            ?>
        </div>
    </div>
</div>


</body>

</html>