<?php
 require_once('header.php');
 require_once('connect.php');
?>


    <section>

<div class="container">
    <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
          <div class="class-form ">
          <form action="" method="POST">
                <p>মোবাইল নাম্বার</p>
                 <input type="text" name="mobile_no" placeholder="মোবাইল নাম্বার">
                <p>ও টি পি নাম্বার</p>
                <input type="number" name="otp_no" placeholder="ও টি পি নাম্বার">
                <button class="btn btn-success btn-md btn-block" type="submit" name="subbtn" >Log In</button>
                <!-- <input class="btn btn-success btn-md btn-block" type="submit" name="subbtn" value="Send Message">       -->
          </form>
        
          
        
<?php
     require_once('connect.php');
  
        if(isset($_POST['subbtn'])) { 

                $otp_no = $_POST['otp_no'];
                $mobile_no = $_POST['mobile_no'];

                session_start();
                $_SESSION['otp_no']="$otp_no";

                $select ="SELECT * FROM emergency_tbl WHERE otp_num ='$otp_no' AND ptn_mobile='$mobile_no'";
              
                $run = mysqli_query($con,$select);

                $count = mysqli_num_rows($run);

                if($count){
                    header('location:payment.php');
                }else{
                    echo"please chack OTP and Mobile number";
                }


               }
      ?>
     

     </div> 
         </div>
      <div class="col-lg-2"></div>
    </div>
</div>
     
</section>
<br>
<br>
<br>
<br>
<?php
   require_once('footer.php');
?>