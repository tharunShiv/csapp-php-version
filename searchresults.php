<!Doctype HTML>
<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
	if(isset($_SESSION['user_login_status'])){
?>
<html>
<head>
<title>Welcome | ColSheet</title>
<link rel="stylesheet" type="text/css" href="./css/style2.css?v=5">
</head>
<body>
<header>


		  <div class="name">
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>

          </div>
        <div style="margin-top:2%;width:50%;display:inline-block;float:left;" class="">
          <form method="POST" action="searchresults.php">
	<input class="header-search" name="squery" type="text" style="width:50%;" placeholder="Search yourself..."  />
                 <input type="submit" value="Search" name="search" style="width:20%;" class="search-button-index"/><br/><br/>
           </form>
           </div>
<div class="buttons" style="width:30%;" >
  
           <form  method="post" action="home.php">
          <button type="submit" class="header-buttons" style="width:70%;" name="logout">logout</button>
    </form>




        </div>
        </header>
<hr/>

<aside>

    <h3 style="text-align:center;"> Welcome <span style="color:#1ec87e"><?php echo $_SESSION["username"]; ?></span></h3>

<!--<img src="image/default-profile-picture.png" alt="user image" class="profilepic">-->

<?php
    if(!$_SESSION['scholar']){
       $username = $_SESSION['username'];
       //echo $username;
         $q = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
         //while($row = mysqli_fetch_assoc($q)){
            $row = mysqli_fetch_assoc($q);
                // echo $row['username'];
                 if($row['image'] == ""){
                         echo "<img width='100' class='profilepic'  height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                 } else {
                    echo "<img width='100' height='100' class='profilepic'  src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                 }
                 echo "<br>";
         //}
                }else{
                    $username = $_SESSION['username'];
                    //echo $username;
                      $q = mysqli_query($con,"SELECT * FROM usersp WHERE username='$username'");
                      //while($row = mysqli_fetch_assoc($q)){
                         $row = mysqli_fetch_assoc($q);
                             // echo $row['username'];
                              if($row['image'] == ""){
                                      echo "<img width='100' class='profilepic'  height='100' src='image/default-profile-picture.png' alt='Default Profile Pic'>";
                              } else {
                                 echo "<img width='100' height='100' class='profilepic'  src='image/profilepic/".$row['image']."' alt='Profile Pic'>";
                              }
                              echo "<br>";
                      //}

                }
     ?>

<hr/>
<ul style="list-style-type:none;">
<p>My Dashboard</p>
<li><a href="home.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">Home</a></li>
<li><a href="editp.php" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">edit my profile</a></li>
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
    <?php
      if(isset($_POST['search'])){
       $squery = $_POST['squery'];
       

       $q = mysqli_query($con, "SELECT * FROM userspd WHERE username LIKE '%$squery%' OR pname LIKE '%$squery%' ");
       echo '<h1>Search Results:</h1><br/>';

       if($rowcheck = mysqli_fetch_assoc($q)){
       
       
       while( $row = mysqli_fetch_assoc($q)){
           $pcomment = $row['pcomment'];
           $purl = $row['purl'];
           $ploc = $row['ploc'];
           $pname = $row['pname'];
           $username = $row['username'];
 
        echo '<p style="color:black;font-weight:bold;">Username: <span style="color:#1ec87e;font-weight:normal;">'.$username.'</span></p>';
           echo '<p style="color:black;font-weight:bold;">Name Of The Publication: <span style="color:#1ec87e;font-weight:normal;">'.strtoupper($pname).'</span></p>';
           echo '<p style="color:black;font-weight:bold;">Published Date: <span style="color:#1ec87e;font-weight:normal;">'.strtoupper($row['pdate']).'</span></p>';
           if($pcomment){
            echo '<p style="color:black;font-weight:bold;">About: <span style="color:#1ec87e;font-weight:normal;">'.$pcomment.'</span></p>';
            }
            if($ploc){
                echo '<p style="color:black;font-weight:bold;">Click Here to open the File: <span style="color:#1ec87e;font-weight:normal;"><a target="_blank" href="'.$ploc.'">View The Publication</a></span></p>';
                }
                if($purl){
                    echo '<p style="color:black;font-weight:bold;">Click Here to go to the link: <span style="color:#1ec87e;font-weight:normal;"><a target="_blank" href="'.$purl.'">View The Publication</a></span></p>';
                    }
           echo "<br/><br/><hr style='width:60%;color:green;'>";
       }
       
    } else {
      echo '<p>No Results Found, try using another keyword</p><br/>';
    }
    }
    ?>
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
	header("location: index.php?msg=Logged+Out+Successfully");
}?>

</body>
</html>
