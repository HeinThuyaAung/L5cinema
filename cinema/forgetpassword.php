<?php 
session_start();
require_once('Connect.php');

if(isset($_POST['btnsubmit']))
{
	$name=$_POST['name'];
	$ph=$_POST['ph'];
	$email=$_POST['email'];
	$npassword=$_POST['npassword'];
	
	$check="SELECT * FROM customer
			WHERE CustomerName='$name' 
			AND Phone='$ph'
			AND Email='$email'";
	$ret=mysql_query($check);
	$num_ret=mysql_num_rows($ret);
	
	if($num_ret>0)
	{
		$edit="UPDATE customer
				SET Password='$npassword'
				WHERE Email='$email'
				AND Phone='$ph'";
		$ret=mysql_query($edit);
		
		if($num_ret>0)
		{
			echo "<script>window.alert('Succeed')</script>";
			echo "<script>window.location='Login.php'</script>";
		}
	}
	else if($num_ret<=0)
	{
		echo "<script>window.alert('Invalid')</script>";
		echo "<script>window.location='forgetpassword.php'</script>";
	}
	else{}
}

?>

<script>
function myFunction() {
    var npassword = prompt("Please enter your password", "Remember Password");
    if (npassword != null) {
        document.getElementById("demo").innerHTML =
        "<input type='hidden'  value='" + npassword + "' name='npassword'/>";
    }
}
</script>

<form action="forgetpassword.php" method="post">
<table align="center">
<p id="demo"></p>
<tr>
	<th colspan="2" height="40">To get password, ask you about your information.</th>
</tr>
<tr>
	<td height="40">Your Name</td>
    <td><input type="text" name="name" required></td>
</tr>
<tr>
	<td height="40">Phone Number</td>
    <td><input type="text" name="ph" required></td>
</tr>
<tr>
	<td height="40">Email</td>
    <td><input type="email" name="email" required></td>
</tr>
<tr>
	<td><input type="submit" name="btnsubmit" value="Submit" onclick="myFunction()"></td>
    <td><input type="reset" name="btncancle" value="Cancle"></td>
</tr>
</table>
</form>
