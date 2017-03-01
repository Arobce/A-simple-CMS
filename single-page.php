<?php 

require 'header.php';

if(isset($_GET['id']))
{
$id = $_GET['id'];
//Establish database connection
$dbc = mysqli_connect('localhost','root','','cms_database') or die("Error establishing connection");
//
$query = "SELECT * FROM post_table WHERE id='$id'" or die("Err querying table");

$result = mysqli_query($dbc,$query);

while ($row = mysqli_fetch_array($result)) {
	
?>

<article class="singlepage-content">
	<h2 class="singlepage-title"><?php echo $row['title']; ?></h2>
	<img src="featured_image/<?php echo $row['image_url']; ?>" class="singlepage-featuredimage">
	<p class="singlepage-p"><?php echo $row['content']; ?></p> 
	<div class="tags">Tags: <?php echo $row['tags']; ?></div>
</article>

<?php }
mysqli_close($dbc); 

}

require "footer.php"; ?>
