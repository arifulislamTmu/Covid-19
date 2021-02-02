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
		<td>Select Division:</td><td><select class="input" name="city_id" >
			 <option value="">Select Division</option>
		
			<?php
			   $select ="select * from city_tbl";

		     $run =mysqli_query($con,$select);
		   
		    while($rows = mysqli_fetch_array($run )){ ?>

		<option value="<?php echo $rows['city_id']; ?>"><?php echo $rows['city_name'];?>
		</option>
		
	
	<?php
	
	}
	?>
	
	</select></td>
	</tr>
		<tr>
		<td>Current Date:</td><td><input type="date" name="date" class="input"></td>
		<td> To Date:</td><td><input type="date" name="enddate" class="input"></td>
		<td><input type="submit" name="subbtn" value="Search"></td>
   </tr>

	</form>
	</table>
	</center>
	<center>
	<table style="width:500px; height:auto margin-left:200px;margin-top:50px;text-align:center;">

<?php
if(isset($_REQUEST['subbtn']))
{
$city_id = $_REQUEST['city_id'];
$date = $_REQUEST['date'];
$enddate = $_REQUEST['enddate'];
echo"<tr>
     <td>SL.No</td>
     <td>Division Name</td>
     <td>Current Date</td>
</tr>";
 
$select= "SELECT * FROM `emergency_tbl`
INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id

	WHERE emergency_tbl.city_id ='$city_id' and date BETWEEN '$enddate' AND '$date'";

			$run=mysqli_query($con,$select);
			
			$count = 1;
			while ($rs = mysqli_fetch_array($run)){ ?>
		
				<tr>
				<td><?php echo $count; $count++;?></td>
					<td><?php echo $rs['city_name'];  ?></td>
					<td><?php echo $rs['date'];  ?></td>
				</tr>
			<?php	
			}
			
}
?>

</table>
</center>