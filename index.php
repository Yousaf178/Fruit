<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Turbela fruits company</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eco Fruits Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/lightbox.css">  
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<?php 
session_start();

$db = new mysqli("localhost","root","","swat_fruit");


?>
<!-- //js -->
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Oranienbaum" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- //web-fonts -->

    <!-- #region Jssor Slider Begin -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>

    <script>
//YOUSAF jQuery change into $ 20/12/2019
        $(document).ready(function ($) {
            var jssor_1_options = {
                $AutoPlay: 2,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1224);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    
    <style>
        /* jssor slider loading skin oval css */
        .jssorl-oval img {
            animation-name: jssorl-oval;
            animation-duration: 1.2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-oval {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body> 
	<?php  
		 include('includes/header.php');  
	     include('includes/navigation.php');  
		 include('includes/banner.php'); 
		 include('includes/body.php');
	 ?>
	
<div id="news" class="news">
		<div class="container"style="margin-left:250px;"> 
			 
			<div class="row">
			<h1 class="agileits"style="margin-left:300px;color:blue"><u>Available Fruits Below</u> </h1><br>	
				<div class="clearfix"> </div>
			</div>
			<div class="w3-agileits-news-grids  news-w3row3">
					<?php
					// YOUSAF query used for avalible fruit 20/12/2019
						$select_all_avalible_fruit="select * from fruits order by id desc";
						$fetch_all_avalible_fruit  = $db->query($select_all_avalible_fruit);
						//$cmd =$db->query($sel);
						// $i = 1;
				 while($row_availible_fruit= mysqli_fetch_array($fetch_all_avalible_fruit)){   ?>
			

				
				<div class="col-sm-6">
					
					<div class="w3-agile-news-img">

						<a href="onlineorder.php?fid=<?php echo $row_availible_fruit['id']; ?>" data-toggle="modal"><img src="images/<?php echo $row_availible_fruit ['image'];?> " width="200" height="200" alt="" /></a>
						<h4 style="color: blue"><?php
						echo $row_availible_fruit['fruit'];?></h4> 
						
						<p> <?php echo $row_availible_fruit ['description'];?></p>
					</div>
			
				 
				</div> 
				<?php
				 //$i++;
				 }
				?>
			
	
			</div>
		</div>
	</div>
	
	<?php   include('includes/footer.php'); ?>
	<!-- //contact -->
	<!-- modal-about -->
	<div class="modal bnr-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div> 
				<div class="modal-body modal-spa">
					<img src="images/img2.jpg" class="img-responsive" alt=""/>
					<div class="modal-w3lstext">
						<h4>Blanditiis deleniti</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras rutrum iaculis enim, non convallis felis mattis at. Donec fringilla lacus eu pretium rutrum. Cras aliquet congue ullamcorper. Etiam mattis eros eu ullamcorper volutpat. Proin ut dui a urna efficitur varius. uisque molestie cursus mi et congue consectetur adipiscing elit cras rutrum iaculis enim, Lorem ipsum dolor sit amet, non convallis felis mattis at. Maecenas sodales tortor ac ligula ultrices dictum et quis urna. Etiam pulvinar metus neque, eget porttitor massa vulputate in. Fusce lacus purus, pulvinar ut lacinia id, sagittis eumi.</p>
					</div> 
				</div> 
			</div>
		</div>
	</div>
	<!-- //modal-about -->    
	<!-- start-smooth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script> 
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
		// /YOUSAF jQuery change into $ 20/12/2019
			$(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->  
	<!-- bar-js -->
	<script src="js/bars.js"></script>
	<!-- //bar-js --> 	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>