<?php 
session_start();
require_once('Function.php');
require_once('Connect.php');
$cusid=$_SESSION['CustomerID'];
if (!isset($cusid)) 
{
	echo "<script>window.alert('Please login First!')</script>";
	echo "<script>window.location='Login.php'</script>";
}
$mid=$_REQUEST['txtmovieid'];
if (!isset($_REQUEST['txtmovieid'])) 
{
	echo "<script>window.alert('Wrong Page!')</script>";
	echo "<script>window.location='Display.php'</script>";
}
$mid=$_REQUEST['txtmovieid'];
$mdate=$_REQUEST['bdate'];
if (isset($_REQUEST['txtmovieid'])) 
{
	$mselect="SELECT * FROM Movie WHERE MovieID='$mid'";
	$mret=mysql_query($mselect);
	$mrow=mysql_fetch_array($mret);
}
$select="SELECT * FROM tmpseat";
		$ret=mysql_query($select);
		$_SESSION['query']=$ret;
		$query=$_SESSION['query'];
		$seatcount=mysql_num_rows($ret);


if (isset($_POST['btnbook'])) 
{
	
	$TotalAmount=$_POST['txttotalamount'];
	$mdate=$_REQUEST['bdate'];
	date_default_timezone_set("Asia/Rangoon");
	$today=date('Y-m-d');
	if ($_REQUEST['bdate']==$today) 
	{
		echo $mtime=$_REQUEST['cbomovietime1'];
	}
	else
	{
		echo $mtime=$_REQUEST['cbomovietime2'];
	}
	if (isset($_REQUEST['selectseat'])) 
	{
		foreach($_REQUEST['selectseat'] as $selected)
		{	
			$id=AutoID('tmpseat','SeatID','S-',6);
			$insert="INSERT INTO tmpseat
					VALUES('$id','$selected','$cusid','$mid','$mtime','$mdate')";
			$seatret=mysql_query($insert) or die(mysql_error());

		}

	}
	else
	{
		echo "<script>window.alert('There is no Selected Seats!')</script>";
		echo "<script>window.location='seat.php'</script>";
	}
	
}
date_default_timezone_set("Asia/Rangoon");
$today=date('Y-m-d');
if (isset($_POST['btnfinish'])) 
{
	$bid=AutoID('Booking','BookingID','B_',6);
	$id=$_REQUEST['txtmovieid'];
	if ($_REQUEST['bdate']==$today) 
	{
		echo $mtime=$_REQUEST['cbomovietime1'];
	}
	else
	{
		echo $mtime=$_REQUEST['cbomovietime2'];
	}
	$mid=$_SESSION['MovieID'];
	$TotalAmount=$_POST['txttotalamount'];
	date_default_timezone_set("Asia/Rangoon");
	$bookingdate=date('Y-m-d');

	$mselect="SELECT * FROM tmpseat WHERE CustomerID='$cusid' AND MovieID='$mid' AND BookingDate='$mdate'";
	$mret=mysql_query($mselect);
	$mcount=mysql_num_rows($mret);

	$bminsert="INSERT INTO booking(BookingID,CustomerID,MovieID,MovieTime,TicketPrice,NoOfSeat,TargetDate,BookingDate,Status,PaymentStatus) 
				VALUES('$bid','$cusid','$mid','$mtime','$TotalAmount','$mcount','$bookingdate','$mdate','Pending','Pending')";
	$bmret=mysql_query($bminsert) or die(mysql_error());
	$_SESSION['tdate']=$bookingdate;
	$_SESSION['tbdate']=$mdate;
	$_SESSION['bquery']=$bmret;
	if ($bmret) 
	{
		echo "<script>window.alert('Successfully Booking')</script>";
		echo "<script>window.location='PrintInVoice.php?BookingID=$bid'</script>";
	}
}
date_default_timezone_set("Asia/Rangoon");
$date=date('Y-m-d');
if ( date('H')=='10' || date('H')=='11' || date('H')=='12' || date('H')=='13' || date('H')=='14' || date('H')=='15' || date('H')=='16' || date('H')=='17' || date('H')=='18' || date('H')=='19' || date('H')=='20' || date('H')=='21' || date('H')=='22' || date('H')=='23' || date('H')=='24' ) 
{
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$date' AND MovieTime LIKE '%10:00%'";
	$delret=mysql_query($delselect);
}
elseif ( date('H')=='12' || date('H')=='13' || date('H')=='14' || date('H')=='15'|| date('H')=='16'|| date('H')=='17'|| date('H')=='18' || date('H')=='19' || date('H')=='20' || date('H')=='21' || date('H')=='22' || date('H')=='23' || date('H')=='24') 
{
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$date' AND MovieTime LIKE '%12:30%'";
	$delret=mysql_query($delselect);
}
elseif ( date('H')=='15' || date('H')=='16' || date('H')=='17' || date('H')=='18' || date('H')=='19' || date('H')=='20' || date('H')=='21' || date('H')=='22' || date('H')=='23' || date('H')=='24') 
{
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$date' AND MovieTime LIKE '%3:30%'";
	$delret=mysql_query($delselect);
}
elseif (date('H')=='18' || date('H')=='19' || date('H')=='20' || date('H')=='21' || date('H')=='22' || date('H')=='23' || date('H')=='24') 
{
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$date' AND MovieTime LIKE '%6:30%'";
	$delret=mysql_query($delselect);
}
elseif (date('H')=='21' || date('H')=='22' || date('H')=='23' || date('H')=='24') 
{
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$date' AND MovieTime LIKE '%9:30%'";
	$delret=mysql_query($delselect);
}
else
{
	date_default_timezone_set("Asia/Rangoon");
	$predate=date('Y-m-d',strtotime("-1 Days"));
	$delselect="DELETE FROM tmpseat WHERE BookingDate='$predate'";
	$delret=mysql_query($delselect);
}
?>

