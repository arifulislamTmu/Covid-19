<?php
    require_once('connect.php');
    require_once('header.php');
 ?>

 <center>
 	<div  class="table_info">
 	<form action="" method="POST">
 		
 		
 	

<table border="1px solid;" >
   <tr>
   	<td><span style="color:black; font-weight: bold; font-size: 20px;  text-align: center;">Name</td>
   	<td><span style="color:black; font-weight: bold; font-size: 20px; text-align: center;">Mobile</td>
   	<td><span style="color:black; font-weight: bold; font-size: 20px;  text-align: center;">Result</td>
   	<td><span style="color:black; font-weight: bold; font-size: 20px;  text-align: center;">Action</td>
 </tr>


	<?php
	

		$select = "select * from emargency_test";

		$run = mysqli_query($con,$select);
	if($run){ 

			while($rows = mysqli_fetch_array($run)){  ?>



				<tr>
					<td style="font-size:25px; text-align:center;"><?php echo $rows['patientName']?></td>
					<td style="font-size:25px; text-align:center;"><?php echo $rows['patientMobile']?></td>
				    <td style="font-size:25px; text-align:center;"><?php echo $rows['result']?></td>
				    
				    <td><a style="color:green; padding: 20px; text-align: center; font-weight: bold; font-size: 20px;" href="editData.php?ptn_id=<?php echo $rows['ptn_id']?>"> Insert Result</a></td>

				</tr>

			
  <?php
	
	}
	}
?>
</table>
</form>
   </div>
</center>
<?php

    require_once('footer.php');
 ?>
