<?php
	session_start();
?>
<?php
	$file_type="msexcel";
require_once("Connect.php");
	if(isset($_SESSION['sql']))
	{	
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
					<td colspan='2'>$from</td>
					<td colspan='2'>$to</td>
				
				</tr>";
		
				
		
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
	 		 <td>$odate</td>
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
		echo "<script>window.location='Display_tem.php'</script>";		
?>