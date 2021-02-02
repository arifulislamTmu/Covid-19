<?php
  $user="localhost";
  $name="root";
  $pass="";
  $db="corona_web";
  $con = mysqli_connect($user,$name,$pass);
  mysqli_select_db($con,$db);

?>