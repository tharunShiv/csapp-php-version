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
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
<section>

		<form method="post" action="regi.php">



NAME OF INSTITUTION:<br/><input type="text" class="form-control inputField" value="" name="nameI" required><br/><br/>

		                     COUNTRY:<br/><select name="country" class="form-control inputField" required>
			              		<option  value="india">INDIA</option>
			       	                  <option value="other">OTHER</option>
				       </select><br/><br/>

			          STATE:<br/><select name="state" class="form-control inputField" required>
				 	<option value="karnataka">KARNATAKA</option>
			       	                  <option value="other">OTHER</option>
			 	       </select><br/><br/>

			                CITY:<br/><select name="city" class="form-control inputField" required>
				 	<option value="bangalore">BANGALORE</option>
			       	                  <option value="other">OTHER</option>
			 	       </select><br/><br/>

               USERNAME:<br/><input type="text" class="form-control inputField" name="username" required><br/>	<br/>

                    EMAIL ID:<br/><input type="email" class="form-control inputField" name="emailid" required><br/><br/>

			            Ph.no:<br/><input type="number" class="form-control inputField" name="phoneno" required><br/><br/>

                  ENTER PASSWORD:<br/><input type="password" class="form-control inputField" name="password" required><br/><br/>

	                 CONFIRM PASSWORD:<br/><input type="password" class="form-control inputField" name="cpassword" required><br/>
		<br/>

	<input class="search-button-index" type="submit" name="submit" value="submit"><br/>


		</form>
    </section>
</div>
</div>
</div>
 <!--PHP-->
   <?php

   if(isset($_POST['submit']))
      {
		   $nameI = $_POST['nameI'];
		   $country = $_POST['country'];
		   $state = $_POST['state'];
		   $city = $_POST['city'];
		   $username = $_POST['username'];
		   $emailid = $_POST['emailid'];
		   $phoneno = $_POST['phoneno'];
           $password = $_POST['password'];
		   $cpassword = $_POST['cpassword'];


	         if($password==$cpassword)
	                 {          //to chaeck whether username exists
		                         $query = "select * from users where username='$username'";

		                          //to excecute query
	                                $query_run = mysqli_query($con,$query);
	                                  //echo mysql_num_rows($query_run);
 	                              if($query_run)
	 	                           {
			                           if(mysqli_num_rows($query_run)>0)
			                              {
				                                    echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
			                               }
			                           else
			                                 {
				                                         $query = "insert into users(nameI,country,state,city,username,emailid,phoneno,password,image) values('$nameI','$country','$state','$city','$username','$emailid','$phoneno','$password','')";
				                                         $query_run = mysqli_query($con,$query);
				                                         //to check whether it ran successfully
				                                         if($query_run)
				                                            {
					                                               echo '<script type="text/javascript">alert("User Registered.. Now you can LOG IN")</script>';
					                                                $_SESSION['username'] = $username;
					                                                //$_SESSION['password'] = $password;
					                                                 header( "Location: index.php");
				                                             }
				                                          else
				                                                {
					                                            echo '<p class="">Registration Unsuccessful due to server error. Please try later</p>';
				                                                  }
			                                }
		                        }
		                           else
		                             {
			                        echo '<script type="text/javascript">alert("DB error")</script>';
		                             }
	                             }
	                       else
	                         {
	                      	  echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
	                         }

	                     }
	             else{

	              }
				}


   ?>


</body>
</html>
