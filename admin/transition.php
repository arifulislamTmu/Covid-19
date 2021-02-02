<?php
    require_once('connect.php');
    require_once('header.php');
 ?>

<div class="sidebar-right">
	<div class="heading-title-text">
		<h1>Transition</h1>
	</div>
	
	 <section>
    <div class="row">
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
        <div class="serch_section">
                <form action="" method="POST">
                <lable>Search Transition Id:</lable>
                <input type="text" name="search" placeholder="Search">
                <input  class="btn-dgn" type="submit" name="subbnt" value="SEARCH">
                </form>
        </div>
        </div>
      <div class="col-lg-2"></div>
    </div>
  </section>
  
  
  
  
  <section class="table_section">
   <div class="row">
   <table class="table table-hover">
  <thead>
    <tr>
      <th>Serial No</th>
      <th>Name</th>
      <th>Mobile No</th>
      <th>Transition Id Bkash</th>
      <th>Transition Id DBBL</th>
      <th>Action</th>
    </tr>
    </thead>


<?php

  if(isset($_POST['search'])){
      $search =$_POST['search'];
      
      $query = "SELECT * FROM emergency_tbl WHERE transtion_num ='$search' OR d_transtion_num ='$search'"; 

      $run =mysqli_query($con,$query);

      if($run){ 
        $count=1;
		while($rows = mysqli_fetch_array($run)){ ?>
		  <tbody>
        <tr>
        <th scope="row"><?php echo $count; $count++;?></th>
        <td><?php echo $rows['ptn_name']; ?></td>
        <td><?php echo $rows['ptn_mobile']; ?></td>
        <td><?php echo $rows['transtion_num']; ?></td>
        <td><?php echo $rows['d_transtion_num']; ?></td>

        <?php
		   if($rows['confirm']=='0'){ ?>
		  	<td><a href="?shiftid=<?php echo $rows['ptn_id'];?>">confirm</a></td>
		 <?php } 
		   elseif($rows['confirm']=='1'){ ?>
			  <td style="color:green;font-size:20px;"><?php echo"Success"?></td> 
		  <?php } ?>
    <?php
	}
	}
	}
	?>
<?php
 if(isset($_REQUEST['shiftid'])){

        $shiftid =$_REQUEST['shiftid'];
        $query = "UPDATE emergency_tbl SET confirm ='1' WHERE emergency_tbl.ptn_id ='$shiftid'";
        $result = mysqli_query($con,$query);
        if($result){
          echo" Confirmed !!";
        }else{
          echo"not Update";
        }
				
			}
		 ?>

 </tr>
 </tbody>
    </table>
  </div>
 	
  </section>
	
</div>

<?php
    require_once('footer.php');
?>