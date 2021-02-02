<?php
require_once("Department_of_Health.php");
require_once("connect.php");

?>
<center>
<table>
<style>
.input{
    width: 200px;
    height: 25px;
    border-radius: 4px;
    margin-bottom: 3px;
    font-size: 18px;

}
td{
	font-size:20px;
	
}

	</style>
	
	<form action="" method="POST">
		<tr>
			<td>Division Name:</td>
		     <td><select class="input" name="city_id" onChange="getDistrict(this.value);">
              <option value="">Select Division</option>
			
			<?php

			   $select ="select * from city_tbl";

		     $run =mysqli_query($con,$select);
		   
		    while($rows = mysqli_fetch_array($run )){ ?>

		<option value="<?php echo $rows['city_id']; ?>"><?php echo $rows['city_name'];?>
		</option>
<?php } ?>

</select></td></tr>
	<tr>
	<td>District name:</td><td><select  class="input" name="District"  id="District-list" class="demoInputBox"  onChange="getThana(this.value);" >
		<option value="">Select District</option>
		
			<?php
			   $select ="select * from district_tbl";

		     $run =mysqli_query($con,$select);
		   
		    while($rows = mysqli_fetch_array($run )){ ?>

		<option value="<?php echo $rows['district_id']; ?>"><?php echo $rows['district_name'];?>
		</option>
		
	
	<?php
	
	}
	?>
	</select></td>
</tr>

<tr>
	<td>Thana Name:</td>
	<td><select  class="input" name="Thana" id="Thana-list" class="demoInputBox"  onChange="getUnion(this.value);">
		<option value="">Select Thana</option>
			<?php
			   $select ="select * from thana_tbl";

		     $run =mysqli_query($con,$select);
		   
		    while($rows = mysqli_fetch_array($run )){ ?>

		<option value="<?php echo $rows['thana_id']; ?>"><?php echo $rows['thana_name'];?>
		</option>
		
	
	<?php
	
	}
	?>
	</select></td>
	<tr>
		<td>Select Date:</td><td><input type="date" name="date" class="input"></td>
		<td><input type="submit" name="subbtn2" value="Submit"></td>
   </tr>

	</form>

<script>
	function getDistrict(val){
		$.ajax({
			type:"POST",
			url:"get_district.php",
			data:'city_id='+val,
			success: function(data){
				$("#District-list").html(data);
			}
		});
	}

	function getThana(val){
		$.ajax({
			type:"POST",
			url:"get_thana.php",
			data:'district_id='+val,
			success: function(data){
				$("#Thana-list").html(data);
			}
		});
	}
</script>
</teble>
<table style="width:800px; height:auto margin-left:200px;margin-top:50px;text-align:center;">

<?php
		if(isset($_REQUEST['subbtn2']))
		{
		$city_id = $_REQUEST['city_id'];
		$District = $_REQUEST['District'];
		$Thana = $_REQUEST['Thana'];
		$date = $_REQUEST['date'];

		echo"<tr>
		<td>SL.No</td>
		<td>Division Name</td>
		<td>District Name</td>
		<td>Thana Name</td>
		<td>Current Date</td>
   </tr>";
	
 
	$select= "SELECT * FROM `emergency_tbl`
				INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id
				INNER JOIN district_tbl ON emergency_tbl.district_id=district_tbl.district_id
				INNER join thana_tbl ON emergency_tbl.thana_id = thana_tbl.thana_id

				WHERE emergency_tbl.city_id ='$city_id'and emergency_tbl.district_id='$District' and emergency_tbl.thana_id='$Thana' and date ='$date'";


				$run=mysqli_query($con,$select);
				$count = 1;
				while ($rs = mysqli_fetch_array($run)){ ?>
				<tr>
				<td><?php echo $count; $count++;?></td>
				<td><?php echo $rs['city_name'];  ?></td>
				<td><?php echo $rs['district_name'];  ?></td>
				<td><?php echo $rs['thana_name'];  ?></td>
				<td><?php echo $rs['date'];  ?></td>
				</tr>
				<?php	
				}
				}
			?>

</table>
</center>