	<!-- content form -->
	<div class="content-form">
	<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class="content-form">
			<input type="hidden" name="MAX_FILE_SIZE" value="327680">
			<label for="title">Blog title:</label>
			<br>
			<input type="text" name="title" id="title" class="content-form-inputs">
			<br>
			<label for="content">Blog Content:</label>
			<br>
			<textarea name="content" rows="30" cols="100" id="content" class="ckeditor content-form-inputs"></textarea>
			<br>
			<label for="tags">Tags:</label>
			<br>
			<input type="text" name="tags" id="tags" class="content-form-inputs">
			<br>
			<label for="featured_image">Featured Image:</label>
			<br>
			<input type="file" id="featured_image" name="featured_image" class="content-form-inputs">	
			<br>
			<input type="submit" name="submit" value="Submit Post" class="content-form-inputs">
	</form>
	</div> <!-- content-form -->