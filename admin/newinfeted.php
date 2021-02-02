<?php
    require_once('connect.php');
    require_once('header.php');
 ?>

 <center>
 	<div  class="table_info">
 		<table border="1 px solid">

 			<th>
 				<td>Hour</td>
 				<td>Total</td>
 				<td>Action</td>
 			</th>
 	
 		
 		<?php
	
 				if(isset($_REQUEST['sl'])){
			     $sl=$_REQUEST['sl'];
				 $select = "select * from new_infected where id=$sl";

	           	$run = mysqli_query($con,$select);
			if($run){ 

			while($rows = mysqli_fetch_array($run)){  ?>

				<tr>
						<td><form action="" method="POST"></td>
				 		<td><input type="text" name="hour"value="<?php echo $rows['new_hour']?>"></td>
				 		<td><input type="number" name="total" value="<?php echo $rows['total']?>"> </td>
		
				     	<input type="hidden" name="eiting_id"  value="<?php echo $rows['id']?>"></td>
				 	   <td><input type="submit" name="sub_btn" value="Save Data"></td>
				</tr>

	 <?php
	
	}
	}
	}
?>
<?php
  if(isset($_REQUEST['sub_btn'])){
  		$hour= $_REQUEST["hour"];
  		$total= $_REQUEST['total'];
  		$edintg_id = $_REQUEST['eiting_id'];

  		$update_qu = "UPDATE new_infected SET new_hour='$hour',total=total+'$total'WHERE id='$edintg_id'
  		";

  		$run = mysqli_query($con,$update_qu);
  		if($update_qu){

  		}else{
  			echo"data not isert";
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
