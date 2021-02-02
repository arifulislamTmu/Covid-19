<?php
  require_once('header.php');
?>

<body>
    <section>

    <div class="container">
        <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
              <div class="class-form ">
              <form action="" method="POST">
                    <p>রোগীর নাম</p>
                     <input type="text" name="message" placeholder="রোগীর নাম">
                    <p>মোবাইল নাম্বার</p>
                    <input type="number" name="to" placeholder="মোবাইল নাম্বার">
                    <button class="btn btn-success btn-md btn-block" type="submit" name="subbtn" >Sent OTP</button>
                    <!-- <input class="btn btn-success btn-md btn-block" type="submit" name="subbtn" value="Send Message">       -->
              </form>
              </div> 
              
              <h6 class="mb-3 mt-3 text-center">অনুগ্রহ করে সঠিক পিন  নম্বরটি  দিন !!</h6>
              <form action="otp.php" method="POST">
				<input type="text"  name="otp">
				<button class="btn btn-success btn-md btn-block" type="submit" name="verifyotp" >Verify</button>
            </form>
            
	<?php
         require_once('connect.php');
      
            if(isset($_POST['verifyotp'])) { 
                    $otp = $_POST['otp'];
                    if($_COOKIE['otp'] == $otp) {
                    
                        header('location:emergency_test.php');
                    }else{
                        echo"data not insert";
                    }
                }
          ?>
         

        
             </div>
          <div class="col-lg-2"></div>
        </div>
    </div>
    	 
</section>
<br><br>
      <!----home section-->
      <section class="logo-section  py-5">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center update-immage text-center">
                        <img src="img/title_img.png" alt="">
                        <h4>বাংলাদেশের করোনা ভাইরাস আপডেট</h4>
                    </div>
                </div>
         
                <div class="client-logo">
                        <div class="row feter-itms">
                            <div class="col-lg-3 content my-2" >
                                <div class="featers-itme text-center mt-4">
                                    <div class="ft-icon">
                                        <p>সংক্রামিত</p>
                                    </div>
                                    <h3 class="py-2"> </h3>
                                    <div class="hour float-left">
                                 <span>২৪ ঘন্টা</span>
                                    <p class="counter">
                                        <?php
                                            $slect ="SELECT * from new_infected";
    
                                            $run = mysqli_query($con,$slect);
    
                                            while($rows = mysqli_fetch_array($run)){ ?>
                                            <?php echo $rows['new_hour']?>	
                                        <?php
                                        }
                                        ?>
                                    </p>
                                    </div>
                                     
                                    <div class="total float-right ">
                                        <span>মোট</span>
                                        <p class="counter">
                                        <?php
                                                $slect ="SELECT * from new_infected";
    
                                                $run = mysqli_query($con,$slect);
    
                                                while($rows = mysqli_fetch_array($run)){ ?>
                                                <?php echo $rows['total']?>	
    
                                            <?php
    
                                                }
    
                                            ?>
                                        
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-lg-3 content my-2">
                                <div class="featers-itme text-center mt-4">
                                    <div class="ft-icon">
                                        <p>মৃত</p>
                                    </div>
                                    <h3 class="py-2"> </h3>
                                    <div class="hour float-left">
                                        <span>২৪ ঘন্টা</span>
                                        <p class="counter">
                                        <?php
                                            $slect ="SELECT * from Death_tbl";
    
                                            $run = mysqli_query($con,$slect);
    
                                            while($rows = mysqli_fetch_array($run)){ ?>
                                            <?php echo $rows['new_death']?>	
    
                                        <?php
    
                                              }
    
                                        ?>
                                        </p>
                                    </div>
                                     
                                    <div class="total float-right my-2 ">
                                        <span>মোট</span>
                                        <p class="counter">
                                        
                                        <?php
                                            $slect ="SELECT * from Death_tbl";
    
                                            $run = mysqli_query($con,$slect);
    
                                            while($rows = mysqli_fetch_array($run)){ ?>
                                            <?php echo $rows['total_death']?>
                                            <?php
    
                                            }
    
                                            ?>
                                        
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-lg-3 content my-2 ">
                                <div class="featers-itme text-center mt-4">
                                    <div class="ft-icon">
                                        <p>সুস্থ</p>
                                    </div>
                                    <h3 class="py-2"> </h3>
                                    <div class="hour float-left">
                                        <span>২৪ ঘন্টা</span>
                                        <p class="counter">
                                        
                                        <?php
                                            $slect ="SELECT * from cure_tbl";
                            
                                            $run = mysqli_query($con,$slect);
                            
                                            while($rows = mysqli_fetch_array($run)){ ?>
                                            <?php echo $rows['total_cure']?>	
                            
                                              <?php
                            
                                            }
                            
                                              ?>
                                        </p>
                                    </div>
                                     
                                    <div class="total float-right ">
                                        <span>মোট</span>
                                        <p class="counter">100</p>
                                    </div>
                                    
                                </div>
                            </div>
    
                        <div class="col-lg-3 content  my-2 ">
                            <div class="featers-itme text-center mt-4">
                                <div class="ft-icon">
                                    <p>পরীক্ষা</p>
                                </div>
                                <h3 class="py-2"> </h3>
                                <div class="hour float-left">
                                    <span>২৪ ঘন্টা</span>
                                    <p class="counter">
                                    <?php
                                $slect ="SELECT * from newtest_tbl";
    
                                $run = mysqli_query($con,$slect);
    
                                while($rows = mysqli_fetch_array($run)){ ?>
                                <?php echo $rows['new_test']?>	
    
                            <?php
    
                                    }
    
                            ?>
                                    </p>
                                </div>
                                    
                                <div class="total float-right ">
                                    <span>মোট</span>
                                    <p class="counter">
                                    <?php
                                $slect ="SELECT * from newtest_tbl";
    
                                $run = mysqli_query($con,$slect);
    
                                while($rows = mysqli_fetch_array($run)){ ?>
                                <?php echo $rows['total_test']?>	
    
                                <?php
    
                                    }
    
                            ?>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                                
                    </div>
            </div>
            </div>
        </div>
        
      </section>

      <section class="live-update">
        <div class="row">
            <div class="col-lg-2">
                <div class="live-headin float-right">
                     <h4>লাইভ আপডেট:</h4>
                </div>
               
            </div>
            <div class="col-lg-10">
                <div class="live-item float-left">
                    <h4>
                     <marquee scrollamount="8" onMouseOver=this.stop(); onmouseout=this.start(); class="mar">
                         ফরিদপুরে ৫ হাজার ছাড়ালো করোনা আক্রান্ত !! রাজশাহীতে আরও ১৪৯ জনের করোনা শনাক্ত!! ৫ বছরের কম বয়সী শিশুদের মাস্কের প্রয়োজন নেই: বিশ্ব স্বাস্থ্য সংস্থা
                     </marquee>
                    </h4>
               
                </div>
            </div>
           </div>
    
