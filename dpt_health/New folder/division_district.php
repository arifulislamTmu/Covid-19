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

</select></td>
			</tr>
			<tr>
	<td>Select District:</td><td><select  class="input" name="District"  id="District-list" class="demoInputBox"  onChange="getThana(this.value);" >
		<option value="">Select District</option>
		</select>
	</td>
		<tr>
		<td>Select Date:</td><td><input type="date" name="date"class="input"></td>
		<td><input type="submit" name="subbtn1" value="Submit"></td>
   </tr>

	</form>
			</table>
			
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
</script>


<table style="width:500px; height:auto margin-left:200px;margin-top:50px;text-align:center;">

<?php
if(isset($_REQUEST['subbtn1']))
{
$city_id = $_REQUEST['city_id'];
$District = $_REQUEST['District'];
$date = $_REQUEST['date'];
echo"<th>
<td>SL.No</td>
<td>Division Name</td>
<td>District Name</td>
<td>Date</td>

</th>";
 
$select= "SELECT * FROM `emergency_tbl`
             INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id
             INNER JOIN district_tbl ON emergency_tbl.district_id=district_tbl.district_id
			
			 WHERE emergency_tbl.city_id ='$city_id'and emergency_tbl.district_id='$District'and date ='$date'";


			$run=mysqli_query($con,$select);
			$count = 1;
			while ($rs = mysqli_fetch_array($run)){ ?>
				<tr>
					<td></td><td><?php echo $count; $count++;?></td>
					<td><?php echo $rs['city_name'];  ?></td>
					<td><?php echo $rs['district_name'];  ?></td>
					<td><?php echo $rs['date'];  ?></td>
				</tr>
			<?php	
			}
}
?>

</teble>
</center>