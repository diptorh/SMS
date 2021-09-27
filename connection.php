<?php
$con = mysqli_connect('localhost', 'root', '', 'sms');

if (!$con) {
    echo " DB not connected.";
} 


//else   echo " DB is connected.";