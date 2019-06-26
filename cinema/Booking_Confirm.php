<?php 
session_start();
require_once('Connect.php');
if (isset($_POST['btnsearch']))
{
	$rdosearch=$_POST['rdosearch'];
	if ($rdosearch=='mname') 
	{
		$mid=$_POST['cbomname'];
		$select="SELECT * FROM booking b,customer c,movie m where b.MovieID='$mid'
		AND b.CustomerID=c.CustomerID
		AND b.MovieID=m.MovieID
		AND b.Status='Pending'";
		$selret=mysql_query($select);
		$selcount=mysql_num_rows($selret);
	}
	else if($rdosearch=='cname')
	{
		$cid=$_POST['cbocname'];
		$select="SELECT * FROM booking b,customer c,movie m where b.CustomerID='$cid'
		AND b.CustomerID=c.CustomerID
		AND b.MovieID=m.MovieID
		AND b.Status='Pending'";
		$selret=mysql_query($select);
		$selcount=mysql_num_rows($selret);
	}
	else if($rdosearch=='bdate')
	{
		date_default_timezone_set("Asia/Rangoon") ;
		$bdate=date("Y-m-d",strtotime($_POST['txtodate']));
		$select="SELECT * FROM booking b,customer c,movie m WHERE b.BookingDate='$bdate'
		AND b.CustomerID=c.CustomerID
		AND b.MovieID=m.MovieID
		AND b.Status='Pending'";
		$selret=mysql_query($select);
		$selcount=mysql_num_rows($selret);
	}
	else
	{
		date_default_timezone_set("Asia/Rangoon") ;
		$from=date("Y-m-d",strtotime($_POST['txtfrom']));
		$to=date("Y-m-d",strtotime($_POST['txtto']));
		$select="SELECT * FROM booking b, customer c, movie m WHERE b.BookingDate BETWEEN '$from' AND '$to'
		AND b.CustomerID=c.CustomerID
		AND b.MovieID=m.MovieID
		AND b.Status='Pending'";
		$selret=mysql_query($select);
		$selcount=mysql_num_rows($selret);
	}
}
elseif (isset($_POST['btnshowall'])) 
{
	$select="SELECT * FROM booking b, customer c, movie m
		WHERE b.CustomerID=c.CustomerID
		AND b.MovieID=m.MovieID
		AND b.Status='Pending'";
	$selret=mysql_query($select);
	$selcount=mysql_num_rows($selret);
}
else
{
	date_default_timezone_set("Asia/Rangoon") ;
	$today=date('d/m/y D');
	$select="SELECT * FROM Booking b, customer c, movie m 
			WHERE b.BookingDate='$today'
			AND b.CustomerID=c.CustomerID
			AND b.MovieID=m.MovieID
			AND b.Status='Pending'";
	$selret=mysql_query($select);
	$selcount=mysql_num_rows($selret);
}

if (isset($_REQUEST['id'])) 
{
	$ID=$_REQUEST['id'];
	$update="UPDATE Booking SET Status='Confirmed' WHERE BookingID='$ID'";
	$ret=mysql_query($update);
	if ($ret) 
	{
		echo '<script>window.alert("Confirmed");
		window.location="Booking_Confirm.php";</script>';
	}
	else
	{
		echo mysql_error();
	}
}
 ?>
<html>
<head>

        <!-- Basic -->
        <title>Cinema | Header</title>

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
        <script type="text/javascript" src="js/jquery.min.js"></script>
 	<style>
		#textdisplay1{display: none;}
		#textdisplay2{display: none;}
		#textdisplay3{display: none;}
		#textdisplay4{display: none;}
		#textdisplay5{display: none;}
	</style>
	<script type="text/javascript" src="DatePicker/datepicker.js"></script>
	<script>
		function display1()
		{
				$("#textdisplay1").show("fast");
				$("#textdisplay2").hide("fast");
				$("#textdisplay3").hide("fast");
				$("#textdisplay4").hide("fast");
				$("#textdisplay5").hide("fast");
			
		}
		function display2()
		{
				$("#textdisplay1").hide("fast");
				$("#textdisplay2").show("fast");
				$("#textdisplay3").hide("fast");
				$("#textdisplay4").hide("fast");
				$("#textdisplay5").hide("fast");
			
		}
		function display3()
		{
				$("#textdisplay1").hide("fast");
				$("#textdisplay2").hide("fast");
				$("#textdisplay3").show("fast");
				$("#textdisplay4").hide("fast");
				$("#textdisplay5").hide("fast");
			
		}
		function display4()
		{
				$("#textdisplay1").hide("fast");
				$("#textdisplay2").hide("fast");
				$("#textdisplay3").hide("fast");
				$("#textdisplay4").show("fast");
				$("#textdisplay5").show("fast");
			
		}
	</script>
        


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
                                <?php 
                                if(isset($_SESSION['email'])) 
                                {
                                    echo '<li><a class="active" href="index.php">Home</a></li>';
                                    echo '<li><a href="Login.php">LogIn</a></li>';
                                    echo '<li><a href="Register_User.php">Register</a></li>';
                                    echo '<li><a href="Contact.php">Contact</a></li>';
                                }
                                else
                                {
                                    echo '<li><a href="Logout.php">Log Out</a></li>';
                                    echo '<li><a href="Movie_Register.php">Movie</a></li>';
                                    echo '<li><a href="MovieType.php">Movie Type</a></li>';
                                    echo '<li><a href="Room.php">Room</a></li>';
                                    echo '<li><a href="Booking_Confirm.php">Booking Confirm</a></li>';
                                    echo '<li><a href="Booking_Payment.php">Booking Payment</a></li>';
                                    echo '<li><a href="Report.php">Booking Report</a></li>';
                                }
                                 ?>
                            </li>
                            
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header>

