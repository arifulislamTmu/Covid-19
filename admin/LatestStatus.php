<?php
    require_once('connect.php');
    require_once('header.php');
 ?>

<div class="sidebar-right">
	<div class="heading-title-text">
		<h1> Update - News</h1>
	</div>
<div class="search-section">

<style>
.input{
width: 123px;
height: 36px;
border-radius: 8px;
font-size: 15px;
margin: 5px;
}

</style>


   

            <!----New Infeted  Information---->

	<form action="" method="POST">

				
	
	</tr>

	<?php
		$select = "SELECT * from new_infected";

		$run = mysqli_query($con,$select);
		if($run){ 

		while($rows = mysqli_fetch_array($run)){  ?>

			<tr>
				<td>New Infected<input type="hidden" name="newinfect" value="<?php echo $rows['new_hour']?>" /></td>
				<input type="hidden" name="newinfect" value="<?php echo $rows['total']?>" />
				<td><a href="newinfeted.php?sl=<?php echo $rows['id']?>"> Insert Data </a></td>
			</tr>

  <?php } }?>
</form>


<!----Death Information---->

<form action="" method="post">
<?php
	$select = "select * from death_tbl";

	$run = mysqli_query($con,$select);
	if($run){ 

	while($rows = mysqli_fetch_array($run)){  ?>

		<tr>
			<td>Update Death<input type="hidden" name="newinfect" value="<?php echo $rows['new_death']?>" /></td>
			<input type="hidden" name="newinfect" value="<?php echo $rows['total_death']?>" />
			<td><a href="death_core.php?sl=<?php echo $rows['id']?>"> Insert Data</a></td>
		</tr>

	<?php } } ?>

</form>

            <!----Cure Information---->
  <form action="" method="POST">
      
      <?php
		$select = "select * from cure_tbl";
		$run = mysqli_query($con,$select);

        if($run){ 

		while($rows = mysqli_fetch_array($run)){  ?>

            <tr>
                <td>Update Cure<input type="hidden" name="newinfect" value="<?php echo $rows['new_cure']?>" /></td>
                <input type="hidden" name="newinfect" value="<?php echo $rows['total_cure']?>" />
                <td><a href="cure_core.php?sl=<?php echo $rows['id']?>"> Insert Data</a></td>
            </tr>

        <?php } } ?>
    </form>

            <!----New test Information---->

<form action="" method="POST">
      <?php

	     $select = "select * from newtest_tbl";

		$run = mysqli_query($con,$select);
	
	if($run){ 

		while($rows = mysqli_fetch_array($run)){  ?>

                <tr>
                    <td>Update New Test<input type="hidden" name="newinfect" value="<?php echo $rows['new_test']?>" /></td>
                    <input type="hidden" name="newinfect" value="<?php echo $rows['total-test']?>" />
                    <td><a href="newtestcore.php?sl=<?php echo $rows['id']?>"> Insert Data</a></td>
                </tr>
      <?php } } ?>
            </form>
      
    </div>

	</div>
	</div>
<?php

    require_once('footer.php');
 ?>