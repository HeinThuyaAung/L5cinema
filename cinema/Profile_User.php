<?php
session_start();
require_once("Connect.php");
if (isset($_SESSION['email'])) {

$Email=$_SESSION['email'];

	$select="SELECT * FROM Customer where Email='$Email'";
	$ret=mysql_query($select);
	$row=mysql_fetch_array($ret);
}
?>			
<html>
	    <head>

        <!-- Basic -->
        <title>Cinema | Display</title>

        <!-- Define Charset -->
        <meta charset="utf-8">

        <!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Page Description and Author -->
        <meta name="description" content="Sulfur - Responsive HTML5 Template">
        <meta name="author" content="Shahriyar Ahmed">

        <!-- Bootstrap CSS  -->
        <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" type="text/css">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="asset/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="asset/css/owl.theme.css" type="text/css">
        <link rel="stylesheet" href="asset/css/owl.transitions.css" type="text/css">
        
        <!-- Css3 Transitions Styles  -->
        <link rel="stylesheet" type="text/css" href="asset/css/animate.css">
        
        <!-- Lightbox CSS -->
        <link rel="stylesheet" type="text/css" href="asset/css/lightbox.css">

        <!-- Sulfur CSS Styles  -->
        <link rel="stylesheet" type="text/css" href="asset/css/style.css">

        <!-- Responsive CSS Style -->
        <link rel="stylesheet" type="text/css" href="asset/css/responsive.css">


        <script src="asset/js/modernizrr.js"></script>


    </head>

    <body>
    
        <header class="clearfix">
        
            <!-- Start Top Bar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-bar">
                            <div class="row">
                                    
                                <div class="col-md-6">
                                    <!-- Start Contact Info -->
                                    <ul class="contact-details">
                                        <li><a href="#"><i class="fa fa-phone"></i> +951 371 356</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i> mingalarcinema@gmail.com</a>
                                        </li> 
                                    </ul>
                                    <!-- End Contact Info -->
                                </div><!-- .col-md-6 -->
                                
                                <div class="col-md-6">
                                    <!-- Start Social Links -->
                                    <ul class="social-list">
                                        <li>
                                            <a href="#"><i class="fa fa-rss"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-flickr"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-vimeo-square"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End Social Links -->
                                </div><!-- .col-md-6 -->
                            </div>
                                
                                
                        </div>
                    </div>                        

                </div><!-- .row -->
            </div><!-- .container -->
            <!-- End Top Bar -->
        
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="index.html">MinGaLar Cinema</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <?php 
                                if(isset($_SESSION['email'])) 
                                {
                                    echo '<li><a href="index.php">Home</a></li>';
                                    echo '<li><a href="Display_tem.php">Display</a></li>';
                                    echo '<li><a class="active" href="Profile_User.php">Profile</a></li>';
                                    echo '<li><a href="Logout.php">Log Out</a></li>';
                                }
                                else
                                {
                                    echo '<li><a class="active" href="index.php">Home</a></li>';
                                    echo '<li><a href="Login.php">LogIn</a></li>';
                                    echo '<li><a href="Register_User.php">Register</a></li>';
                                }
                                 ?>
                            <li><a href="contact.php">Contact</a>
                            </li>
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header>


        <!-- Start Header Section -->
        <div class="banner">
            <div class="overlay">
                <div class="container">
                    <div class="intro-text">
                        <h1>Welcome To The <span>Great Sulfur</span></h1>
                        <p>Generate a flood of new business with the <br> power of a digital media platform</p>
                        <a href="#feature" class="page-scroll btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->

	<table>
		<tr>
			<td><img src="<?php echo $row['Paths']?>" width="300px"></td>
			<td>
				<h2><?php echo $row['CustomerName']; ?></h2>
				<p>Email :: <?php echo $Email; ?></p>
				<p>Password :: <?php echo $row['Password']; ?></p>
				<p>Phone :: <?php echo $row['Phone']; ?></p>
				<p>DOB :: <?php echo $row['DOB']; ?></p>
				<p>Gender :: <?php echo $row['Gender']; ?></p>
				
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
<p><?php echo "<td><a href='Register_User.php?mode=edit&id=".$row['CustomerID']."'>Change Profile</a>
					<a href='Logout.php'>Logout</a></td>";
				echo "</tr>"; ?></p></td>
		</tr>
	</table>
	<!-- End Team Member Section -->
 
        <!-- Start Client Section -->
        <div id="client-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="client-box">
                            <ul class="client-list">
                                <li><a href="#"><img src="asset/images/clients/client1.png" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="asset/images/clients/client2.png" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="asset/images/clients/client3.png" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="asset/images/clients/client4.png" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="asset/images/clients/client5.png" class="img-responsive" alt="Clients Logo"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Client Section -->
        
        
        
          <!-- Start Footer Section -->
        <section id="footer-section" class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Office Address</span>
                            </h3>
                        </div>
                        
                        <div class="footer-address">
                            <ul>
                                <li class="footer-contact"><i class="fa fa-home"></i>Conor of Phone Gyi Street and Anawrahtar Road,Lanmadaw Township,Yangon, Address</li>
                                <li class="footer-contact"><i class="fa fa-envelope"></i><a href="#">mingalarcinema.com</a></li>
                                <li class="footer-contact"><i class="fa fa-phone"></i>+951 371 356</li>
                                <li class="footer-contact"><i class="fa fa-globe"></i><a href="#" target="_blank">www.mingalarcinema.com</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3 -->
          
                    <div class="col-md-3">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Latest Tweet</span>
                            </h3>
                        </div>
                        
                        <div class="latest-tweet">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-twitter fa-2x media-object"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">About 15 days ago</h4>
                                    <p>Finally #tutsplus start a tutorial on A Beginner’s Guide to Using #joomla . Check it out here http://t.co/i6S4zeW8Z0</p>
                                </div>
                            </div>
                        </div>
                    </div><!--/.col-md-3 -->
                    
                    <div class="col-md-3">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Stay With us</span>
                            </h3>
                        </div>
                        <div class="subscription">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your E-mail" id="name" required data-validation-required-message="Please enter your name.">
                                <input type="submit" class="btn btn-primary" value="Subscribe">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>FLICKR STREAM</span>
                            </h3>
                        </div>
                        
                        <div class="flickr-widget">
                            <ul class="flickr-list">
                                <li>
                                    <a href="asset/images/portfolio/photo1.jpg" data-lightbox="picture-1">
                                        <img src="asset/images/portfolio/photo1.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo2.jpg" data-lightbox="picture-2">
                                        <img src="asset/images/portfolio/photo2.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo3.jpg" data-lightbox="picture-3">
                                        <img src="asset/images/portfolio/photo3.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo4.jpg" data-lightbox="picture-4">
                                        <img src="asset/images/portfolio/photo4.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo5.jpg" data-lightbox="picture-5">
                                        <img src="asset/images/portfolio/photo5.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo6.jpg" data-lightbox="picture-6">
                                        <img src="asset/images/portfolio/photo6.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo7.jpg" data-lightbox="picture-7">
                                        <img src="asset/images/portfolio/photo7.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/photo8.jpg" data-lightbox="picture-8">
                                        <img src="asset/images/portfolio/photo8.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3 -->
                </div><!--/.row -->
            </div><!-- /.container -->
        </section>
        <!-- End Footer Section -->
        
        
        <!-- Start Copyright Section -->
        <div id="copyright-section" class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="copyright">
                            Copyright © 2014. All Rights Reserved.Design and Developed by <a href="http://www.themefisher.com">Themefisher</a>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="copyright-menu pull-right">
                            <ul>
                                <li><a href="#" class="active">Home</a></li>
                                <li><a href="#">Sample Site</a></li>
                                <li><a href="#">getbootstrap.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.row -->
            </div><!-- /.container -->
        </div>
        <!-- End Copyright Section -->
        
        
        
        <!-- Sulfur JS File -->
        <script src="asset/js/jquery-2.1.3.min.js"></script>
        <script src="asset/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="asset/bootstrap/js/bootstrap.min.js"></script>
        <script src="asset/js/owl.carousel.min.js"></script>
        <script src="asset/js/jquery.appear.js"></script>
        <script src="asset/js/jquery.fitvids.js"></script>
        <script src="asset/js/jquery.nicescroll.min.js"></script>
        <script src="asset/js/lightbox.min.js"></script>
        <script src="asset/js/count-to.js"></script>
        <script src="asset/js/styleswitcher.js"></script>
        <!-- Google Map -->
        <script src="asset/js/map.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        <script src="asset/js/script.js"></script>
        
    
	</html>	