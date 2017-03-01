<?php require 'header.php';


$searchString = $_GET['Search-input'];

$dbc = mysqli_connect('localhost','root','','cms_database') or die("ERR connecting");

$query = "SELECT * FROM post_table WHERE tags='$searchString'";
$result = mysqli_query($dbc,$query) or die("ERRER querying");
while($row = mysqli_fetch_array($result))
{
	$string = strip_tags($row['content']);
			if(strlen($string)>200)
			{
				$stringCut = substr($string,0,200);

				$string = substr($stringCut, 0, strrpos($stringCut, ' '));
			}
?>
	<a href="single-page.php?id=<?php echo $row['id'] ?>" class="search"><article class="search-content">
		<h2 class="search-result"><?php echo $row['title']?></h2>
		<p class="search-post"><?php echo $string; ?> </p>
	</article></a>

<?php }
mysqli_close($dbc); ?>