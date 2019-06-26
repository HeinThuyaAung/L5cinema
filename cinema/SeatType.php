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
		$query=mysql_query("Delete from SeatType where SeatTypeID='".$_REQUEST['id']."'") or die("Cann't Delete");
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
		$select="SELECT * from SeatType where SeatTypeID='$id'";
		$selret=mysql_query($select);
		$selrow=mysql_fetch_array($selret);
		$STID=$selrow['SeatTypeID'];
		$RName=$selrow['RoomID'];
		$SRow=$selrow['SeatRow'];
		$SPrice=$selrow['SeatPrice'];
		$Quantity=$selrow['Quantity'];
	}
}
if (isset($_POST['btnupdate'])) 
{
	$updateid=$_POST['seattypeid'];
	$updaterid=$_POST['cboroom'];
	$updateseatrow=$_POST['seatrow'];
	$updateseatprice=$_POST['seatprice'];
	$updateqty=$_POST['quantity'];
	$query="Update SeatType
			set SeatTypeID='$updateid',  RoomID='$updaterid', SeatRow='$updateseatrow', SeatPrice='$updateseatprice', Quantity='$updateqty'
			where SeatTypeID='$updateid'";
	$ret=mysql_query($query) or die(mysql_error());
	if ($ret>0) 
    {
        echo "<script>window.alert('Update!')</script>";
     	echo "<script>window.location='SeatType.php'</script>";
    }
    else
    {
        echo mysql_error();
    }
}

if (isset($_POST['btnreg'])) 
{
$SeatTypeID=$_POST['seattypeid'];
$RoomID=$_POST['cboroom'];
$SeatRow=$_POST['seatrow'];
$SeatPrice=$_POST['seatprice'];
$Quantity=$_POST['quantity'];
	$select="select * from SeatType where SeatRow='$SeatRow'";
	$ret=mysql_query($select);
	$count=mysql_num_rows($ret);
	if ($count>0) 
	{
		echo'<script>wondow.alert("SeatType Already Exists!")</script>';
		echo'<script>window.location="SeatType.php"</script>';
	}
	else
	{
		$insert="INSERT INTO SeatType(SeatTypeID,RoomID,SeatRow,SeatPrice,Quantity)
				VALUES ('$SeatTypeID' ,'$RoomID' ,'$SeatRow' ,'$SeatPrice','$Quantity')";
		$ret=mysql_query($insert);
		if($ret>0)
		{
			echo'<script>window.alert("SeatType Register Successfull!")</script>';
			echo'<script>window.location="SeatType.php"</script>';
		}
	else
	{
		echo mysql_error();
	}
	}
	
}
?>
<html>
<head>
    <title>Seat Type</title>
</head>
<body>
<?php require_once('Header.php'); ?>
<!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Seat Type Register </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->

        <!-- Start Contact Us Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Upload The Seat Type Register</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="SeatType.php" method="POST" enctype="multipart/form-data" name="user" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" name="seattypeid" value="<?php if (isset($STID)) 
    { echo "$STID";} else { echo AutoID('SeatType','SeatTypeID','ST-',6);} ?>" readonly class="form-control" placeholder="Your MovieTypeID *" id="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                	<select name="cboroom" class="form-control" id="phone">
 									<option>--Choose Room--</option>
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
                                    <input type="text" name="seatrow" value="<?php if(isset($SRow)) { echo $SRow;} ?>" class="form-control" placeholder="Enter Seat Rows*" id="email" required data-validation-required-message="Please enter seat rows.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="seatprice" value="<?php if(isset($SPrice)) { echo $SPrice;} ?>" class="form-control" placeholder="Enter Seat Price*" id="phone" required data-validation-required-message="Please enter seat price.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="quantity" value="<?php if(isset($Quantity)) { echo $Quantity;} ?>" class="form-control" placeholder="Enter Seat Quantity*" id="email" required data-validation-required-message="Please enter saet quantity.">
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
<table align="center" border="1" class="row" cellpadding="10px" cellspacing="5px" width="80%">
			<h1 align="center">SeatType Table</h1>
			<tr>
				<th>SeatType ID</th>
				<th>Room Name</th>
				<th>SeatRow</th>
				<th>SeatPrice</th>
				<th>Quantity</th>
                <th>Action</th>
				
			<?php 
			$select="select * from Room r, seattype st WHERE r.RoomID=st.RoomID";
			$ret=mysql_query($select);
			$count=mysql_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$data=mysql_fetch_array($ret);
				echo "<tr>";
					echo "<td>".$data['SeatTypeID']."</td>";
					echo "<td>".$data['RoomName']."</td>";
					echo "<td>".$data['SeatRow']."</td>";
					echo "<td>".$data['SeatPrice']."</td>";
					echo "<td>".$data['Quantity']."</td>";
					echo "<td><a href='SeatType.php?mode=edit&id=".$data['SeatTypeID']."'>Edit</a>
					<a href='SeatType.php?mode=delete&id=".$data['SeatTypeID']."'>Delete</a></td>";
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
