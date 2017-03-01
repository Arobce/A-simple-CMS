<?php

require 'header.php';
if (isset($_SESSION['password'])){?>
<section class="panel-section">
	<a href="write_content.php" class="panel-link"><div class="panel create">
		<h2  class="panel-title">Create</h2 >
		<img src="images/create.png" class="panel-image">
		<p  class="panel-info">
			Here you can create your blog 
		</p>

	</div>
	</a>
	
	<a href="edit-content.php" class="panel-link"><div class="panel edit">
		<h2 class="panel-title" >Edit</h2>
		<img src="images/edit.png" class="panel-image">
		<p class="panel-info">
			Here you can edit your existing blog
		</p>
	</div>
	</a>


	<a href="delete-content.php" class="panel-link"><div class="panel delete">
		<h2 class="panel-title"> Delete </h2>
		<img src="images/delete.png" class="panel-image">
		<p class="panel-info">
			Here you can delete your existing blog
		</p>
	</div>
	</a>

</section> <!-- panel-section -->

<?php } 
else{
	function redirect($url,$statusCode=303)
	{
		header('Location: '.$url,true,$statusCode);
		die();
	}
	redirect('http://localhost:8080/Roshan_CMS/admin-login.php');

}

require 'footer.php' ?>