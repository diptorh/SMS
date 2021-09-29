<?php
require_once('vendor/autoload.php');
require_once('nav.php');
require_once('connection.php'); ?>
<style>
<?php include 'asr.css';
?>
</style> <?php

          if (isset($_POST['submit'])) {


            $stu_class = $_POST['student_class'];
            $attendance_date = date('Y-m-d', strtotime($_POST['attendance_sheet_report_date']));
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $cur_time = $dt->format('F j, Y, g:i a');

            $sql14 = "SELECT sr.id, sr.name, sr.class, att.student_id, att.present_yn,
CASE att.present_yn
WHEN 'Y' THEN 'Present'
WHEN 'N' THEN 'Absent' END AS attendanceYN,
att.teacher_name

FROM student_reg sr, attendance att

WHERE sr.id = att.student_id
AND att.class ='$stu_class'
AND att.attendance_date ='$attendance_date' ";
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
  <div class="grid-item">Attendance Sheet Report</div>
  <div class="grid-item"></div>
  <div class="grid-item"style="font-size:15px;  ">Attendance of : ' . $attendance_date . '</div>  
  <div class="grid-item"></div>
  <div class="grid-item" style="font-size:15px; text:align:left;">Class : ' . $stu_class . '</div>
   
</div>';

              echo $html_header;
              $html = '<table id="customers">';
              $html_data = '<tr><th style="text-align: center;">Student ID</th><th style="text-align: center;">Student Name</th><th style="text-align: center;">Attendance</th></tr>';

              echo $html;


              while ($row = mysqli_fetch_assoc($sql_attendance)) {
                //echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["attendanceYN"] . "<br>";
                $html_data .= '<tr><td>' . $row["id"] . '</td><td>' . $row["name"] . '</td>' . '</td><td>' . $row["attendanceYN"] . '</td>';
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