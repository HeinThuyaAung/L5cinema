<?php 
session_start();
require_once('Function.php');
require_once('Connect.php');
if (isset($_REQUEST['mode'])) 
{
	$mode=$_REQUEST['mode'];
	$id=$_REQUEST['id'];
	if ($mode=='delete')
	 {
		$query=mysql_query("Delete from Movie where MovieID='".$_REQUEST['id']."'") or die("Cann't Delete");
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
		$select="select * from Movie where MovieID='$id'";
		$selret=mysql_query($select);
		$selrow=mysql_fetch_array($selret);
		$MID=$selrow['MovieID'];
		$MName=$selrow['MovieName'];
		$MTID=$selrow['MovieTypeID'];
		$RID=$selrow['RoomID'];
		$Des=$selrow['Description'];
		$SDate=$selrow['StartDate'];
		$EDate=$selrow['EndDate'];

	}
}
if (isset($_POST['btnupdate'])) 
{
	$updateid=$_POST['movieid'];
	$updatemname=$_POST['txtname'];
	$updatemtid=$_POST['cbomovietype'];
	$updaterid=$_POST['cboroom'];
	$updatename=$_POST['txtdes'];
	date_default_timezone_set("Asia/Rangoon") ;
	$updatesdate=date('Y-m-d',strtotime($_POST['txtfrom']));
	$updateedate=date('Y-m-d',strtotime($_POST['txtto']));
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
	$video=$_FILES['video']['name'];
	$vfolder="Video/";
	if ($video) 
	{
		$updatevfilename=$vfolder."_".$video;
		$updatevcopies=copy($_FILES['video']['tmp_name'], $updatevfilename);
		if (!$updatevcopies) 
		{
			exit("Problem Occured. Cannot upload video.");
		}
	}

	$query="Update Movie
			set MovieID='$updateid',MovieName='$updatemname',  MovieTypeID='$updatemtid',RoomID='$updaterid', Description='$updatename' ,
			 StartDate='$updatesdate',EndDate='$updateedate',Paths='$updatefilename',Videos='$updatevfilename'
			where MovieID='$updateid'";
	$ret=mysql_query($query);
	if ($ret>0) 
    {
        echo "<script>window.alert('Update!')</script>";
     	echo "<script>window.location='Movie_Register.php'</script>";
    }
    else
    {
        echo mysql_error();
    }
}

if (isset($_POST['btnreg'])) 
{
$MovieID=$_POST['movieid'];
$MovieName=$_POST['txtname'];
$MovieTypeID=$_POST['cbomovietype'];
$RoomID=$_POST['cboroom'];
$MovieTime=$_POST['cbomovietime'];
$Description=$_POST['txtdes'];
date_default_timezone_set("Asia/Rangoon") ;
$StartDate=date('Y-m-d',strtotime($_POST['txtfrom']));
$EndDate=date('Y-m-d',strtotime($_POST['txtto']));
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
$video=$_FILES['video']['name'];
	$vfolder="Video/";
	if ($video) 
	{
		$vfilename=$vfolder."_".$video;
		$vcopies=copy($_FILES['video']['tmp_name'], $vfilename);
		if (!$vcopies) 
		{
			exit("Problem Occured. Cannot upload video.");
		}
	}
	if(empty($MovieName))
    $msg="Please fill Movie Name";
    else if(empty($MovieTypeID))
    $msg="Please fill MovieType Name";
    else if(empty($RoomID))
    $msg="Please Fill Room Number";
  	else if(empty($Description))
    $msg="Please fill Description";
  	else if(empty($StartDate))
    $msg="Please Fill Start Date";
  	else if(empty($EndDate))
    $msg="Please Fill End Date";
else
{
	$select="select * from Movie where MovieName='$MovieName'";
	$ret=mysql_query($select);
	$count=mysql_num_rows($ret);
	if ($count>0) 
	{
		echo'<script>wondow.alert("Movie Already Exists!")</script>';
		echo'<script>window.location="Movie_Register.php"</script>';
	}
	else
	{
		$insert="INSERT INTO Movie(MovieID,MovieName,MovieTypeID,RoomID,Description,StartDate,EndDate,Paths,Videos)
				VALUES ('$MovieID','$MovieName' ,'$MovieTypeID','$RoomID' ,'$Description','$StartDate','$EndDate' ,'$filename','$vfilename')";
		$ret=mysql_query($insert);
		if($ret>0)
		{
			echo'<script>window.alert("Movie Register Successfull!")</script>';
			echo'<script>window.location="Movie_Register.php"</script>';
		}
	else
	{
		echo mysql_error();
	}
	}
}
	
}
?>
<html>
<head>
    <title>Cinema | Movie Register</title>
    
