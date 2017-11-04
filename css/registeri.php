<!--register  for college-->

<?php
  //establish connection
	session_start();
//the config file
//establish connection
	require_once('dbconfig/config.php');
	//phpinfo();
?>


<!Doctype HTML>
<html>
<head>
<title>REGISTRATION PAGE 1(college)</title>
<link rel="stylesheet" type="text/css" href="/css/register1.css">
</head>
	<body>
<header>
<div>
<img src="" alt="logo to come">
<h1>COLSHEET</h1>
</div>
</header>
	<section>
		<div>
		<form method="POST" action="registeri.php">
		<fieldset>
		<legend>Create Account</legend>
		
		NAME OF INSTITUTION:<input type="text" value="" name="nameI"><br/>
		                     COUNTRY:<select name="country">
			              		<option  value="india">INDIA</option>
			       	                  <option value="other">OTHER</option>
				       </select><br/>
			         STATE:<select name="state">	
				 	<option value="karnataka">KARNATAKA</option>
			       	                  <option value="other">OTHER</option>
			 	       </select><br/>
			               CITY:<select name="city">	
				 	<option value="bangalore">BANGALORE</option>
			       	                  <option value="other">OTHER</option>
			 	       </select><br/>
						USERNAME:<input type="text" name="username"><br/>	
			       EMAIL ID:<input type="email" name="emailid"><br/>
			            Ph.no:<input type="number" name="phoneno"><br/>
		    ENTER PASSWORD:<input type="password" name="password" ><br/>
	                 CONFIRM PASSWORD:<input type="password" name="cpassword"><br/>
		<input type="submit" name="submit" value="SUBMIT"><br/>
		</fieldset>
		</form>
		</div>
	</section>
<footer>
	<div>
	SEARCH:<input type="text" ><br/>
	<input type="submit">
	</div>
</footer>
   
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
				                                         $query = "insert into users values('$nameI','$country','$state','$city','$username','$emailid','$phoneno','$password','')";
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
  
  

   ?>
   
   
    </body>
</html>		