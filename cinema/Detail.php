<?php
session_start();
require_once('Connect.php');
date_default_timezone_set("Asia/Rangoon") ;
date('H:i',strtotime('-30 Minutes'));
date_default_timezone_set("Asia/Rangoon") ;
date('10:i');

if (isset($_REQUEST['id'])) 
{
    $id=$_REQUEST['id'];
    $select="SELECT * FROM Movie m,MovieType mt,Room r WHERE m.MovieTypeID=mt.MovieTypeID
    AND m.RoomID=r.RoomID AND m.MovieID='$id'";
    $ret=mysql_query($select);
    $row=mysql_fetch_array($ret);
    $mid=$row['MovieID'];
    $_SESSION['MovieID']=$mid;

}

?>      
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

    <head>

        <!-- Basic -->
        <title>Cinema | Detail</title>

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
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <?php 
                                if(isset($_SESSION['email'])) 
                                {
                                    echo '<li><a class="active" href="Display.php">Display</a></li>';
                                    echo '<li><a href="Profile_User.php">Profile</a></li>';
                                    echo '<li><a href="Logout.php">Log Out</a></li>';
                                }
                                else
                                {
                                    echo '<li><a href="Login.php">LogIn</a></li>';
                                    echo '<li><a href="Register_User.php">Register</a></li>';
                                }
                                 ?>
                            <li><a href="contact.html">Contact</a>
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

<section id="team-section">
        <!-- Start Blog Page Section -->
        <div class="container">
            <div class="row">
        
       <form action="seat.php" method="get">
        <input type="hidden" value="buy" name="action">
                    <input type="hidden" value="<?php echo $row['MovieID']; ?>" name="txtmovieid">
        
                
               
                    
                    <!-- Start Blog post -->
                    <div class="blog-post">
                        <div class="post-img">
                            <img src="<?php echo $row['Paths']?>" class="img-responsive" alt="Blog image">
                            
                        </div>
                        <h1 class="post-title"><a href="#"><?php echo $row['MovieName']; ?></a></h1>
                        
                        <ul class="post-meta">
							<li><i class="fa fa-clock-o"></i>October 25 2014</li>
							<li><i class="fa fa-user"></i><a href="#">Super User</a></li>
							<li><i class="fa fa-file"></i><a href="#">Blog</a></li>
                            <li><i class="fa fa-tags"></i><a href="#">Women Rights</a></li>
							<li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
						</ul>
                        <table>
                            <tr>
    <td>
        <p>Description :: </td><td><?php echo $row['Description']; ?></p>
</td>
</tr>
                        <tr>
    <td><p>Movie Type Name :: </td><td><?php echo $row['MovieTypeName']; ?></p></td>
</tr>
<tr>                
    <td><p>Room Name :: </td><td><?php echo $row['RoomName'];  ?></p></td>
</tr>
        <tr>
    <td><p>Movie Time ::</td><td>
        <select name="cbomovietime">
            <?php 
            if (date('H')=='10' || date('H')=='11') 
            {
                echo "<option>12:30pm-2:30pm</option>
                <option>3:30pm-5:30pm</option>
                <option>6:30pm-8:30pm</option>
                <option>9:30pm-11:30pm</option>";
            }
            elseif (date('H')=='12' || date('H')=='13' || date('H')=='14')
            {
                echo "<option>3:30pm-5:30pm</option>
                <option>6:30pm-8:30pm</option>
                <option>9:30pm-11:30pm</option>";
            }
            elseif (date('H')=='15' || date('H')=='16' || date('H')=='17')
            {
                echo "<option>6:30pm-8:30pm</option>
                <option>9:30pm-11:30pm</option>";
            }
            elseif (date('H')=='18' || date('H')=='19')
            {
                echo "<option>9:30pm-11:30pm</option>";
            }
            else
            {
                echo "<option>10:00am-12:00pm</option>
                <option>12:30pm-2:30pm</option>
                <option>3:30pm-5:30pm</option>
                <option>6:30pm-8:30pm</option>
                <option>9:30pm-11:30pm</option>";
            }

             ?>
        </select>
        </p>
    </td>
    </tr>
    <tr>
        <td>
            <p>Booking Date::</p></td><td>
        <input type="radio" name="bdate" value="<?php date_default_timezone_set("Asia/Rangoon") ;echo date('Y-m-d'); ?>"><?php date_default_timezone_set("Asia/Rangoon") ;echo date('Y-m-d'); ?>
        <input type="radio" name="bdate" value="<?php date_default_timezone_set("Asia/Rangoon") ;echo date('Y-m-d',strtotime("+1days")) ?>"><?php date_default_timezone_set("Asia/Rangoon") ;echo date('Y-m-d',strtotime("+1days")) ?>
        </td>
    </tr>
    <tr>
    <td>
        <input type="submit" value="Bookng"  name="txtadd" class="btn btn-primary">
                
    </td>   
    </tr>   
    </table>
                    </div>

                    <!-- End Blog Post -->
                    </form> 
            </div>
        </div>
    </section>
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
                                    <a href="asset/images/portfolio/img1.jpg" data-lightbox="picture-1">
                                        <img src="asset/images/portfolio/img1.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img2.jpg" data-lightbox="picture-2">
                                        <img src="asset/images/portfolio/img2.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img3.jpg" data-lightbox="picture-3">
                                        <img src="asset/images/portfolio/img3.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img4.jpg" data-lightbox="picture-4">
                                        <img src="asset/images/portfolio/img4.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img5.jpg" data-lightbox="picture-5">
                                        <img src="asset/images/portfolio/img5.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img6.jpg" data-lightbox="picture-6">
                                        <img src="asset/images/portfolio/img6.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img1.jpg" data-lightbox="picture-7">
                                        <img src="asset/images/portfolio/img1.jpg" alt="" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="asset/images/portfolio/img2.jpg" data-lightbox="picture-8">
                                        <img src="asset/images/portfolio/img2.jpg" alt="" class="img-responsive">
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
        
    
    </body>
</html>