<form action="#" method="POST" enctype="multipart/form-data">
<input type="hidden" name="txtcid" value="<?php if(isset($CID)) {echo $CID;} ?>">
<section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Booking Confirm!</h2>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-12">
                    <form action="Booking_Confirm.php" method="POST" name="user" id="contactForm" novalidate>
                        <div class="row">
                        	<table>
<tr>
<td>
	<input type="radio" name="rdosearch" value="mname" onClick="display1()"/>Search by Movie Name</td>
<td><input type="radio" name="rdosearch" value="cname" onClick="display2()"/>Search by Customer Name</td>
<td><input type="radio" name="rdosearch" value="bdate" onClick="display3()"/>Search by Booking Date</td>
<td colspan='2'><input type="radio" name="rdosearch" value="datebetween" onClick="display4()"/>Search by Booking Date Between</td>
<td></td>
<td></td>
</tr>
<tr>
	<td colspan="4">
			<div class="form-group">
	</br>
<select name="cbomname" class="form-control" id="textdisplay1" >
<option>---Select Movie Name---</option>
<?php 
$query="SELECT * FROM movie";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);
for ($i=0; $i < $count ; $i++) 
{ 
	$row=mysql_fetch_array($ret);
	echo "<option value='".$row['MovieID']."'>".$row['MovieName']."</option>";
}
 ?>
</select>
</div>
	<div class="form-group">
<select name="cbocname" class="form-control" id="textdisplay2">
<option>---Select Customer Name---</option>
<?php 
$query="SELECT * FROM customer";
$ret=mysql_query($query);
$count=mysql_num_rows($ret);
for ($i=0; $i < $count ; $i++) 
{ 
	$row=mysql_fetch_array($ret);
	echo "<option value='".$row['CustomerID']."'>".$row['CustomerName']."</option>";
}
 ?>
</select>
</div>
	<div class="form-group">
		<input type="date" name="txtodate" value="<?php date_default_timezone_set("Asia/Rangoon"); echo date('d-M-Y'); ?>" onFocus="showCalender(calender,this)" class="form-control" id="textdisplay3"/>
	</div>

	<div class="form-group">
		<input type="date" name="txtfrom" value="<?php date_default_timezone_set("Asia/Rangoon"); echo date('d-M-Y'); ?>" onFocus="showCalender(calender,this)" class="form-control" id="textdisplay4"/>
	</div>
<br/>
	<div class="form-group">
		<input type="date" name="txtto" value="<?php date_default_timezone_set("Asia/Rangoon"); echo date('d-M-Y'); ?>" onFocus="showCalender(calender,this)" class="form-control" id="textdisplay5"/>
	</div>

	</td>
</tr>
	<tr>
	<td>
	<input type="submit" name="btnsearch" value="Search" class="btn btn-primary"/>
	</td>
	<td>
	<input type="submit" name="btnshowall" value="Show All" class="btn btn-primary"/>
	</td>
	</tr>

</table>
 </form>
 <table align="center">
<tr>
<th>Booking No</th>
<th>Booking Date</th>
<th>Customer Name</th>
<th>Movie</th>
<th>Quantity</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php 
	for ($i=0; $i < $selcount ; $i++) 
	{ 
		$data=mysql_fetch_array($selret);
		echo "<tr>";
		echo "<td>".$data['BookingID']."</td>";
		echo "<td>".$data['BookingDate']."</td>";
		echo "<td>".$data['CustomerName']."</td>";
		echo "<td>".$data['MovieName']."</td>";
		echo "<td>".$data['NoOfSeat']."</td>";
		echo "<td>".$data['TicketPrice']."</td>";
		echo "<td>".$data['Status']."</td>";
		echo "<td><a href='Booking_Confirm.php?id=".$data['BookingID']."'>Confirm</a></td>";
		echo "</tr>";
	}

 ?>
 </table>

					</div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>

 <?php require_once('Footer.php'); ?>

 </body>
 </html>