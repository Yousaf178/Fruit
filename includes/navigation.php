<div class="top-nav w3-agiletop">
		<div class="container">
			<div class="navbar-header w3llogo">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>  
				<h1><img src="images/swat.jpg"width=100></h1> 
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"style="background-color:lightgreen;">
				<div class="w3menu navbar-right">
					<ul class="nav navbar"style="line-height:40px;font-weight:bold;">
						<li><a href="index.php">Home</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						
						<?php
                        //session_start();						
                       if(empty($_SESSION['id'])){

						?>
						<li><a href="login.php">login</a></li>
					   <li><a href="about.php" >About us</a></li> 
					   <?php } else { ?>
					   <li><a href="onlineorder.php" class="">Order Now</a></li>
					   <li><a href="logout.php" class="">logout</a></li>
					   <?php } ?>
						<li><a href="contacts.php">Contact Us</a></li>
					</ul>
				</div> 
				<div class="clearfix"> </div>  
			</div>
		</div>	
	</div>	