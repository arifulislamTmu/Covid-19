<?php

 require_once("connect.php");
 ?>
 <?php
   $thana_id =$_POST['thana_id'];
		$query ="SELECT * FROM union_tbl WHERE thana_id = '$thana_id'";
			$results = mysqli_query($con,$query);
		?>
			<option value="">Select Union</option>
		<?php
			while($rs=mysqli_fetch_array($results)) {
		?>
			<option value="<?php echo $rs["union_id"]; ?>"><?php echo $rs["union_name"]; ?></option>
<?php

}
?>