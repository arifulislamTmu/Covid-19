<?php 
require_once('header.php');
require_once("connect.php");
?>
           <div class="sidebar-right">
               <div class="heading-title-text">
                   <h1>Dhaka Division</h1>
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
 
        <td>Current Date:</td><td><input type="date" name="date" class="input"></td>
        <td> To Date:</td><td><input type="date" name="enddate" class="input"></td>
        <td><input type="submit" name="subbtn"  class="default-btn"value="Search"></td>
   </tr>

  </form>
  </table>
 
   </div>
     <div class="data-base-data">
         <table class="table-wid ">
             <tr>
                 <td class="theader">Serial No.</td>
                 <td class="theader">Division Name</td>
                 <td class="theader">Date</td>
             </tr>

<?php
if(isset($_REQUEST['subbtn']))
{
$city_id = $_REQUEST['city_id'];
$date = $_REQUEST['date'];
$enddate = $_REQUEST['enddate'];
 
$select= "SELECT * FROM `emergency_tbl`
INNER JOIN city_tbl ON emergency_tbl.city_id=city_tbl.city_id

  WHERE emergency_tbl.city_id ='$city_id' and date BETWEEN '$enddate' AND '$date'";

      $run=mysqli_query($con,$select);
      
      $count = 1;
      while ($rs = mysqli_fetch_array($run)){ ?>
    

      <tr>
          <td class="theader-td"><?php echo $count; $count++;?></td>
          <td class="theader-td"><?php echo $rs['city_name'];  ?></td>
          <td class="theader-td"><?php echo $rs['date'];  ?></td>

      </tr>
       
<?php  } } ?>

</table>

</div>
</div>
</div>
<?php 
require_once('footer.php');
?>