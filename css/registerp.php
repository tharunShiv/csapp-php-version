<!Doctype HTML>
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
<title>REGISTRATION PAGE 2(SELF)</title>
<link rel="" type="text/css" href="">
</head>
<body>
	<header>
		<div>
		<img src="" alt="logo to come">
		<h2>COLSHEET</h2>
		</div>
	</header>

	<section>
		<div>
		<form method="POST" action="registerp.php">
		<fieldset>
		<legend>Create Account</legend>
		NAME:<br/>
			<input type="text" name="name" value="name"><br/>
		DATE OF BIRTH:<br/>
			<input type="date" name="dob"><br/>
		GENDER:<br/>
			<select name="gender">
				<option name="gender" value="male">MALE</option>
				<option name="gender" value="female">FEMALE</option>
			</select><br/>
		Ph No:<br/>
			<input name="phoneno" type="tel"><br/>
		<!--college name has to come bro i have a doubt-->
		EDUCTIONAL QUALIFICATIONS:<br/>
			<input name="eq" type="text"><br/>
			USERNAME<br/>
			<input type="text" name="username"><br/>
		EMAIL-ID:<br/>
			<input type="email" name="email"><br/>
		COUNTRY:<br/>
			<select name="country">
				<option name="country" value="INDIA">INDIA</option>
				<option  name="country" value="other">OTHER</option>
			</select><br/>
		STATE:<br/>
			<select name="state">	
				<option name="state" value="KARNATAKA">KARNATAKA</option>
				<option name="state" value="other">OTHER</option>
			</select><br/>
		CITY:<br/>
			<select name="city">	
				<option name="city" value="BANGALORE">BANGALORE</option>
				<option name="city" value="other">OTHER</option>
			</select><br/>
			ENTER PASSWORD:<input type="password" name="password" ><br/>
	                 CONFIRM PASSWORD:<input type="password" name="cpassword"><br/>
		<input type="submit" name="submit" value="SUBMIT"><br/>
		ID-No:<br/>
			<input name="id" type="text" >
			<input type="image">

			
		</fieldset>
		</form>
	</section>

	<footer>
		SEARCH:<br/>
			<input type="text" placeholder"Search For Scholar">
			<br/>
	</footer>


<!--PHP-->
<?php
        
   if(isset($_POST['submit']))
      {
		   $name= $_POST['name'];
		   $gender= $_POST['gender'];
		   $dob = $_POST['dob'];
		   $country = $_POST['country'];
		   $state = $_POST['state'];
		   $city = $_POST['city'];
		   $username = $_POST['username'];
		   $emailid = $_POST['emailid'];
		   $phoneno = $_POST['phoneno'];
		   $password = $_POST['password'];
		   $cpassword = $_POST['cpassword'];
		   $id = $_POST['id'];
		   $eq = $POST['eq'];
	  
	   
	         if($password==$cpassword)
	                 {          //to chaeck whether username exists
		                         $query = "select * from usersp where username='$username'";
		                            
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
				                                         $query = "insert into usersp values('$name','$dob','$gender','$phoneno','$eq','$username','$emailid','$password','$country','$state','$city','$id','')";
														 $query_run = mysqli_query($con,$query);
														 
				                                         //to check whether it ran successfully
				                                         if($query_run)
				                                            {
																   echo '<script type="text/javascript">
																   alert("User Registered.. Now you can LOG IN");
																   </script>';
					                                                $_SESSION['username'] = $username;
					                                                $_SESSION['password'] = $password;
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
	