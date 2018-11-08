<?php

	include ('header.php');

?>	
			          
			          <li><a href="bookcar.php">Car List</a></li>
			          <li><a href="custbookingDetails.php">Manage My Bookings</a></li>
			          <li><a href="#contact">Contact</a></li>
					   <li class="menu-has-children"><a href="">Account</a>
			            <ul>
			              <li><a href="../Login/forgotpassword.php">Change Password</a></li>
						  <li><a href="../Login/feedback.php">Feedback</a></li>
			              <li><a href="../Login/logout_process.php">Logout</a></li>
			            </ul>
			          </li>
												
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-white text-uppercase">
								Feedback Form			
							</h1>
							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			
			
			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-20 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-20'> 
                    <h3><strong>Feedback</strong></h3>
                </div>
            </div>
            <br>
			
				
                <br>
				<div class="container contact-form">
				<form method="post" action="feedback_process.php">
                
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title *" value="" />
                        </div>
						<br>
                         <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>      
							<br>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="form-control" onclick="return confirm('Confirm submit feedback?')"style="width: 50%; height: 50px;"value="Submit Feedback" />
                        </div>
                    </div>
                   
                </div>
            </form>
			</div>
			</div>
				
			</section>
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			
			<!-- start footer Area -->				
				<?php

				include ('footer.php');

				?>
			<!-- End footer Area -->					
				

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/hexagons.min.js"></script>					
			<script src="js/waypoints.min.js"></script>			
			<script src="js/jquery.counterup.min.js"></script>						
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>

