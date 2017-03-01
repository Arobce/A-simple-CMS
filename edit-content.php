<?php require 'header.php'; 

define('UPLOADPATH', 'featured_image/');
if(isset($_SESSION['password'])) {
$dbc = mysqli_connect('localhost','root','','cms_database') or die("Error: ".mysql_error());
$query = "SELECT * FROM post_table";
$result = mysqli_query($dbc,$query);

?>

<section class="edit-section">
<table>
	<tr>
		<th>Blog Title</th>
		<th>Blog Content</th>
		<th>Action</th>
	</tr>
	
		<?php while($row = mysqli_fetch_array($result))
		{
			$string = strip_tags($row['content']);
			if(strlen($string)>100)
			{
				$stringCut = substr($string,0,100);

				$string = substr($stringCut, 0, strrpos($stringCut, ' '));
			}
		?>
	<tr>
		<td><?php echo $row['title']; ?></td>
		<td><?php echo $string; ?> </td>
		<td><a href="edit-content.php?id=<?php echo $row['id'] ?>">Edit</a></td>
	</tr>
		<?php } ?>
</table>
</section>
<?php
	if(isset($_GET['id'])){
		if(!isset($_POST['submit']))
		{ 
			$id = $_GET['id'];
			$query1 = "SELECT * FROM post_table WHERE id=".$id;
			$result1 = mysqli_query($dbc,$query1) or die("Error querying"); 
			$rows = mysqli_fetch_array($result1);
			
			?>
			<!-- content form -->
	<div class="content-form">
	<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class="content-form">
			<input type="hidden" name="MAX_FILE_SIZE" value="327680">
			<label for="title">Blog title:</label>
			<br>
			<input type="text" name="title" id="title" class="content-form-inputs" value="<?php echo $rows['title']; ?>">
			<br>
			<label for="content">Blog Content:</label>
			<br>
			<textarea name="content" rows="30" cols="100" id="content" class="ckeditor content-form-inputs">
			<?php echo $rows['content']; ?></textarea>
			<br>
			<label for="tags">Tags:</label>
			<br>
			<input type="text" name="tags" id="tags" class="content-form-inputs" value="<?php echo $rows['tags']; ?>">
			<br>
			<label for="featured_image">Featured Image:</label>
			<br>
			<input type="file" id="featured_image" name="featured_image" class="content-form-inputs">
			<input type="hidden" name="id" id="id" value="<?php echo $rows['id']; ?>">
			<br>
			<input type="submit" name="submit" value="Submit Post" class="content-form-inputs">
	</form>
	</div> <!-- content-form -->

<?php 		}
	}
		if(isset($_POST['submit']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$tags = $_POST['tags'];
			$url = $_FILES['featured_image']['name'];
			$id = $_POST['id'];
			$target = UPLOADPATH.$url;
			//moves uploaded file to required destination
			move_uploaded_file($_FILES['featured_image']['tmp_name'],$target) or die("CHANGE VAYENAAAAAAAAAAAAAAAa");
		
			$query2 = "UPDATE post_table SET title='$title',content='$content',tags='$tags',image_url='$url' WHERE id='$id'";
			
			$rs = mysqli_query($dbc,$query2) or die("ERR updating");

			echo '<h2>Sucess! Check index page too see change!</h2>';		}
			mysqli_close($dbc);
	}
?>