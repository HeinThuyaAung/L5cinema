<?php 
session_start();
require_once('Connect.php');

$from=$_SESSION['from'];
			$to=$_SESSION['to'];
		$sql="SELECT *
				FROM Booking o, movietype pt, Movie p
				WHERE o.BookingDate BETWEEN '$from' AND '$to'
				AND o.MovieID = p.MovieID
				AND p.MovieTypeID = pt.MovieTypeID
				GROUP BY o.BookingDate";
		$dret=mysql_query($sql);
		$no=mysql_num_rows($dret);
 ?>
 <html>
 <head>
 	<title>Booking Report</title>
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
<tr><th colspan='6'> Monthly Booking Report </th></tr>
<tr>
<td>Booking Date</td>
<td colspan='2'><?php echo "$from"; ?></td>
<td colspan='2'><?php echo "$to"; ?></td>
				
				</tr>
</table>
 </div>
 <?php
 $table="<table border='1' id='item'>";
$table.="<tr>
			<th>Booking Date</th>
        	<th>Movie Name</th>
        	<th>Target Date</th>
        	<th>No of Seat</th>
        	<th>Ticket Price</th>
		</tr>";
			$sum=0;	
		for($i=0;$i<$no;$i++)
		{
			$row=mysql_fetch_array($dret);
			 		$item=$row['MovieName'];
			 	
			 		$p=$row['TargetDate'];
			 		$su=$row['NoOfSeat'];
			 		$sm=$row['TicketPrice'];
			 		$odate=$row['BookingDate'];

			 		$sum+=$sm;
		

	 	$table.="<tr>
	 		 	<td class='item-name'>$odate</td>
	 			<td class='item-name'>$item</td>
	 			<td class='description'>$p</td>
	 			<td class='item-name'>$su</td>
	 			<td class='item-name'>$sm</td>
	 			
	 		
	 		 </tr>";
		}
		
		$table.="<tr>
					<td colspan='3'>TOTAL</td>
					<td colspan='2'>$sum $</td>
				</tr>";
				
		
		$table.="<tr>
					<td colspan='6' rowspan='2'> HAVE A NICE DAY <br/> Thank You</td>
				</tr>";
		
		$table.="</table>";
		echo $table;
?>	

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