<?php
  require_once('header.php');
  require_once('connect.php');
?>
<?php
	session_start();
    $name =$_SESSION['name'];
    $to =$_SESSION['to'];
    $otp = $_SESSION['otp'];
?>
 <div class="row">
<div class="col-lg-3">

</div>
<div class="col-lg-7">
<div class="finix-text-3"> </div>
  <div class="card bg-light sadow card-form">
        <div class="card-body">
          <div class="crd-body-text text-center">
          <p>আপনার তথ্যগুলো যথাযথ কর্তৃপক্ষের কাছে জানানোর জন্য নিচের ফরমটি পূরণ করে সাবমিট বাটনে ক্লিক করুন।</p>
                </div>
            <div class="from-section">
                <form action="" method="POST">
                    <div class="form-group mt-5">
                          <label for="type-division"><span style=" color:red; font-size: 20px;">*</span> বিভাগ</label>
                          <select class="form-select"name="city_name" aria-label="Default select example" id="type-division" onChange="getDistrict(this.value);">
                          <option selected> Select Division</option>
                          <?php
                          $select ="select * from city_tbl";

                          $run =mysqli_query($con,$select);

                          while($rows = mysqli_fetch_array($run )){ ?>

                          <option value="<?php echo $rows['city_id']; ?>"><?php echo $rows['city_name'];?>
                          </option> <?php
                          }  ?>
                          </select>
                      </div>


                      <div class="form-group mt-2">
                            <label for=" District-list"><span style=" color:red; font-size: 20px;">*</span> জেলা</label>
                            <select class="form-select" aria-label="Default select example" id="District-list" name="District" onChange="getThana(this.value);">
                            <option selected> Select District</option>
                            <?php
                            $select ="select * from district_tbl";

                            $run =mysqli_query($con,$select);

                            while($rows = mysqli_fetch_array($run )){ ?>

                            <option value="<?php echo $rows['district_id']; ?>"><?php echo $rows['district_name'];?>
                            </option>
                            <?php

                            }
                            ?>
                            </select>
                        </div>



                    <div class="form-group mt-2">
                            <label for="Thana-list"><span style=" color:red; font-size: 20px;">*</span>থানা</label>
                            <select class="form-select" aria-label="Default select example" id="Thana-list" name="Thana" onChange="getUnion(this.value);" >
                            <option selected> থানা</option>
                            <?php
                            $select ="select * from thana_tbl";

                            $run =mysqli_query($con,$select);

                            while($rows = mysqli_fetch_array($run )){ ?>

                            <option value="<?php echo $rows['thana_id']; ?>"><?php echo $rows['thana_name'];?>
                            </option>


                            <?php

                            }
                            ?>
                            </select>
                      </div>

                    <div class="form-group mt-2">
                        <label for="union-list"><span style=" color:red; font-size: 20px;">*</span> ইউনিয়ন পরিষদ</label>
                        <select class="form-select" aria-label="Default select example" id="union-list" name="Union">
                        <option selected>  ইউনিয়ন পরিষদ</option>
                        </select>
                    </div>

                    <div class="form-group mt-2 ">
                        <label for="type-villege"> <span style=" color:red; font-size: 20px;">*</span>গ্রাম</label>
                        <input type="text"class="form-control" name="village" id="type-villege" aria-describedby="helpId" placeholder="গ্রাম">
                    </div>

                    <button class="btn btn-primary w-100 mtop"name="subtn">SUBMIT</button> 
                    </form>
              </div>

              </div>

        </div> 
    </div>
</div>
<div class="col-lg-2"> </div>

</div>



      <?php
          
     
            if(isset($_POST['subtn'])){
      	
              $city_name  =$_POST['city_name'];
              $District   =$_POST['District'];
              $Thana      =$_POST['Thana'];
              $Union      =$_POST['Union'];
              $village    =$_POST['village'];
              echo $otp;
              
            if(empty($city_name) or empty($District) or empty($Thana) or empty($Union) or empty($village)){

              echo "<span style='color:red; font-size:20px;'> field must not be empty</span><br>";
            }else{

               $query = "insert into emergency_tbl(ptn_name,ptn_mobile,otp_num,city_id,district_id,thana_id,union_id,village_name)value('$name','$to','$otp','$city_name','$District','$Thana','$Union','$village')";
                 $run = mysqli_query($con,$query);

              if($run){

              
                ?>
                <script>
                    alert("আপনি সফল ভাবে রেজিস্ট্রেশন করতে সক্ষম হয়েছেন !");
                </script>
                <?php
               echo '<script>window.location="http://localhost/corona/index.php"</script>';
              
              }else{
               echo" Data insert not ";
              
              } } } ?> 
              


<?php

  require_once('footer.php');
?>