<html>
<head>
	<title>Seating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		input
		{
			width: 80px;
			border: none;
		}
		li
		{
			list-style: none;
		}
	</style>
 </head>
	<script type="text/javascript" src="jquery.js"></script> 
	<script type="text/javascript" src="jquery.seat-charts.min.js"></script> 
	<script type="text/javascript">
		
		var price = 10; //price
		var seatcount=<?php echo $seatcount ?>;

$(document).ready(function() {
	var $cart = $('#selected-seats'), //Sitting Area
	$counter = $('#counter'), //Votes
	$total = $('#total');//Total money
	$price= $('#price');
	var sc = $('#seat-map').seatCharts({
		map: [  //Seating chart
			'aaaaaaaaaaaaaaa',
			'aaaaaaaaaaaaaaa',
			'_______________',
			'bbbbbbbbbbbbbbb',
			'bbbbbbbbbbbbbbb',
			'bbbbbbbbbbbbbbb',
			'ccccccccccccccc',
			'ccccccccccccccc',
			'ccccccccccccccc',
			'ddddddddddddddd'
		],
		naming : {
			top : false,
			getLabel : function (character, row, column) {
				return column;
			}
		},
		legend : { //Definition legend
			node : $('#legend'),
			items : [
				[ 'a', 'available',   'Option' ],
				[ 'a', 'unavailable', 'Sold'],
				['a','selected','Select']
			]					
		},
		seats:{
	        a:{
	            price: 2
	        },
	        b:{
	            price: 3
	        },
	        c:{
	            price: 4
	        },
	        d:{
	            price: 5,

	        }
	    },
		click: function () { //Click event
			if (this.status() == 'available') 
			{ 
				var maxSeats = 10;
	            var ms = sc.find('selected').length;
	            if (ms < maxSeats) 
	            {
	                price = this.settings.data.price;
	                seatrow=this.settings.row;
	                if (seatrow==11) 
	                {
	                	seatlabel=this.settings.label;
	                	seatlabel2=this.settings.label+1;
	                		
	                		seatid=this.settings.row+1+'_'+seatlabel;
	                		seatid2=this.settings.row+1+'_'+seatlabel2;


	                		for (var seatlabel=this.settings.label; seatlabel=seatlabel+2; seatlabel++) 
	                		{
	                			seatplace='Row'+(this.settings.row+1)+' Seat'+this.settings.label;
								$('<li><input type="text" name="show" value="Row'+(this.settings.row+1)+' Seat'+seatlabel+'" readonly/><input type="hidden" name="selectseat[]" value="'+(this.settings.row+1)+'_'+seatlabel+'"/><input type="hidden" name="selectrow[]" value="'+(this.settings.row+1)+'"/><input type="hidden" name="selectcol[]" value="'+seatlabel+'"/></li>')
								

								.attr('id', 'cart-item-'+seatid)
								.data('seatId', seatid)
								.appendTo($cart);
								$counter.text(sc.find('selected').length+1);
								$price.text(price);
								$total.text(recalculateTotal(sc)+price);
								return 'selected';
	                		}
		                	

	                }
	                else
	                {
						$('<li><input type="text" name="show" value="Row'+(this.settings.row+1)+' Seat'+this.settings.label+'" readonly/><input type="hidden" name="selectseat[]" value="'+(this.settings.row+1)+'_'+this.settings.label+'"/><input type="hidden" name="selectrow[]" value="'+(this.settings.row+1)+'"/><input type="hidden" name="selectcol[]" value="'+this.settings.label+'"/></li>')
						.attr('id', 'cart-item-'+this.settings.id)
						.data('seatId', this.settings.id)
						.appendTo($cart);

					$counter.text(sc.find('selected').length+1);
					$price.text(price);
					$total.text(recalculateTotal(sc)+price);
					return 'selected';
	                }
	                
				}
				alert('You can only choose '+ maxSeats + ' seats.');
                return 'available';
			} 
			else if (this.status() == 'selected') { //Checked
					//Update Number
					$counter.text(sc.find('selected').length-1);
					//update totalnum
					$total.text(recalculateTotal(sc)-price);
						
					//Delete reservation
					$('#cart-item-'+this.settings.id).remove();
					//optional
					return 'available';
			} else if (this.status() == 'unavailable') { //sold
				return 'unavailable';
			} else {
				return this.style();
			}
		}

	});
	//sold seat
	/*DECLARE @result varchar(250)
	SET @result = ''
	var select=SELECT @result = @result + SeatName + ',' FROM seat GROUP BY SeatName;*/
	<?php

		if ($mdate==$today) 
		{
			$movtime=$_REQUEST['cbomovietime1'];
		}
		else
		{
			$movtime=$_REQUEST['cbomovietime2'];
		}
		$select="SELECT * FROM tmpseat WHERE MovieID='$mid' AND BookingDate='$mdate' AND MovieTime='$movtime'";
		$ret=mysql_query($select);
		$count=mysql_num_rows($ret);
		for ($s=0; $s < $count ; $s++) 
		{ 
			$arr=array();
			$length=count($arr);
			$row=mysql_fetch_array($ret);
			$SeatName=$row['SeatName'];
	?>
			sc.get(['<?php echo $SeatName; ?>']).status('unavailable');
			/*foreach ($row as $seatrow)
			{
		        array_push($arr, $SeatName);

		    }
		    $seat='"'. $arr[$s].'"'.',';*/
	<?php
		}
	?>
	$('#btnShowNew').click(function () {
    var str = [], item;
    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
        item = $(this).attr('title');
        str.push(item);
    });
    alert(str.join(','));
})
});
//sum total money
function recalculateTotal(sc) {
	var total = 0;
	sc.find('selected').each(function () 
	{
		total += price;
	});
	return total;
}
function totalamount()
{
	var totalamount=document.getElementById('total').innerHTML;
	document.getElementById('seatamount').value=totalamount;
	var show=document.getElementById('seatamount').value;

}

	</script>
