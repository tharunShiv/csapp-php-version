<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<html>
<head>
<title>Welcome | ColSheet</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<script>
    alert ("Login Successful");
    </script>
    
	<header >
            <div class="name">	
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>
          </div>
<div class="buttons">  
         <form  method="post" action="homepage.php">  
          <input type="submit" class="header-buttons" name="logout"  value="LogOut"/>
    </form>
        </div>
        </header>
         
           <?php
    
    if(isset($_POST['logout'])){
              session_destroy();
        echo '<script type="application/javascript"> alert ("You have been logged out successfully"); </script>';
        header( "Location: index.php");
              
    }
           ?>
  
    