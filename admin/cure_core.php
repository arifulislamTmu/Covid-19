<?php
    require_once('connect.php');
    require_once('adminlogin.php');
	
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
			$select = "select * from cure_tbl where id=$sl";

			$run = mysqli_query($con,$select);
			if($run){ 

			while($rows = mysqli_fetch_array($run)){  ?>

		<tr>
			<td><form action="" method="POST"></td>
			<td><input type="text" name="hour"value="<?php echo $rows['new_cure']?>"></td>
			<td><input type="number" name="total" value="<?php echo $rows['total_cure']?>"> </td>

			<input type="hidden" name="eiting_id"  value="<?php echo $rows['id']?>"></td>
			<td><input type="submit" name="sub_btn4" value="Save Data"></td>
		</tr>

<?php } } } ?>

<?php
  if(isset($_REQUEST['sub_btn4'])){
  		$hour= $_REQUEST["hour"];
  		$total= $_REQUEST['total'];
  		$edintg_id = $_REQUEST['eiting_id'];

  		$update_qu = "UPDATE cure_tbl SET new_cure='$hour',total_cure=total_cure+'$total'WHERE id='$edintg_id'
  		";
  		$run = mysqli_query($con,$update_qu);
  		if($update_qu){

  		header("location:LatestStatus.php?edidet");
  	}
  }
?>
</table>
</form>
   </div>
</center>