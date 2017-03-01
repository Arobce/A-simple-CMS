<?php

require 'header.php';
define('UPLOADPATH', 'featured_image/');
//database connection
$dbc = mysqli_connect('localhost','root','','cms_database') or die("Error connectiont to database");
//checks if session is set
if (isset($_SESSION['password']))
{
//checks if post is submited
	if(!isset($_POST['submit']))
	{
		require "template/content-form.php";
	
	}
	
	//checks if post is submited
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$bl_content = $_POST['content'];
		$fe_image = $_FILES['featured_image']['name'];
		$tag = $_POST['tags'];
		$target = UPLOADPATH.$fe_image;
		//moves uploaded file to required destination
		move_uploaded_file($_FILES['featured_image']['tmp_name'],$target) or die("CHANGE VAYENAAAAAAAAAAAAAAAa");
		
		$query = "INSERT INTO post_table (title,content,image_url,tags) VALUES ('$title','$bl_content','$fe_image','$tag')";
		$result = mysqli_query($dbc,$query) or die("Error querying database");
	}


}
else{
			echo "LOGIN PLESAE";
			mysqli_close($dbc);
}

?>

<?php
require 'footer.php';
?>