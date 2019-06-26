<?php
	session_start();
?>
<?php
	$file_type="msexcel";
require_once("Connect.php");
	if(isset($_SESSION['bquery']))
	{		
			$bookingdate=$_SESSION['tdate'];
			$mdate=$_SESSION['tbdate'];
			$mid=$_SESSION['MovieID'];
			$cusid=$_SESSION['CustomerID'];
		$sql="SELECT *
				FROM Booking o, movietype pt, Movie p, Customer c
				WHERE o.CustomerID='$cusid'
				AND o.MovieID='$mid'
				AND o.CustomerID=c.CustomerID
				AND o.MovieID = p.MovieID
				AND p.MovieTypeID = pt.MovieTypeID
				ORDER BY o.BookingID DESC";
		$dret=mysql_query($sql);
		$no=mysql_num_rows($dret);
	}
	
	
		
		
		
	header("Content-Type:application/$file_type");
	header("Content-Disposition:attachment;filename=Voucher.xls");
	header("Pragma:no-cache");
	header("Expires:0");
	

	$table="<table border='1'>";
		 
		$table.="<tr>
					<td colspan='3'><img src='../S-00002_download.jpg' height='150px' width='150px'/> <br/>Mingalar Cinema<br/> Order For Movie TIcket </td>
					<td colspan='3'>Conor of Phone Gyi Street, <br/> Anawrahtar Road,Lanmadaw Township,Yangon <br/> Phone - 01 371 356
					</td>
				</tr>";
					
				   
		$table.="<tr><th colspan='6'> Monthly Booking Report </th></tr>";		
		$table.="<tr>
					<td>Booking Date</td>
					<td colspan='2'>$bookingdate</td>
					<td>Target Date</td>
					<td colspan='2'>$bdate</td>
				
				</tr>";
		
				
		
		$table.="<tr>
					<th>Booking ID</th>
					<th>Customer Name</th>
        			<th>Movie Name</th>
        			<th>Movie Time</th>
        			<th>No of Seat</th>
        			<th>Ticket Price</th>
        			<th>Target Date</th>
        			<th>Booking Date</th>
				</tr>";
			$sum=0;	
		for($i=0;$i<$no;$i++)
		{
			$row=mysql_fetch_array($dret);
					$bid=$row['BookingID'];
					$cid=$row['CustomerName'];
			 		$item=$row['MovieName'];
			 		$mtime=$row['MovieTime'];
			 		$su=$row['NoOfSeat'];
			 		$sm=$row['TicketPrice'];
			 		$p=$row['TargetDate'];
			 		$odate=$row['BookingDate'];

			 		
		

	 	$table.="<tr>
	 		 	<td>$bid</td>
	 		 	<td>$cid</td>
	 			<td>$item</td>
	 			<td>$mtime</td>
	 			<td>$su</td>
	 			<td>$sm</td>
	 			<td>$p</td>
		 		<td>$odate</td>
	 		 </tr>";
		}
		
		$table.="<tr>
					<td colspan='3'>TOTAL</td>
					<td colspan='2'>$sm $</td>
				</tr>";
				
		
		$table.="<tr>
					<td colspan='6' rowspan='2'> HAVE A NICE DAY <br/> Thank You</td>
				</tr>";
		
		$table.="</table>";
		echo $table;
		echo "<script>window.location='Logout.php'</script>";		
?>