<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
	$_SESSION['user_login_status'] = false;
	if(!$_SESSION['user_login_status']){
?>
<html>
<head>
<title>Welcome | ColSheet</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>


	<div class="container">
	<header>


	          <!--<img src="" alt="logo to come">
			-->

			<div class="navbar">
		  <div class="name navbar-header">
              <a href="index.php" class="navbar-brand"><span style="color:black;font-size:26px;">Col</span><span style="color:#1ec87e;font-size:23px;">Sheet</span></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a class="header-b" href="loginp.php"><button class="header-buttons btn" >Scholar Login</button></a></li>
            <li><a class="header-b"  href="logini.php"> <button class="header-buttons btn" >Institution Login</button></a></li>
          </ul>
        </div>


	</header>
</div>
	<br/>

   
   <div class="container">
    <section class="main-middle" style="margin-left:auto;margin-right:auto;display:block;width:70%;min-height:400px;">
    <?php
      echo '<h1>Search Results:</h1><br/>';
      if(isset($_POST['search'])){
       $squery = $_POST['squery'];
       
       
       $q = mysqli_query($con, "SELECT * FROM userspd WHERE username LIKE '%$squery%' OR pname LIKE '%$squery%' ");
       
       

       if($rowcheck = mysqli_fetch_assoc($q)){
            $pcomment = $rowcheck['pcomment'];
           $purl = $rowcheck['purl'];
           $ploc = $rowcheck['ploc'];
           $pname = $rowcheck['pname'];
           $username = $rowcheck['username'];

        echo '<p style="color:black;font-weight:bold;">Username: <span style="color:#1ec87e;font-weight:normal;">'.$username.'</span></p>';
           echo '<p style="color:black;font-weight:bold;">Name Of The Publication: <span style="color:#1ec87e;font-weight:normal;">'.strtoupper($pname).'</span></p>';
           echo '<p style="color:black;font-weight:bold;">Published Date: <span style="color:#1ec87e;font-weight:normal;">'.strtoupper($rowcheck['pdate']).'</span></p>';
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



    </div>

<?php
  }
?>

    </body>
</html>
