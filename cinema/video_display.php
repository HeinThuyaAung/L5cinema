<?php
session_start();
include('connect.php');

$movieid=$_GET['movieid'];


$select = "SELECT * FROM Movie 
	       WHERE MovieID='$movieid'";

  $ret=mysql_query($select);
  $row=mysql_fetch_array($ret);


		
if(isset($_POST['btnAdd']))
{
	echo "<script>window.location.assign('shoppingcart.php?action=Add&movieid=$movieid')</script>";
}
if(isset($_POST['btnBack']))
{
	echo "<script>window.location.assign('movie_display.php')</script>";
}

?>
<html>
<head>
<title>VIDEO</title>
<link rel="stylesheet" type = "text/css" href="video.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="jquery.js">
</script>
<script>
		
		function display()
		{
				window.location='video_display.php';
			
		}
</script>




</head>
<body bgcolor="black">
<form action="#" method="post">
<table align= "center">

<tr align="center" height="600">
	<td>
		<video width="1000" class="videodisplay" controls>
	  	<source src="<?php echo $row['Videos'] ?>" type="video/mp4">
	  	<source src="mov_bbb.ogg" type="video/ogg">
	  	Your browser does not support HTML5 video.
		</video><br/><br/>
		<a href="blog_detail.php?id=<?php echo $movieid ?>"><input type="button" value="Back to Movie Detail Page"></a>
	</td>
</tr>
</table>  
</body>
</html>