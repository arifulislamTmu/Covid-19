<?php
 require_once('header.php');
 require_once('connect.php');
?>

<?php
	session_start();
 $otp_no = $_SESSION['otp_no'];


 ?>
     <div class="payment_option mt-5 mb-5">
                     <div class="peyment_text text-center mb-2">
                       <h4>করোনা পরীক্ষার  জন্য টাকা পরিশোধ করুন !!</h4>
                     </div>

                     <div class="row mt-3 mb-5 mt-5">
                     <div class="col-lg-3"></div>
                       <div class="col-lg-3">
                      <div class="dropdown open mb-5">
                     
                     
                         <button class=" dropdown-toggle btn-block icon_class" type="button" id="dropdownMenu3" data-toggle="dropdown">
                          <span><i class="fab fa-telegram-plane mr-3"></i>Bkash</span>
                          </button> 
                    
                                 <div class="dropdown-menu text-center drops">
                                 
                                <h6> আমাদের পার্সোনাল বিকাশ নম্বর <strong>01903174729 </strong></h6>
                                <form action="" method="POST"> 
                                <div class="text_menu">
                                <input type="Text" class="form-control mb-3" name="bkash_num" placeholder="Bkash Number (Optional)">

                                <input type="Text" class="form-control mb-3" name="transtion_num"  placeholder="Transition ID">
                                 <button class="btn btn-primary w-100" type="submit" name="Subbtn2"> Submit</button>
                                 </form>  
                                </div>
                                        
                                </div>
                            </div>
                       </div>

                       <div class="col-lg-3">

                            <div class="dropdown open">

                              <button class=" dropdown-toggle btn-block icon_class " type="button" id="dropdownMenu3" data-toggle="dropdown">
                                <span><i class="fab fa-telegram-plane mr-3" ></i>DBBL</span>
                              </button>

                                <div class="dropdown-menu text-center drops">

                                <h6> আমাদের পার্সোনাল DBBL নম্বর <strong>01903174729 </strong> </h6>
                              <form action="" method="POST">
                                  <div class="text_menu ">
                                  <input type="Text" class="form-control mb-3" name="dbbl_num" placeholder="DBBL Number(Optional)">
                                  <input type="Text" class="form-control mb-3" name="d_transtion_num"  placeholder="Transition ID">
                                  <button class="btn btn-primary w-100" type="submit" name="Subbtn1"> Submit</button>
                               </form>
                             </div> 


                            </div>
                           </div>


                         </div>


                       <div class="col-lg-3">
                       </div>
                     </div>

                     <?php
                        if(isset($_POST['Subbtn1'])){
                            $dbbl_num = $_POST['dbbl_num'];
                            $d_transtion_num = $_POST['d_transtion_num'];

                            $query = "UPDATE emergency_tbl SET dbbl_num ='$dbbl_num', d_transtion_num='$d_transtion_num' WHERE emergency_tbl.otp_num ='$otp_no'";
                            $result = mysqli_query($con,$query);
                            if($result){
                             ?>
                              <script>
                                  alert("Apnar transition number ta check kore confermetion message deoya hobe !");
                              </script>
                              <?php
                               echo '<script>window.location="http://localhost/corona/index.php"</script>';
                             }else{
                                echo"data not insert";
                            }


                        }
                      
                      ?>




                     
                     <?php
                        if(isset($_POST['Subbtn2'])){
                            $bkash_num = $_POST['bkash_num'];
                            $transtion_num = $_POST['transtion_num'];

                            $query = "UPDATE emergency_tbl SET bkash_num ='$bkash_num', transtion_num='$transtion_num' WHERE emergency_tbl.otp_num ='$otp_no'";
                            $result = mysqli_query($con,$query);
                            if($result){
                              ?>
                              <script>
                                  alert("Apnar transition number ta check kore confermetion message deoya hobe !");
                              </script>
                              <?php
                               echo '<script>window.location="http://localhost/corona/index.php"</script>';
                            }else{
                                echo"data not insert";
                            }


                        }
                      
                      ?>
                      
   
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

<?php
 require_once('footer.php');
?>