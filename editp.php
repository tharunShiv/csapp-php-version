<!Doctype HTML>
<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
	if($_SESSION['user_login_status']){
?>
<html>
<head>
<title>Welcome | ColSheet</title>
<link rel="stylesheet" type="text/css" href="./css/style2.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<div class="container-fluid">
		<header>


			<div class="navbar">
			<div class="name navbar-header">
							<a href="index.php" class="navbar-brand"><span style="color:black;font-size:26px;">Col</span><span style="color:#1ec87e;font-size:23px;">Sheet</span></a>
					</div>


					<form class="navbar-form  navbar-left" method="POST" action="searchresults.php">
						 <div class="form-group">
							 <input class="header-search" name="squery" type="text"  placeholder="Search yourself..."  />
						                  <input type="submit" value="Search" name="search" class="btn navbar-btn search-button-index"/>
						 <!--<input type="text" class="form-control" placeholder="Search..."/>
							<button type="submit" class="btn btn-default navbar-btn">Search</button>
							---> </div>
					</form>

	<!--
	        <div style="margin-top:2%;width:50%;display:inline-block;float:left;" class="">
	          <form method="POST" action="searchresults.php">
		<input class="header-search" name="squery" type="text" style="width:50%;" placeholder="Search yourself..."  />
	                 <input type="submit" value="Search" name="search" style="width:20%;" class="search-button-index"/><br/><br/>
	           </form>
					 </div>--->
	<div class="buttons" style="width:50%;" >

	           <form  method="post" action="home.php">
	          <button type="submit" class="btn header-buttons" style="width:70%;" name="logout">logout</button>
	    </form>




	        </div>
	        </header>
				</div>
	<hr/>


	<div class="container" style="text-align:center;">

	<div class="row">



	<div class="col-xs-12 col-sm-4 col-md-4 ">
	<aside style="border-left:1px solid #1ec87e">

    <h3 style="text-align:center;"> Welcome <span style="color:#1ec87e"><?php echo $_SESSION["username"]; ?></span></h3>

<!--<img src="image/default-profile-picture.png" alt="user image" class="profilepic">-->
<hr/>
<ul style="list-style-type:none;">
<h4>My Dashboard</h4>
<li><a href="home.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">HomePage</a></li>
<li><a href="viewp.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">view my profile</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>Co-Scholars</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none; font-size:18px;">view my co scholars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">explore co scholars</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>publications</h4>
<li><a href="mypublications.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my publications</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar publications</a></li>

</ul ><hr/>
<ul style="list-style-type:none;">
<h4>workshops</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my workshops</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar workshops</a></li>

</ul>
<hr/>
<ul style="list-style-type:none;">
<h4>seminars</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">upcomming seminars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">add my seminars</a></li>

</ul>

</aside>
</div>


<div class="col-xs-12  col-sm-4 col-md-4 ">
<section class="main-middle">
    <div class="epwrapper">
     <?php
       $username = $_SESSION['username'];
       //echo $username;
       if(!$_SESSION['scholar']){
         $q = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
         //while($row = mysqli_fetch_assoc($q)){
            $row = mysqli_fetch_assoc($q);
                // echo $row['username'];
                 if($row['image'] == ""){
                         echo "<img width='100' class='eprofilep' height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                 } else {
                    echo "<img width='100' height='100' class='eprofilep' src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                 }
                }else{
                    $q = mysqli_query($con,"SELECT * FROM usersp WHERE username='$username'");
                    //while($row = mysqli_fetch_assoc($q)){
                       $row = mysqli_fetch_assoc($q);
                           // echo $row['username'];
                            if($row['image'] == ""){
                                    echo "<img width='100' class='eprofilep' height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                            } else {
                               echo "<img width='100' height='100' class='eprofilep' src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                            }
                }
                 echo "<br>";
         //}
     ?>
     <h2 style="color:black;text-align:center">Username: <span style="color:#1ec87e;"><?php echo $_SESSION['username']; ?></span></h2>

     <h3>Change Profile Picture</h2>
     <form action="editp.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" required>
                        <button type="submit" name="submitpp">Upload Profile Picture</button>
                </form>

     <?php
       if(!$_SESSION['scholar']){
              $q= mysqli_query($con, "SELECT * FROM users");
              if($q){
                $row = mysqli_fetch_assoc($q);

              }else{
                  header("Location : editp.php?msg=database+error+123 " );
              }
       }


     ?>

</div>

</section>
</div>


<div class="col-xs-12 col-sm-4 col-md-4 " style="margin-top:15px;">
<aside class="left">
<ul style="list-style-type:none;">
<h4>most viewed publications</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">an intro to space</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">big data</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>latest publications</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">cloud computing</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">nutrition </a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<h4>editors choice</h4>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Machine Learning</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Android Is Cool</a></li>

</ul>
</aside>
</div>
</div>
</div>

<?php

    if(isset($_POST['logout'])){
		   	header("location: index.php?msg=Logged+Out+Successfully");
			       $_SESSION['user_login_status'] = false;

						// session_unset(); //unsets all variables
              //session_destroy();
    echo '<script type="application/javascript"> alert ("You have been logged out successfully"); </script>';

        session_destroy();
    }
           ?>


<!--
//ELSE REMOVED FROM here

-->
<footer style="height:100px;">
</footer>



<?php


  if(isset($_POST['submitpp'])){
    //getting info of file
    //here $_FILES is a super global variable , and the 'file' inside it
    //is the name of the file
    $file = $_FILES['file'];
     //storing the info of file in variable
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt)); //end gets the last piece of data in an array

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
      if ($fileError === 0) {
         if($fileSize < 10000000){ //100mb
            //Uploading
            //dealing with duplicates
            $fileNameNew = uniqid('', true).".".$fileActualExt; //microseconds

            $fileDestination = 'image/profilepic/'.$fileNameNew;
            //moving from temp loc to actual
            move_uploaded_file($fileTmpName, $fileDestination);

            $_SESSION['image-name']=$fileNameNew;

            if(!$_SESSION['scholar']){
            //$query = mysqli_query($con, "select ip from users");
            $q = mysqli_query($con,"UPDATE users SET image = '".$fileNameNew."' WHERE username = '".$_SESSION['username']."'");
                if($q){
                    echo "<script type='application/javascript'> alert('updated in users db success'); </script>";
                } else {
                    echo "<script type='application/javascript'> alert('Database error'); </script>";
                }
            } else {
                $q = mysqli_query($con,"UPDATE usersp SET image = '".$fileNameNew."' WHERE username = '".$_SESSION['username']."'");
                if($q){
                    echo "<script type='application/javascript'> alert('updated in usersp db success'); </script>";
                } else {
                    echo "<script type='application/javascript'> alert('Database error'); </script>";
                }

            }
            //echo "<script type='application/javascript'>alert('Profile Picture Changed Successfully')</script>";
            header("Location: editp.php?msg=update+successfull");

         } else {
           echo "<script type='application/javascript'>alert('FileSize must be below 100mb')</script>";
           header("Location: editp.php?msg=File+Size+Exceeded");
         }
      } else {
        echo "<script type='application/javascript'>alert('Error Uploading file')</script>";
          header("Location: editp.php?msg=Error+Uploading");
      }
    } else {
      echo "<script type='application/javascript'>alert('Only jpg,jpeg,png allowed')</script>";
        header("Location: editp.php?msg=Format+Unsupported");
    }
  }
?>

<?php } else{
	session_unset(); //unsets all variables
    session_destroy();
    $_SESSION['user_login_status'] = false;
	header("location: index.php?msg=Logged+Out+Successfully");
}?>

</body>
</html>


<!--




--->