</section>


<!-- head-slider- section -->
<section class="py-5 bg-color-class">
  <div class="slider-section">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-6 ">
                    <div class="silder-show">
                       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                           </ol>
                           <div class="carousel-inner">
                           <div class="carousel-item active">
                               <img class="d-block w-100" src="img/slider1.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                               <img class="d-block w-100" src="img/slider2.jpg" alt="Second slide">
                           </div>
                           <div class="carousel-item">
                               <img class="d-block w-100" src="img/slider3.jpg" alt="Third slide">
                           </div>
                           <div class="carousel-item">
                               <img class="d-block w-100" src="img/slider4.jpg" alt="Third slide">
                           </div>
                           </div>
                           <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>
                               </a>
                               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                               <span class="sr-only">Next</span>
                               </a>
                       </div>

                   </div>
               </div>

               <div class="col-lg-6 slider-content-wrap py-3">
                <div class="slider-content">
              
                       <div class="row">
                        <div class="col-lg-12">
                          <div class="applly-now-left-test py-4">
                              <h2 class="mb-4 text-center applly-now "><img src="img/title_img.png" alt="">করোনা ভাইরাস টিপস</h2>
                              <div class="step-timeline">
                                  <ul>
                                      <li data-counter="1">
                                          <strong>হাত পরিষ্কার রাখুন:</strong>
                                          <p> কমপক্ষে ২০ সেকেন্ড ধরে সাবান এবং পানি বা জীবাণুনাশক হ্যান্ডওয়াশ দিয়ে ঘন ঘন হাত ধুয়ে নিন।</p>
                                      </li>
                                      <li data-counter="2">
                                          <strong>ব্যক্তিগত স্বাস্থ্যবিধি বজায় রাখুন:</strong>
                                          <p> প্রতিদিন আপনার বাড়ির চারপাশ, টেবিল, টয়লেট, কম্পিউটার, ল্যাপটপ, সুইচ এবং স্টেশনারি জিনিস পরিষ্কার করার জন্য জীবাণুনাশক ব্যবহার করুন।</p>
                                      </li>
                                      <li data-counter="3">
                                          <strong>হাত দিয়ে চোখ স্পর্শ করবেন না:</strong>
                                          <p>হাত দিয়ে চোখ স্পর্শ করবেন না: যখন কোনো সংক্রামিত ব্যক্তি কোনও মাস্ক ছাড়াই হাঁচি দেয় বা কাশি হয়, তখন প্যাথোজেনগুলো ফোঁটা আকারে বেরিয়ে আসে এবং চেয়ার বা টেবিলের মতো জিনিসগুলিতে ছড়িয়ে পড়ে। </p>
                                      </li>
                                      <li data-counter="4">
                                          <strong>মাস্ক স্পর্শ করবেন না:</strong>
                                          <p> আপনি যদি মুখ এবং নাক ঢাকতে মাস্ক পরে থাকেন তবে খালি হাতে এটি স্পর্শ করবেন না। মাস্কটি ব্যবহারের পরে এটি নিরাপদে সরিয়ে ফেলুন বা একবার ব্যবহারের পর তা বাতিল করুন। সঙ্গে সঙ্গে হাত ধুয়ে ফেলুন।</p>
                                      </li>
                                      
                                  </ul>
                              </div>
                              <a href="#" class="btn btn-primary btn-lg">আরও পড়ুন</a>
                          </div>
                      </div>
                        
                       </div>

                     </div>
                </div>
        </div>
        
    </div>
