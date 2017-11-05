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
</head>
<body>
	<header>


		  <div class="name">
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>

          </div>
<div class="buttons">
	<input class="header-search" type="text" placeholder="Search yourself..."  />
                 <input type="submit" value="Search" class="search-button-index"/><br/><br/>
           <form  method="post" action="home.php">
          <input type="submit" class="header-buttons" name="logout"  value="LogOut" />
    </form>


        </div>
        </header>
<hr/>

<aside>

    <h3 style="text-align:center;"> Welcome <span style="color:#1ec87e"><?php echo $_SESSION["username"]; ?></span></h3>

<!--<img src="image/default-profile-picture.png" alt="user image" class="profilepic">-->
<hr/>
<ul style="list-style-type:none;">
<p>My Dashboard</p>
<li><a href="home.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">HomePage</a></li>
<li><a href="viewp.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">view my profile</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>Co-Scholars</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none; font-size:18px;">view my co scholars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">explore co scholars</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>publications</p>
<li><a href="mypublications.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my publications</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar publications</a></li>

</ul ><hr/>
<ul style="list-style-type:none;">
<p>workshops</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">my workshops</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">co scholar workshops</a></li>

</ul>
<hr/>
<ul style="list-style-type:none;">
<p>seminars</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">upcomming seminars</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">add my seminars</a></li>

</ul>

</aside>


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
     <h2 style="color:black;font-weight:bold;text-align:center">Username: <span style="color:#1ec87e;"><?php echo $_SESSION['username']; ?></span></h2>
     
     <h2>Change Profile Picture</h2>
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




<aside class="left">
<ul style="list-style-type:none;">
<p>most viewed publications</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">an intro to space</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">big data</a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>latest publications</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">cloud computing</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">nutrition </a></li>

</ul><hr/>
<ul style="list-style-type:none;">
<p>editors choice</p>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Machine Learning</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Android Is Cool</a></li>

</ul>
</aside>

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
<?php } else{
	session_unset(); //unsets all variables
    session_destroy();
    $_SESSION['user_login_status'] = false;
	header("location: index.php?msg=Logged+Out+Successfully");
}?>

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

</body>
</html>
