<?php
    require_once('connect.php');
    require_once('adminlogin.php');
	
 ?>

 <?php
  if(isset($_REQUEST['sub_btn'])){
  		$patientName= $_REQUEST["patientName"];
  		$patientMobile= $_REQUEST['patientMobile'];
  		$result= $_REQUEST['result'];
  		$edintg_id = $_REQUEST['eiting_id'];

  		$update_qu = "UPDATE emargency_test SET patientName='$patientName',patientMobile='$patientMobile',result='$result'WHERE ptn_id='$edintg_id'
  		";

  		$run = mysqli_query($con,$update_qu);
  		if($update_qu){

  			header("location:LatestStatus.php?edidet");
  		}
  }


 ?>