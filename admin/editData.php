<?php
    require_once('connect.php');
    require_once('adminlogin.php');
	
 ?>
 <center>
 	<div  class="table_info">
 		<table border="1px solid">

 			<th>
 					<td><span style=" font-weight: bold; font-size: 18px;  text-align: center;">Name</td>
				   	<td><span style=" font-weight: bold; font-size: 18px; text-align: center;">Mobile</td>
				   	<td><span style=" font-weight: bold; font-size: 18px; text-align: center;">Result</td>
				   	<td><span style=" font-weight: bold; font-size: 18px;  text-align: center;">Action</td>
 			</th>
 	
 		
 		<?php
	
 				if(isset($_REQUEST['ptn_id'])){
			     $ptn_id=$_REQUEST['ptn_id'];
				 $select = "select * from emargency_test where ptn_id=$ptn_id";

	           	$run = mysqli_query($con,$select);
			if($run){ 

			while($rows = mysqli_fetch_array($run)){  ?>

				<tr>
						<td><form action="editData_core.php" method="POST"></td>
				 		<td ><input style="color: red; text-align: center;" type="text" name="patientName"value="<?php echo $rows['patientName']?>"></td>
				 		<td><input type="number" name="patientMobile" value="<?php echo $rows['patientMobile']?>"> </td>
				 		<td><input type="text" name="result" value="<?php echo $rows['result']?>">
				     	<input type="hidden" name="eiting_id"  value="<?php echo $rows['ptn_id']?>"></td>
				 	   <td><input type="submit" name="sub_btn" value="Save Data"></td>
				</tr>
			</table>

	 <?php
	
	}
	}
	}
?>

</form>
   </div>
</center>