</head>
<body>
<?php require_once('Header.php'); ?>
<!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Movie Register </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->
        <?php
              if(!empty($msg))
              echo'<font>'.$msg.'</font>';
            ?>
        <!-- Start Contact Us Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Upload The Movie Register</h2>
                    </div>
                </div>
            </div>
	<div class="row">
                <div class="col-lg-12">
                    <form action="Movie_Register.php" method="POST" enctype="multipart/form-data" name="user" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" name="movieid" value="<?php if (isset($MID)) 
    { echo "$MID";} else { echo AutoID('Movie','MovieID','M-',6);} ?>" readonly class="form-control" placeholder="Your MovieID *" id="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtname" value="<?php if(isset($MName)) { echo $MName;} ?>" class="form-control" placeholder="Your Movie Name *" id="phone" required data-validation-required-message="Please enter your movie name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select name="cbomovietype" class="form-control" id="phone">
 				<option>Choose Movie Type</option>
 			<?php 
 			$select="SELECT * FROM MovieType";
 			$ret=mysql_query($select);
 			$count=mysql_num_rows($ret);
 			for($s=0;$s<$count;$s++)
 			{
 				$row=mysql_fetch_array($ret);
 				echo '<option value="'.$row["MovieTypeID"].'">';
 				echo $row["MovieTypeName"];
 				echo '</option>';
 			}

 			 ?>
 		</select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select name="cboroom" class="form-control" id="phone">
 			<option>Choose Room</option>
 			<?php 
 			$select="SELECT * FROM Room";
 			$ret=mysql_query($select);
 			$count=mysql_num_rows($ret);
 			for($s=0;$s<$count;$s++)
 			{
 				$row=mysql_fetch_array($ret);
 				echo '<option value="'.$row["RoomID"].'">';
 				echo $row["RoomName"];
 				echo '</option>';
 			}

 			 ?>
 		</select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                	<textarea name="txtdes" class="form-control" placeholder="Movie Description *" id="phone" required data-validation-required-message="Please enter movie description."><?php if(isset($Des)) { echo $Des;} ?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                	<input type="text" name="txtfrom" value="<?php date_default_timezone_set("Asia/Rangoon") ; echo date('d/m/y') ?>" onFocus="showCalender(calender,this)"  class="form-control" id="phone" required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtto" value="<?php date_default_timezone_set("Asia/Rangoon") ; echo date('d/m/y') ?>" onFocus="showCalender(calender,this)"  class="form-control" id="phone" required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="video">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="paths">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <?php 
                if (isset($MName)) 
                {
                    echo '<input type = "submit" value="Update" name="btnupdate" class="btn btn-primary"/>';   
                } 
                else
                {
                    echo '<input type = "submit" value="Register" name="btnreg" class="btn btn-primary"/>';
                } 
            ?>
                  <input type ="reset" value"Cancel" name="clear" class="btn btn-primary"/>
                            </div>
                      

       
<table align="center" border="1" class="row" cellpadding="10px" cellspacing="5px" width="100%">
			<h1 align="center">Movie Table</h1>
			<tr>
				<th>Movie ID</th>
				<th>Movie Name</th>
				<th>MovieType Name</th>
				<th>Room Name</th>
				<th>Description</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Video</th>
				<th>Path</th>
                <th>Action</th>
				
			<?php 
			$select="SELECT * FROM Room r, MovieType mt,Movie m WHERE m.MovieTypeID=mt.MovieTypeID AND m.RoomID=r.RoomID ";
			$ret=mysql_query($select);
			$count=mysql_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$data=mysql_fetch_array($ret);
				echo "<tr>";
					echo "<td>".$data['MovieID']."</td>";
					echo "<td>".$data['MovieName']."</td>";
					echo "<td>".$data['MovieTypeName']."</td>";
					echo "<td>".$data['RoomName']."</td>";
					echo "<td>".$data['Description']."</td>";
					echo "<td>".$data['StartDate']."</td>";
					echo "<td>".$data['EndDate']."</td>";
					echo "<td>".$data['Videos']."</td>";
					echo "<td><img src='".$data['Paths']."' width='100' height='100'/></td>";
					echo "<td><a href='Movie_Register.php?mode=edit&id=".$data['MovieID']."'>Edit</a>
					<a href='Movie_Register.php?mode=delete&id=".$data['MovieID']."'>Delete</a></td>";
				echo "</tr>";
			}
			 ?>
			 </tr>
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