</div>
</section>

<!-- hot news -->
<section class="blog-section py-5 grybg">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 py-5 d-flex justify-content-center update-immage text-center">
              <img src="img/title_img.png" alt="">
            <h2>অন্যান্য করোনা বিষয়ক তথ্য ও সেবা</h2>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4">
              <div class="blog-item">
                  <div class="blog-thubnail">
                      <img src="img/corona2.jpg" alt="">
                      
                  </div>
                  <div class="blog-content">
                      <h2>করোনাভাইরাস যেভাবে ছড়ায় যেতে পারে</h2>
                      <h3><a href="">বাংলাদেশসহ বিশ্বব্যাপী করোনার যে ভাইরাসটি বিস্তার লাভ করেছে তার নাম  কোভিড-১৯। এই ভাইরাস আক্রান্ত ব্যক্তি   </a></h3>
                      <h4><a href="">আরও পড়ুন</a></h4>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="blog-item">
                  <div class="blog-thubnail">
                      <img src="img/corona4.jpg"alt="">
                  </div>
                  <div class="blog-content">
                    <h2> করোনাভাইরাস প্রতিরোধে সতর্কতা</h2>
                      <h3><a href="">করোনাভাইরাস (কোভিড-১৯) সম্পর্কে অহেতুক আতঙ্কিত না হয়ে তা প্রতিরোধে সতর্কতা</a></h3>
                      <h4><a href="">আরও পড়ুন</a></h4>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="blog-item">
                  <div class="blog-thubnail">
                      <img src="img/corona5.jpg" alt="">
                  </div>
                  <div class="blog-content">
                     <h2>মুখে মাস্ক পড়ে সামান্য সুরক্ষা পাওয়া যেতে পারে</h2>
                      <h3><a href="">করোনা ভাইরাসের তরল উৎস হাঁচি-কাশির ফোটা থেকে ফেস মাস্ক কিছুটা সুরক্ষা দিতে পারে</a></h3>
                      <h4><a href="">আরও পড়ুন</a></h4>
                  </div>
              </div>
          </div>
      </div>

  </div>
</section>


<section class="why-choose-ass py-5">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center update-immage text-center">
            <img src="img/title_img.png" alt="">
            <h4> প্রয়োজনীয় ভিডিও</h4>
        </div>
        <div class="col-lg-6">
            <div class="why-us-text">
                <div class="finix-text mt-4">
                    <img src="img/video.jpg" alt="">
              </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row feter-itms-2">
                <div class="col-lg-6">
                    <div class="featers-itme-2 text-center mt-4">
                        <iframe width="280" height="200" src="https://www.youtube.com/embed/440LVMY8lO4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="featers-itme-2 text-center mt-4">
                        <iframe width="560" height="200" src="https://www.youtube.com/embed/kT3qI2xN7Ws" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="featers-itme-2 text-center mt-4">
                        <iframe width="560" height="200" src="https://www.youtube.com/embed/KIsek2Cc7V8?start=2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            
                <div class="col-lg-6">
                    <div class="featers-itme-2 text-center mt-4">
                        <iframe width="560" height="200" src="https://www.youtube.com/embed/KIsek2Cc7V8?start=2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                
            </div>
        </div>
        
    </div>
  </div>




  </section>


<?php
  require_once('footer.php');
?>