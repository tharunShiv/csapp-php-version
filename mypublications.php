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
          <input type="submit" class="header-buttons" name="logout"  value="LogOut"/>
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
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">edit my profile</a></li>
<li><a href="" style="color:#1ec87e;
    text-decoration: none;font-size:18px;">veiw my profile</a></li>

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
<li><a href="" style="color:#1ec87e;
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
          <h1 style="color:green;font-size:30px;">Your Publications</h1>
          <?php
              $username = $_SESSION['username'];
              $q = mysqli_query($con, "SELECT * FROM userspd where username='$username' ");
              $count=0;
              while($row = mysqli_fetch_assoc($q)){
                  $count++;
              }
             echo "<h3>Your Total number of publications : <span style='color:#1ec87e;font-size:25px;border:2px dotted green;border-radius:100%;padding:10px;'> ".$count."</span> and counting...</h3>";
          ?>
          <br/><br/>
          <?php
             $username = $_SESSION['username'];
             $q = mysqli_query($con, "SELECT * FROM userspd where username='$username' ");
             while($row = mysqli_fetch_assoc($q)){
                $pname = $row['pname'];
                $pdate = $row['pdate'];
                $pcomment =$row['pcomment'];
                $ploc = $row['ploc'];
                $purl = $row['purl'];
                echo '<h3 style="color:black;font-weight:bold;">Name Of The Publication: <span style="color:#1ec87e;">'.strtoupper($pname).'</span></h3>';
                echo '<h4 style="color:black;font-weight:bold;">Date Of Publication: <span style="color:#1ec87e;">'.strtoupper($pdate).'</span></h4>';
                if($pcomment){
                echo '<h4 style="color:black;font-weight:bold;">About: <span style="color:#1ec87e;">'.$pcomment.'</span></h4>';
                }
                if($ploc){
                    echo '<h4 style="color:black;font-weight:bold;">Click Here to open the File: <span style="color:#1ec87e;"><a target="_blank" href="'.$ploc.'">View The Publication</a></span></h4>';
                    }
                    if($purl){
                        echo '<h4 style="color:black;font-weight:bold;">Click Here to go to the link: <span style="color:#1ec87e;"><a target="_blank" href="'.$purl.'">View The Publication</a></span></h4>';
                        }
               echo "<br/><br/><hr style='width:60%;color:green;'>";
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
