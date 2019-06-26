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
        $query=mysql_query("Delete from MovieType where MovieTypeID='".$_REQUEST['id']."'") or die("Cann't Delete");
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
        $select="SELECT * from MovieType where MovieTypeID='$id'";
        $selret=mysql_query($select);
        $selrow=mysql_fetch_array($selret);
        $MTID=$selrow['MovieTypeID'];
        $MTName=$selrow['MovieTypeName'];
    }
}
if (isset($_POST['btnupdate'])) 
{
    $updateid=$_POST['movietypeid'];
    $updatemtname=$_POST['movietypename'];

    $query="Update MovieType
            set MovieTypeID='$updateid',  MovieTypeName='$updatemtname'
            where MovieTypeID='$updateid'";
    $ret=mysql_query($query);
    if ($ret>0) 
    {
        echo "<script>window.alert('Update!')</script>";
        echo "<script>window.location='MovieType.php'</script>";
    }
    else
    {
        echo mysql_error();
    }
}

if (isset($_POST['btnreg'])) 
{
$MovieTypeID=$_POST['movietypeid'];
$MovieTypeName=$_POST['movietypename'];
if(empty($MovieTypeName))
    $msg="Please fill Movie Type Name";
    else
    {
    $select="select * from MovieType where MovieTypeName='$MovieTypeName'";
    $ret=mysql_query($select);
    $count=mysql_num_rows($ret);
    if ($count>0) 
    {
        echo'<script>wondow.alert("MovieType Already Exists!")</script>';
        echo'<script>window.location="MovieType.php"</script>';
    }
    else
    {
        $insert="INSERT INTO MovieType(MovieTypeID,MovieTypeName)
                VALUES ('$MovieTypeID' ,'$MovieTypeName')";
        $ret=mysql_query($insert);
        if($ret>0)
        {
            echo'<script>window.alert("MovieType Register Successfull!")</script>';
            echo'<script>window.location="MovieType.php"</script>';
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
    <title>Movie Type</title>
</head>
<body>
<?php require_once('Header.php'); ?>
<!-- Start Header Section -->
        <div class="page-header">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Movie Type Register </h1>
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
                        <h2>Upload The Movie Type Register</h2>
                    </div>
                </div>
            </div>
            
    <div class="row">
                <div class="col-lg-12">
                    <form action="MovieType.php" method="post" name="user" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="form-group">
                                    <input type="text" name="movietypeid" value="<?php if (isset($MTID)) 
    { echo "$MTID";} else { echo AutoID('MovieType','MovieTypeID','MT-',6);} ?>" readonly class="form-control" placeholder="Your MovieTypeID *" id="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="movietypename" value="<?php if(isset($MTName)) { echo $MTName;} ?>" class="form-control" placeholder="Your Movie Type Name *" id="phone" required data-validation-required-message="Please enter your movie type name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                                <div class="clearfix"></div>
                            <div class="col-lg-12 text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="600ms">
                                <div id="success"></div>
                                <?php 
                if (isset($MTName)) 
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
            <h1 align="center">MovieType Table</h1>
            <tr>
                <th>MovieType ID</th>
                <th>MovieType Name</th>
                <th>Action</th>
                
            <?php 
            $select="select * from MovieType";
            $ret=mysql_query($select);
            $count=mysql_num_rows($ret);
            for ($i=0; $i <$count ; $i++) 
            { 
                $data=mysql_fetch_array($ret);
                echo "<tr>";
                    echo "<td>".$data['MovieTypeID']."</td>";
                    echo "<td>".$data['MovieTypeName']."</td>";
                    echo "<td><a href='MovieType.php?mode=edit&id=".$data['MovieTypeID']."'>Edit</a>
                    <a href='MovieType.php?mode=delete&id=".$data['MovieTypeID']."'>Delete</a></td>";
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

