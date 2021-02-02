<?php

 require_once("connect.php");
 ?>
 <?php
 $city_id =$_POST['city_id'];
		$query ="SELECT * FROM district_tbl WHERE city_id = '$city_id'";
			$results = mysqli_query($con,$query);
		?>
			<option value="">Select District</option>
		<?php
			while($rs=mysqli_fetch_array($results)) {
		?>
			<option value="<?php echo $rs["district_id"]; ?>"><?php echo $rs["district_name"]; ?></option>
<?php

}
?>