</head>
<body>
	<form action="#" method="post">
		<div class="demo">
		<table>
			<tr>
				<td>
					<div id="seat-map">
						<div class="front">Cinema Seating</div>	
						<!--<div class="images"><img src="images/screen.png"></div>-->		
					</div>
				</td>
				<td>
				<div class="booking-details">
					<table>
						<tr>
							<td colspan="2">
								<div id="seat-map">
									<div class="front2"><?php echo $mrow['MovieName']; ?></div>		
								</div>
							</td>
						</tr>
						<tr>
							<td>Movie:</td>
							<td><span><?php echo $mrow['MovieName']; ?> </span></td>
						</tr>
						<tr>
							<td>Time: </td>
							<td><span><?php if ($_REQUEST['bdate']==date('Y-m-d')) 
										{
											echo $mtime=$_REQUEST['cbomovietime1'];
										}
										else
										{
											echo $mtime=$_REQUEST['cbomovietime2'];
										} ?></span></td>
						</tr>
						<tr>
							<td colspan="2">Seat:</td>
						</tr>
						<tr>
							<td align="right" colspan="2"><ul id="selected-seats"></ul></td>
						</tr>
						<tr>
							<td>Tickets: </td>
							<td><span id="counter">0</span></td>
						</tr>
						<tr>
							<td>Chosen Ticket Price: </td>
							<td><span id="price">0</span></td>
						</tr>
						<tr>
							<td>Total: </td>
							<td><b>$<span id="total"></span></b></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="btnbook" class="checkout-button" value="BUY" onclick="totalamount()">
							</td>
						</tr>
						<tr>
							<td colspan="2"><div id="legend"></div></td>
						</tr>
					</table>
				
				</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="hidden" name="txttotalamount" id="seatamount" value="<?php if (isset($_POST['txttotalamount'])) 
							{
								echo $TotalAmount;
							}
							else
							{
								echo "0";
							} ?>" readonly>
					<table align="center">
						<tr>
							<td></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
								<input type="submit" name="btnfinish" class="checkout-button" value="Finish">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
			<div style="clear:both"></div>
	   </div>

	</form>
</body>
</html>