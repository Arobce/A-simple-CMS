<?php

require 'header.php';

//Establish database connection
$dbc = mysqli_connect('localhost','root','','cms_database') or die("Error establishing connection");
//
$query = "SELECT * FROM post_table" or die("Err querying table");

$result = mysqli_query($dbc,$query);

while ($row = mysqli_fetch_array($result)) {
	
?>
<a href="single-page.php?id=<?php echo $row['id']; ?>"><article class="blog-content">
<h2 class="content-title"><?php echo $row['title']; ?></h2>
<img src="featured_image/<?php echo $row['image_url']; ?>" class="content-featuredimage">
 
</article></a>

<?php } 
mysqli_close($dbc);
require 'footer.php';
?>

