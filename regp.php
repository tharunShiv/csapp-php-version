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
	<header>
	
		
	          
		  <div class="name">	
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>
          </div>
<div class="buttons">    
		  
            <a class="header-b" href=""><button class="header-buttons" >Scholar Login</button></a>
            <a class="header-b"  href=""> <button class="header-buttons" >Institution Login</button></a>
          
        </div>
        </header>
		<section>
		<div>
		<form method="POST" action="regp.php">
		<fieldset>
		<legend>Create Account</legend>
		NAME:<br/>
			<input type="text" class="inputField" name="name" placeholder="name"><br/><br/>
		DATE OF BIRTH:<br/>
			<input type="date"class="inputField" name="dob"><br/><br/>
		GENDER:<br/>
			<select name="gender" class="inputField">
				<option name="gender" value="male">MALE</option>
				<option name="gender"value="female">FEMALE</option>
			</select><br/><br/>
		Ph No:<br/>
			<input name="phoneno" class="inputField"type="tel"><br/><br/>
		<!--college name has to come bro i have a doubt-->
		<!--EDUCTIONAL QUALIFICATIONS:<br/>
			<input name="eq" type="text"><br/> -->
			USERNAME<br/>
			<input type="text"class="inputField" name="username"><br/><br/>
		EMAIL-ID:<br/>
			<input type="email" class="inputField"name="email"><br/><br/>
		COUNTRY:<br/>
			<select name="country" class="inputField">
				<option name="country"class="inputField" value="INDIA">INDIA</option>
				<option  name="country"class="inputField" value="other">OTHER</option>
			</select><br/><br/>
		STATE:<br/>
			<select name="state" class="inputField">	
				<option name="state" value="KARNATAKA">KARNATAKA</option>
				<option name="state" value="other">OTHER</option>
			</select><br/><br/>
		CITY:<br/>
			<select name="city" class="inputField">	
				<option name="city" value="BANGALORE">BANGALORE</option>
				<option name="city" value="other">OTHER</option>
			</select><br/><br/>
			ENTER PASSWORD:<br/><input type="password"class="inputField" name="password" ><br/><br/>
	        CONFIRM PASSWORD:<br/><input type="password"class="inputField" name="cpassword"><br/><br/>
		
		ID-No:<br/>
			<input name="id" class="inputField"type="text" ><br/><br/>
		<input type="submit" name="submit" class="search-button-index" value="SUBMIT"><br/>	

			
		</fieldset>
            </form></div>
	</section>

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
				                                         $query = "insert into usersp values('$name','$dob','$gender','$phoneno','$eq','$username','$emailid','$password','$country','$state','$city','$id')";
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