<!DOCTYPE html>
<html>
<head>

	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

		<h3 class="text-center mt-4">Add Blog</h3>

<?php echo validation_errors(); ?>

		<div class="m-5">
		<?php echo form_open_multipart('BlogController/addBlog')   ?>

	<div class="form-group">
   
    <input type="file" class="" placeholder="Enter email" id="email" name="imgupload">
  </div>
  <div class="form-group">
    <label for="Title">Title:</label>
    <input type="text" class="form-control" placeholder="Enter Title" id="Title" name="title" >
   <!--  <p class="help-block"><?php echo form_error('title'); ?> </p> -->
  </div>
  <div class="form-group">
    <label for="Author">Author Name</label>
    <input type="text" class="form-control" placeholder="Author Name" id="Author" name="author">
  </div>
  <div class="form-group">
    <label for="pwd">Discription:</label>
  <textarea class="form-control" rows="5" id="comment" placeholder="Discription" name="discription"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
		</div>
	</div>

</body>
</html>