<?php
    $con=mysqli_connect('localhost','root','','project_db');
    $con->query("SET NAMES UTF8");
    date_default_timezone_set('Asia/Bangkok');
    @session_start();
?>