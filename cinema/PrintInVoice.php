<?php 
session_start();
require_once('Connect.php');

$BookingID=$_REQUEST['BookingID'];
$bookingdate=$_SESSION['tdate'];
$mdate=$_SESSION['tbdate'];
$mid=$_SESSION['MovieID'];
$cusid=$_SESSION['CustomerID'];
$select="SELECT *
      FROM Booking b, Movie m, Customer c
      WHERE b.BookingID='$BookingID' 
      AND b.MovieID='$mid'
      AND b.CustomerID='$cusid'
      AND b.CustomerID=c.CustomerID
      AND b.MovieID = m.MovieID
      ";
$ret=mysql_query($select);
$row=mysql_fetch_array($ret);
 ?>
 <html>
 <head>
 	<title>Booking Invoice</title>
 	<link rel="stylesheet" type="text/css" href="ToStudents/style.css">
 </head>
 <body>
<?php require_once('Header.php'); ?>
<div>
 <div id="header">Mingalar Cinema</div>
 <div id="identity">
<div id="address">
Conor of Phone Gyi Street, <br/> Anawrahtar Road,Lanmadaw Township,Yangon <br/> Phone - 01 371 356
</div>
 </div>

 <div id="customer">
<table id="meta">
<tr>
<td class="meta-head">Invoice</td>
<td><?php echo $row['BookingID']; ?></td>
</tr>
<tr>
<td class="meta-head">Booking Date</td>
<td><?php echo $row['BookingDate']; ?></td>
</tr>
<tr>
<td class="meta-head">Target Date</td>
<td><?php echo $row['TargetDate']; ?></td>
</tr>
</table>
 </div>
 <table id="item">
<tr>
<th>Movie Time</th>
<th>Movie Name</th>
<th>No of Seat</th>
<th>Ticket Price</th>
</tr>
<tr class="item-row">
<td class="item-name"><?php echo $row['MovieTime']; ?></td>
<td class="description"><?php echo $row['MovieName'] ?></td>
<td class="item-name"><?php echo $row['NoOfSeat'] ?></td>
<td class="item-name"><?php echo $row['TicketPrice'] ?></td>
</tr>
<tr>
<td class="blank"></td>
<td colspan="2" class="total-line balance">Total Balance</td>
<td class="total-value balance"><div class="due"><?php echo $row['TicketPrice']; ?></div></td>
</tr>
 </table>

 <div id="terms">
		  <h5>Terms</h5>
		  <textarea></textarea>
		</div>
		 <script>
		 var pfHeaderImgUrl = '';
		 var pfHeaderTagline = 'Order%20Report';
		 var pfdisableClickToDel = 0;
		 var pfHideImages = 0;
		 var pfImageDisplayStyle = 'right';
		 var pfDisablePDF = 0;
		 var pfDisableEmail = 0;
		 var pfDisablePrint = 0;
		 var pfCustomCSS = '';
		 var pfBtVersion='1';
		 (function(){
		 	var js, pf;
		 		pf = document.createElement('script');
		 		pf.type = 'text/javascript';
		 		if('https:' == document.location.protocol){
		 			js='https://pf-cdn.printfriendly.com/ssl/main.js'
		 		}
		 		else
		 		{
		 			js='http://cdn.printfriendly.com/printfriendly.js'
		 		}
		 		pf.src=js;
		 		document.getElementsByTagName('head')[0].appendChild(pf)})();
		 		</script>
                <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>
 </div>
 <?php require_once('Footer.php'); ?>
 </body>
 </html>