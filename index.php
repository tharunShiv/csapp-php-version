<!Doctype HTML>

<?php
	session_start();
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
	
		
	          <!--<img src="" alt="logo to come">
			-->
		  <div class="name">	
              <h1>Col<span style="color:#1ec87e">Sheet</span></h1>
          </div>
        <div class="buttons">    
		  
            <a class="header-b" href="loginp.php"><button class="header-buttons" >Scholar Login</button></a>
            <a class="header-b"  href="logini.php"> <button class="header-buttons" >Institution Login</button></a>
          
        </div>
	</header>
   
     <div class="w3-content w3-section" style="width:100%">
  <img class="mySlides w3-animate-fade" src="image/ec1.png" style="width:100%">
  <img class="mySlides w3-animate-fade" src="image/4.png" style="width:100%">
  <img class="mySlides w3-animate-fade" src="image/3.png" style="width:100%">
  
  
</div>
     
     <section>
         <div class="middle-index">
             
             <a href="regp.php"><button class="middle-index-button" >Create an Account - Scholars</button></a>   
             
             
             <br/><a href="regi.php"><button class="middle-index-button" >Create an Account - Institution</button></a>
             
             <form>
                 <br/><br/><input type="text" placeholder="Search yourself..." class="search-index" />
                 <input type="submit" value="Search" class="search-button-index"/>
             </form>
         </div>
     </section>
   
    <section>
          <div class="container-index">
              <div class="left">
                  <a href=""><img src="image/mvp.png" class="index-bottom-image" alt="Image Loading..."/></a> 
              </div>
              <div class="middle">
                  <a href=""><img src="image/ec.png" class="index-bottom-image" alt="Image Loading..."/></a> 
              </div>
              <div class="right">
                  <a href=""><img src="image/mvpr.png" class="index-bottom-image" alt="Image Loading..."/></a> 
              </div>
          </div>        
    </section>   
   
   
   
   
   
   <!--
	<section>
		<div id="login form" >
			<form method="POST" action="index.php">
				<fieldset>
				<legend>Login</legend>
				USERNAME:<input type="text" name="username" required><br/>
				PASSWORD:<input type="password" name="password" required>
				<button  type="submit" value="SUBMIT" name="login">SUBMIT</button>
				<p ><a  href="" >Create Account</a></p>
				
				</fieldset>
            </form>
        </div>
	</section>
	
	<section>
		<div id="login form" >
			<form method="POST" action="index.php">
				<fieldset>
				<legend>Login</legend>
				USERNAME:<input type="text" name="username" required><br/>
				PASSWORD:<input type="password" name="password" required>
				<button  type="submit" value="SUBMIT" name="login1">SUBMIT</button>
				<p ><a  href="" >Create Account</a></p>
				
				</fieldset>
            </form>
        </div>
	</section>

	<footer>
	<form >
	<p>SEARCH:<input type="text"><br/><input type="submit"></p>
	</form>
	</footer>
	-->
	<script type="application/javascript">
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 7000);    
}
</script>

	<!--PHP part begins-->
	
	<!--
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
			}*/
		?>
	
	
	
	-->
	
</body>
</html>