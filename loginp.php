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
						<h2>Scholar Login</h2>
		<div >
			<form method="POST" action="loginp.php">



         <div class="form-group">
				USERNAME:<input class="form-control inputField" type="text" name="username" required><br/>
				PASSWORD:<input class="form-control inputField"  type="password" name="password" required><br/><br/>
				<input  type="submit" class="btn search-button-index" value="SUBMIT" name="login" />
			</div>


            </form>
        </div>
	</section>
</div>
</div>
</div>

          <!--PHP part begins-->

	<?php
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$query = "select * from usersp where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

					$_SESSION['username'] = $username;
					//$_SESSION['password'] = $password;
				   $_SESSION['user_login_status'] = true;
				   $_SESSION['scholar'] = true;
					header( "Location: home.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists/Invalid Credentials")</script>';
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

		}

		?>






    </body>
</html>
