<?php 
require_once('header.php');
require_once("connect.php");
?>
           <div class="sidebar-right">
               <div class="heading-title-text">
                   <h1>Division & District</h1>
               </div>
    <div class="search-section">
 <table>
<style>
.input{
	width: 155px;
height: 39px;
border-radius: 8px;
font-size: 18px;
margin: 5px;
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
	
	<td>Select District:</td><td><select  class="input" name="District"  id="District-list" class="demoInputBox"  onChange="getThana(this.value);" >
		<option value="">Select District</option>
		</select>
		
	</td>
	
		<td>Select Date:</td><td><input type="date" name="date"class="input"></td>
	
		<td style="float:right"><input type="submit" class="default-btn"name="subbtn1" value="Submit"></td>
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

   </div>
     <div class="data-base-data">
         <table class="table-wid ">
             <tr>
                 <td class="theader-d-dis">Serial No.</td>
                 <td class="theader-d-dis">Division Name</td>
                 <td class="theader-d-dis">District Name</td>
                  <td class="theader-d-dis">Date</td>
             </tr>

<?php
if(isset($_REQUEST['subbtn1']))
{
$city_id = $_REQUEST['city_id'];
$District = $_REQUEST['District'];
$date = $_REQUEST['date'];
 
$select= "SELECT * FROM `emergency_tbl`
             INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id
             INNER JOIN district_tbl ON emergency_tbl.district_id=district_tbl.district_id
			
			 WHERE emergency_tbl.city_id ='$city_id'and emergency_tbl.district_id='$District'and date ='$date'";


			$run=mysqli_query($con,$select);
			$count = 1;
			while ($rs = mysqli_fetch_array($run)){ ?>
				<tr>
					<td class="theader-d-dis-td"><?php echo $count; $count++;?></td>
					<td class="theader-d-dis-td"><?php echo $rs['city_name'];  ?></td>
					<td class="theader-d-dis-td"><?php echo $rs['district_name'];  ?></td>
					<td class="theader-d-dis-td"><?php echo $rs['date'];  ?></td>
				</tr>
			<?php	
			}
}
?>




</table>

</div>
</div>
</div>
<?php 
require_once('footer.php');
?>
