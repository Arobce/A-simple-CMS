<?php

require 'header.php';
if($_SESSION["username"])
{
		if(!isset($_POST['submit']))
		{
?>

			<section class="user-login">
			<h3> Add admin </h3>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<label for="username">Username: </label>
			<br>
			<input type="text" name="username" id="username">
			<br>
			<label for="password">Password: </label>
			<br>
			<input type="password" name="password" id="password">
			<br>
			<input type="submit" name="submit" value="Submit">
			</form>
			</section>
	<?php } 

		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$dbc = mysqli_connect('localhost','root','','cms_database') or die("err connecting");
			$query = "INSERT INTO user_login (user_name,password) VALUES('$username','$password')";
			$result = mysqli_query($dbc,$query);
			function redirect($url,$statusCode = 303)
			{
				header('Location: '.$url,true,$statusCode);
				die();
			}
			redirect('index.php');
			mysqli_close($dbc);
		}			
 } ?>