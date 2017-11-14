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
<link rel="stylesheet" type="text/css" href="./css/style2.css">
</head>
<body>


	<header>



		  <div class="name">
				  <a href="index.php" style="text-decoration:none;color:black"> <h1>Col<span style="color:#1ec87e">Sheet</span></h1></a>
				  
          </div>
<div class="buttons">

            <a class="header-b" href="index.php"><button class="header-buttons" >Login</button></a>
            <a class="header-b"  href="index.php"> <button class="header-buttons" >Create An Account</button></a>
        </div>
    </header>

    <section class="main-middle" style="margin-left:auto;margin-right:auto;display:block;width:70%;min-height:400px;">
    <?php
      echo '<h1>Search Results:</h1><br/>';
      if(isset($_POST['search'])){
       $squery = $_POST['squery'];
       
       
       $q = mysqli_query($con, "SELECT * FROM userspd WHERE username LIKE '%$squery%' OR pname LIKE '%$squery%' ");
       
       

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





<?php
  }
?>

    </body>
</html>
