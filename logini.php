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
		<div id="login form" >
			<form method="POST" action="logini.php">
				<fieldset>
                    <legend><b>institution Login</b></legend>
				USERNAME:<input class="inputField" type="text" name="username" required><br/><br/>
				PASSWORD:<input class="inputField"  type="password" name="password" required><br/><br/>
				<input  type="submit" class="search-button-index" value="SUBMIT" name="login" />
				
				
				</fieldset>
            </form>
        </div>
	</section>
          
          <!--PHP part begins-->
	
	<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from users where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
	
          
          
          
       
        
        
    </body>
</html>