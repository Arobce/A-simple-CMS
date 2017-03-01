<?php 

require 'header.php';
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
		<td><a href="delete-content.php?id=<?php echo $row['id'] ?>">Delete</a></td>
	</tr>
		<?php } ?>
</table>
</section>
<?php if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query1 = "DELETE FROM post_table WHERE id = '$id'";	
		$result = mysqli_query($dbc,$query1) or die("ERROR deleting");
		
		echo '<h2>Sucess! Check index page too see change!</h2>';
	}
	mysqli_close($dbc);

}
?>