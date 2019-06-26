<?php
session_start();
include ('Connect.php');
include('function.php');

if(isset($_POST['btnsearch']))
{
	date_default_timezone_set("Asia/Rangoon") ;
  $from=date("Y-m-d",strtotime($_POST['txtfrom']));
  $to=date("Y-m-d",strtotime($_POST['txtto']));
	$select="SELECT *
				FROM Booking o, movietype pt, Movie p
				WHERE o.BookingDate BETWEEN '$from' AND '$to'
        AND o.MovieID = p.MovieID
				AND p.MovieTypeID = pt.MovieTypeID
				GROUP BY o.BookingDate";
	$rett=mysql_query($select);
  $retNo=mysql_num_rows($rett);   
  $_SESSION['sql']=$select;

$_SESSION['from']=$from;
$_SESSION['to']=$to;
}
else
{
	$select="SELECT *
				FROM Booking o, movietype pt, Movie p
				WHERE o.MovieID = p.MovieID
				AND p.MovieTypeID = pt.MovieTypeID
				GROUP BY o.BookingDate";
  $rett=mysql_query($select);
  $retNo=mysql_num_rows($rett);   
  $_SESSION['sql']=$select;


}


if(isset($_POST['btnReport']))
{
	echo "<script>location='Print_Report.php'</script>";
}
?>
<link rel="stylesheet" type="text/css" href="script/DatePicker/datepicker.css">
<script src="script/DatePicker/datepicker.js" type="text/javascript"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once('Header.php'); ?>
<!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Booking Report </h1>
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
                        <h2>Booking Report</h2>
                    </div>
                </div>
            </div>
<body>
<form action="Report.php" method="post"/>
<div>
			<div class="form-group">
    <input type="date" name="txtfrom" value="<?php date_default_timezone_set("Asia/Rangoon"); echo date('Y-m-d'); ?>" onFocus="showCalender(calender,this)" class="form-control" id="textdisplay4"/>
  </div>
<br/>
  <div class="form-group">
    <input type="date" name="txtto" value="<?php date_default_timezone_set("Asia/Rangoon"); echo date('Y-m-d'); ?>" onFocus="showCalender(calender,this)" class="form-control" id="textdisplay5"/>
  </div>
  <div>
      <input type="submit" name="btnsearch" class="btn btn-primary" value="Search"/>
  </div>
</div>
<br>
<br>
<table align="center" bBooking="1px"cellpadding="5px"> 
	<tr>
		<th>Booking Date</th>
        <th>Movie Name</th>
        <th>Target Date</th>
        <th>No of Seat</th>
        <th>Ticket Price</th>
	</tr>


			 <?php 
			 	$totalUnits=0;
			 	$totalAmt=0;

			 	//-------------------------------

				for($i=0;$i<$retNo;$i++)
			 	{
			 		$row=mysql_fetch_array($rett);
			 		$item=$row['MovieName'];
			 	
			 		$p=$row['TargetDate'];
			 		$su=$row['NoOfSeat'];
			 		$sm=$row['TicketPrice'];
			 		$odate=$row['BookingDate'];

			 		$totalUnits+=$su;
			 		$totalAmt+=$sm;

			 		echo "<tr>";
			 		echo "<td>$odate</td>";
			 			echo"<td>$item</td>";
			 			echo"<td>$p</td>";
			 			echo"<td>$su</td>";
			 			echo"<td>$sm</td>";
			 			
			 		
			 		echo "</tr>";


			 	}
				  ?>
		<tr>
        	<td><input type="submit" name="btnReport" value="Export to Excel"/></td>
        </tr>

</table>
</form>
</body>
</div>
</section>
<?php require_once('Footer.php'); ?>
</html>