<?php 
require_once("Connect.php");
require_once("Function.php");
date_default_timezone_set("Asia/Rangoon");
  //---------date -------
    $month = date("m"); //without leading zero(o)
        $year = date("Y"); //four digit format
      $day = date("d");
        $st_year = "1950"; //Starting Year
        $month_names = array("January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December");
    $Convertdays = $month."/".$day."/".$year; 
  
    //=================================

if (isset($_REQUEST['mode'])) 
{
  $mode=$_REQUEST['mode'];
  $id=$_REQUEST['id'];
  if ($mode=='delete')
   {
    $query=mysql_query("Delete from Customer where CustomerID='".$_REQUEST['id']."'") or die("Cann't Delete");
    if($query)
    $msg="Delete Successfully Record"; 
   }
}
if (isset($_REQUEST['mode'])) 
{
  $mode=$_REQUEST['mode'];
  $id=$_REQUEST['id'];
  if ($mode=='edit')
  {
    $select="select * from Customer where CustomerID='$id'";
    $selret=mysql_query($select);
    $selrow=mysql_fetch_array($selret);
    $CID=$selrow['CustomerID'];
    $CName=$selrow['CustomerName'];
    $EMAIL=$selrow['Email'];
    $PASSWORD=$selrow['Password'];
    $PHONE=$selrow['Phone'];
    $DOB=$selrow['DOB'];
    $GENDER=$selrow['Gender'];

  }
}
if (isset($_POST['btnupdate'])) 
{
  $updateid=$_POST['txtcid'];
  $updatefname=$_POST['txtfirstname'];
  $updatelname=$_POST['txtlastname'];
  $updatecname=$updatefname." ".$updatelname;
  $updateemail=$_POST['txtemail'];
  $updaterpassword=$_POST['txtpassword'];
  $updatephone=$_POST['txtph'];
  $updatedob=$_POST['cboyear']."-".$_POST['cbomonth']."-".$_POST['cboday'];
  $updatesgender=$_POST['rdo'];
  $image=$_FILES['paths']['name'];
  $folder="Images/";
  if ($image) 
  {
    $updatefilename=$folder."_".$image;
    $updatecopies=copy($_FILES['paths']['tmp_name'], $updatefilename);
    if (!$updatecopies) 
    {
      exit("Problem Occured. Cannot upload image.");
    }
  }
  
  $query="Update customer
      set CustomerID='$updateid',CustomerName='$updatecname',  Email='$updateemail',Password='$updaterpassword', Phone='$updatephone', DOB='$updatedob' ,
       Gender='$updatesgender',Paths='$updatefilename'
      where CustomerID='$updateid'";
  $ret=mysql_query($query);
  if ($ret>0) 
    {
        echo "<script>window.alert('Update!')</script>";
      echo "<script>window.location='Profile_User.php'</script>";
    }
    else
    {
        echo mysql_error();
    }
}

  if(isset($_POST['btnsignup']))
  {
	  $id=AutoID("Customer","CustomerID","C-",6);
    $fname=$_POST['txtfirstname'];
    $lname=$_POST['txtlastname'];
	$cname=$fname." ".$lname;
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpassword'];
    $cpass=$_REQUEST['txtcpassword'];
	$pnum=$_POST['txtph'];
    $dob=$_POST['cboyear']."-".$_POST['cbomonth']."-".$_POST['cboday'];
    $gender=$_POST['rdo']; 
    $image=$_FILES['paths']['name'];
  $folder="Images/";
  if ($image) 
  {
    $filename=$folder."_".$image;
    $copies=copy($_FILES['paths']['tmp_name'], $filename);
    if (!$copies) 
    {
      exit("Problem Occured. Cannot upload image.");
    }
  }
                
    if(empty($fname))
    $msg="Please fill First Name";
    else if(empty($lname))
    $msg="Please fill Last Name";
    else if(empty($pnum))
    $msg="Please Fill Phone Number";
    else if(empty($email))
    $msg="Please fill Email Address";
    else if(empty($pass))
    $msg="Please fill Password";
  else if(empty($cpass))
    $msg="Please fill Comfirm Password";
    else if($pass!=$cpass)
    $msg="Please equal to two Password";
  else if(empty($gender))
    $msg="Please Fill Gender";
    else
    {
      $query=mysql_query("Select * from customer where Password='$pass' and Email='$email'") or die("Cann't Select Record");
      $num=mysql_num_rows($query);
      if($num>0)
      $msg="Your Name and email is already exist!";
      else
      $save_query=mysql_query("Insert into customer(CustomerID,CustomerName,Email,Password,Phone,DOB,Gender,Paths)
       values('".$id."','".$cname."','".$email."','".$pass."','".$pnum."','".$dob."','".$gender."','".$filename."')") or die("can't Insert Record!");
      if ($save_query)
      echo "<script>window.alert('Congratulation Your Sign Up!')</script>";
      echo "<script>window.location='login.php'</script>";
        $ret=mysql_query($save_query);
    }
  } 
?>                             
<?php
  if(!empty($msg))
  echo'<font>'.$msg.'</font>';
?>
<html>
<head>
  <title>User Register</title>
</head>
<body>

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
                                    echo '<li><a href="Logout.php">Log Out</a></li>';
                                    
                                }
                                else
                                {
                                    echo '<li><a href="index.php">Home</a></li>';
                                    echo '<li><a href="Login.php">LogIn</a></li>';
                                    echo '<li><a class="active" href="Register_User.php">Register</a></li>';
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

<form action="#" method="POST" enctype="multipart/form-data">
<input type="hidden" name="txtcid" value="<?php if(isset($CID)) {echo $CID;} ?>">
<section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>You can register here. Please your information must be complete!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="login.php" method="post" name="user" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input input name="txtfirstname" type="text" size="30" class="form-control" placeholder="Your First Name *" id="email" data-validation-required-message="Please enter your first name." required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="txtlastname" type="text" size="30" class="form-control" placeholder="Your Last Name *" id="phone" required data-validation-required-message="Please enter your last name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="txtemail" type="email" size="30" value="<?php if(isset($EMAIL)) { echo $EMAIL;} ?>" class="form-control" placeholder="Your Email *" id="phone" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="txtpassword" type="password" id="PASSWORD"  pattern=".{8,16}"  required title="8 to 16 characters" size="30" value="<?php if(isset($PASSWORD)) { echo $PASSWORD;} ?>" class="form-control" placeholder="Your Remember Password *">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="txtcpassword" type="password" size="30" id="RETYPE_PASSWORD"  class="form-control" placeholder="Your comfirm Password *"  required data-validation-required-message="Please enter your comfirm password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="txtph" type="tel" size="30" value="<?php if(isset($PHONE)) { echo $PHONE;} ?>" class="form-control" placeholder="Your Phone number *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                  <div><p>Date Of Birth</p></div>
                                    <select name="cboyear" id="year" onChange="update();">
            <?php
            for ($i=$st_year; $i<=$year; $i++) {
                echo "<option ";
                if ($i == $year) {
                    echo "selected=\"selected\" ";
                }
                echo "value=\"$i\">$i</option>\n";
            }
        ?>
          </select>
          <select name="cbomonth" id="month"  onChange="update();">
        <?php
            for ($i=1; $i<=12; $i++) {
                echo "<option ";
                if ($i == $month) {
                    echo "selected=\"selected\" ";
                }
                echo "value=\"$i\">", $month_names[$i-1], "</option>\n";
            }
        ?>
    </select>
          <select name="cboday" id="day"  onChange="update();">
            <?php
            for ($i=1; $i<=31; $i++) {
                echo "<option ";
                if ($i == $day) {
                    echo "selected=\"selected\" ";
                }
                echo "value=\"$i\">$i</option>\n";
            }
        ?>
          </select>
                                    <p id="Calculated"></p>
                                <div class="form-group">
                                    <input style="cursor:pointer;" name="rdo" type="radio" value="male" checked="checked" />
      Male
        <input style="cursor:pointer;" name="rdo" type="radio" value="female" />
        Female
        <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input input type="file" name="paths">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <?php 
                if (isset($CName)) 
                {
                    echo '<input type = "submit" value="Update" name="btnupdate" onClick="checkvalidation()" class="btn btn-primary"/>';   
                } 
                else
                {
                    echo '<input type = "submit" value="Register" name="btnsignup" onClick="checkvalidation()" class="btn btn-primary"/>';
                } 
            ?>
                  <input type ="reset" value"Cancel" name="btnClear" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>

</form> 
<?php require_once("Footer.php");?>
   </body>
</html>                     