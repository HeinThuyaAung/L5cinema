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
		$query=mysql_query("Delete from Room where RoomID='".$_REQUEST['id']."'") or die("Cann't Delete");
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
		$select="SELECT * from Room where RoomID='$id'";
		$selret=mysql_query($select);
		$selrow=mysql_fetch_array($selret);
		$RID=$selrow['RoomID'];
		$RName=$selrow['RoomName'];
		$totalrows=$selrow['TotalRows'];
	}
}
if (isset($_POST['btnupdate'])) 
{
	$updateid=$_POST['roomid'];
	$updatecboroom=$_POST['cboroom'];
	$updatetotalrows=$_POST['totalrows'];

	$query="Update Room
			set RoomID='$updateid',  RoomName='$updatecboroom', TotalRows='$updatetotalrows'
			where RoomID='$updateid'";
	$ret=mysql_query($query);
	if ($ret>0) 
    {
        echo "<script>window.alert('Update!')</script>";
     	echo "<script>window.location='Room.php'</script>";
    }
    else
    {
        echo mysql_error();
    }
}

if (isset($_POST['btnreg'])) 
{
$RoomID=$_POST['roomid'];
$RoomName=$_POST['cboroom'];
$TotalRows=$_POST['totalrows'];
    if(empty($RoomName))
    $msg="Please fill First Name";
    else if(empty($TotalRows))
    $msg="Please fill Total Rows";
else
{
	$select="select * from Room where RoomName='$RoomName'";
	$ret=mysql_query($select);
	$count=mysql_num_rows($ret);
	if ($count>0) 
	{
		echo'<script>wondow.alert("Room Already Exists!")</script>';
		echo'<script>window.location="Room.php"</script>';
	}
	else
	{
		$insert="INSERT INTO Room(RoomID,RoomName,TotalRows)
				VALUES ('$RoomID' ,'$RoomName' ,'$TotalRows' )";
		$ret=mysql_query($insert);
		if($ret>0)
		{
			echo'<script>window.alert("Room Register Successfull!")</script>';
			echo'<script>window.location="Room.php"</script>';
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
    <title>Room Register</title>
</head>
<body>
<?php require_once('Header.php'); ?>
<!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Room Register </h1>
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
                        <h2>Upload The Room Register</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="Room.php" method="POST" enctype="multipart/form-data" name="user" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" name="roomid" value="<?php if (isset($RID)) 
    { echo "$RID";} else { echo AutoID('Room','RoomID','R-',6);} ?>" readonly class="form-control" placeholder="Your MovieTypeID *" id="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select name="cboroom" value="<?php if(isset($RName)) { echo $RName;} ?>" class="form-control" id="phone">
            <option>--Choose Room--</option>
            <option>Cinema 1</option>
            <option>Cinema 2</option>
            <option>Cinema 3</option>
        </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="totalrows" value="<?php if(isset($totalrows)) { echo $totalrows;} ?>" class="form-control" placeholder="Enter Room's Total Rows*" id="email" required data-validation-required-message="Please enter room's total rows." required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                                <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <?php 
                if (isset($RName)) 
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
<table align="center" border="1" class="row" cellpadding="20px" cellspacing="10px" width="80%">
			<h1 align="center">Room Table</h1>
			<tr>
				<th>Room ID</th>
				<th>Room Name</th>
				<th>Total Rows</th>
                <th>Action</th>
				
			<?php 
			$select="SELECT * from Room";
			$ret=mysql_query($select);
			$count=mysql_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$data=mysql_fetch_array($ret);
				echo "<tr>";
					echo "<td>".$data['RoomID']."</td>";
					echo "<td>".$data['RoomName']."</td>";
					echo "<td>".$data['TotalRows']."</td>";
					echo "<td><a href='Room.php?mode=edit&id=".$data['RoomID']."'>Edit</a>
					<a href='Room.php?mode=delete&id=".$data['RoomID']."'>Delete</a></td>";
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
