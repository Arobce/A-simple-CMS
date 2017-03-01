<?php

echo '<link rel="stylesheet" href="css/style.css">';
session_start();

if(!isset($_POST['submit']))
{
?>
<section class="user-login">
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
if(isset($_POST['submit'])){
	$dbc = mysqli_connect('localhost','root','','cms_database') or die("Error connectiong to database");
	$query = "SELECT * FROM user_login";
	$result = mysqli_query($dbc,$query) or die("Error querying");

	while ($row = mysqli_fetch_array($result)){
		if ($_POST['username'] === $row['user_name'] && $_POST['password'] === $row['password'] ){
			$_SESSION["username"] = $row['user_name'];
			$_SESSION["password"] = $row['password'];
			function redirect($url, $statusCode = 303)
			{
			   header('Location: ' . $url, true, $statusCode);
			   die();
			}
			redirect("admin-panel.php");
		}

	}
	mysqli_close($dbc);
}
?>

