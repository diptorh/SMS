<?php
require_once('vendor/autoload.php');
require_once('nav.php');
require_once('connection.php'); ?>
<style>
<?php include 'asr.css';
?>
</style> <?php

          if (isset($_POST['submit2'])) {


            $stu_class = $_POST['student_class2'];
            $student_id = $_POST['student_id'];
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $cur_time = $dt->format('F j, Y, g:i a');
            $sql14 = "SELECT *

FROM student_reg sr

WHERE  sr.class ='$stu_class'
AND sr.id ='$student_id' ";
            $sql_attendance = mysqli_query($con, $sql14);
            if (mysqli_num_rows($sql_attendance) > 0) {
              $html_header = '';
              $html_header = '
<div class="grid-container">
  <div class="grid-item">
  <img src="dghs_logo.jpg" alt="School Logo" style="width:90px; border-radius: 60%;"></div>
  <div class="grid-item"><b>Dewangonj Govt. High School  <br> Dewangonj, Jamalpur.</b></div>
  <div class="grid-item" style="font-size:13px;">' . $cur_time . '</div>  
  <div class="grid-item"></div>
  <div class="grid-item">Student Details Report</div>
  <div class="grid-item"></div>
  <div class="grid-item"style="font-size:15px;  ">Student ID : ' . $student_id . '</div>  
  <div class="grid-item"></div>
  <div class="grid-item" style="font-size:15px; text:align:left;">Class : ' . $stu_class . '</div>
   
</div>';

              echo $html_header;
              $html = '<table id="customers">';
              $html_data = '<tr><th style="text-align: center;">Student Name</th><th style="text-align: center;">Fathers Name</th><th style="text-align: center;">Mothers Name</th><th style="text-align: center;">Birth Date</th><th style="text-align: center;">Address</th></tr>';

              echo $html;


              while ($row = mysqli_fetch_assoc($sql_attendance)) {
                //echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["attendanceYN"] . "<br>";
                $html_data .= '<tr><td>' . $row["name"] . '</td>' . '</td><td>' . $row["fathers_name"] . '</td><td>' . $row["mothers_name"] . '</td><td>' . $row["birth_date"] . '</td><td>' . $row["address"] . '</td>';
              }

              echo  $html_data;

              //onload="window.print();"
            } // num rows end
            else {
              echo '<b>No Data Found.</b>';

              echo '<p> <b>Redirecting to Report page in <span id="countdown">5</span> Seconds </b></p> <br><br>';

              echo " <script>
                      var seconds = document.getElementById('countdown').textContent;
                      var countdown = setInterval(function() {
                      seconds--;
                      document.getElementById('countdown').textContent = seconds;
                      if (seconds <= 0) 
                      {clearInterval(countdown);
                      window.location.href = 'http://localhost/project_dghs_radio_3/project_dghs_radio_4/reports.php';
                      }
                      }, 1000);
  
                      </script>";
            }
          }
          //$mpdf = new \Mpdf\Mpdf();
          //$mpdf->WriteHTML($html_header, $html, $html_data);
          //$mpdf->WriteHTML('<h1>HI</h1>');
         // $mpdf->output('Attendance_Sheet.pdf', 'I');