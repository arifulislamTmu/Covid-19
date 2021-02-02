<?php

 require_once("connect.php");
 ?>
 <?php
   $district_id = $_POST['district_id'];
		$query ="SELECT * FROM thana_tbl WHERE district_id = '$district_id'";
			$results = mysqli_query($con,$query);
		?>
			<option value="">Select Thana</option>
		<?php
			while($rs=mysqli_fetch_array($results)) {
		?>
			<option value="<?php echo $rs["thana_id"]; ?>"><?php echo $rs["thana_name"]; ?></option>
<?php

}
?>