
  <section class="footer">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row top-foo">
                
                <div class="col-lg-4">
                    <div class="footer-weget">
                      <h2>Quick Links</h2>
                      <ul>
                          <li><a href="">About</a></li>
                          <li><a href="">Our Performance</a></li>
                          <li><a href="">Help (FAQ)</a></li>
                          <li><a href="">Blog</a></li>
                          <li><a href="">Contact</a></li>
                      </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-weget">
                      <h2>Other Resources</h2>
                      <ul>
                          <li><a href="">Support</a></li>
                          <li><a href="">Privacy Policy</a></li>
                          <li><a href="">Terms of Service</a></li>
                          <li><a href="">Business Loans</a></li>
                          <li><a href="">Loan Services</a></li>
                      </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-weget">
                      <h2>Contact Us</h2>
                        <div class="footer-contrant-item d-flex">
                            <span> <i class="fas fa-location-arrow" aria-hidden="true"></i></span>
                            <a href="">Khilgaon, Dhaka</a>
                        </div>
                        <div class="footer-contrant-item d-flex">
                            <span> <i class="fas fa-envelope" aria-hidden="true"></i></span>
                            <a href="mailto:info@website.com">info@gmail.com</a>
                        </div>
                        <div class="footer-contrant-item d-flex">
                            <span> <i class="fas fa-phone-volume" aria-hidden="true"></i></span>
                            <p><a href="tel:01903174729">+8801903174729</a>
                            </p>
                            
                    
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyrith text-center">
                        Copyright @2020 Designed by Ariful islam
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

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
function getUnion(val){
		$.ajax({
			type:"POST",
			url:"get_union.php",
			data:'thana_id='+val,
			success: function(data){
				$("#union-list").html(data);
			}
		});
	}

	
</script>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
   

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
   <!-- counter up jqury -->
   
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script>
    

 </body>
</html>