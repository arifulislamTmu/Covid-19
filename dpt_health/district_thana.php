<?php 
require_once('header.php');
require_once("connect.php");
?>
           <div class="sidebar-right">
               <div class="heading-title-text">
                   <h1> District & Thana</h1>
               </div>
    <div class="search-section">
		<table>
			<style>
			.input{
				width: 123px;
    height: 36px;
    border-radius: 8px;
    font-size: 15px;
	margin: 5px;
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

		<td>Select Date:</td><td><input type="date" name="date" class="input"></td>

		<td><input type="submit" name="subbtn2" class="default-btn" value="Submit"></td>
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

</div>
     <div class="data-base-data">
         <table class="table-wid ">
             <tr>
                 <td class="theader-d-dis-thana">Serial No.</td>
                 <td class="theader-d-dis-thana">Division Name</td>
                 <td class="theader-d-dis-thana">District Name</td>
                  <td class="theader-d-dis-thana">Thana Name</td>
                   <td class="theader-d-dis-thana">Date</td>
             </tr>
<?php
		if(isset($_REQUEST['subbtn2']))
		{
		$city_id = $_REQUEST['city_id'];
		$District = $_REQUEST['District'];
		$Thana = $_REQUEST['Thana'];
		$date = $_REQUEST['date'];
 
	$select= "SELECT * FROM `emergency_tbl`
				INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id
				INNER JOIN district_tbl ON emergency_tbl.district_id=district_tbl.district_id
				INNER join thana_tbl ON emergency_tbl.thana_id = thana_tbl.thana_id

				WHERE emergency_tbl.city_id ='$city_id'and emergency_tbl.district_id='$District' and emergency_tbl.thana_id='$Thana' and date ='$date'";


				$run=mysqli_query($con,$select);
				$count = 1;
				while ($rs = mysqli_fetch_array($run)){ ?>
				<tr>
				<td class="theader-d-dis-thana-td"><?php echo $count; $count++;?></td>
				<td class="theader-d-dis-thana-td"><?php echo $rs['city_name'];  ?></td>
				<td class="theader-d-dis-thana-td"><?php echo $rs['district_name'];  ?></td>
				<td class="theader-d-dis-thana-td"><?php echo $rs['thana_name'];  ?></td>
				<td class="theader-d-dis-thana-td"><?php echo $rs['date'];  ?></td>
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
