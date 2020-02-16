<!DOCTYPE html>
<html>
<head>

	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

		<h3 class="text-center mt-4">Edit Blog</h3>


		<div class="m-5">
		<?php echo form_open_multipart('admin/editBlog/'.$blog["Blog-id"]) ?>

	<div class="form-group">
   
    <input type="file" class="" placeholder="Enter email" id="email">
    <img src="<?php echo base_url().'assets/blog-img/'.$blog['Image'] ?>" style="width: 20%" class="img-responsive">
  </div>
  <div class="form-group">
    <label for="Title">Title:</label>
    <input type="text" class="form-control" placeholder="Enter email" id="Title" name="title" value="<?php echo $blog['Title']; ?>">
   <!--  <p class="help-block"><?php echo form_error('title'); ?> </p> -->
  </div>
  <div class="form-group">
    <label for="Author">Author Name</label>
    <input type="text" class="form-control" value="<?php echo $blog['Author']; ?>" placeholder="Author Name" id="Author" name="author">
  </div>
  <div class="form-group">
    <label for="pwd">Discription:</label>
  <textarea class="form-control" rows="5" id="comment" placeholder="Discription" name="discription" ><?php echo $blog['Discription']; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
		</div>
	</div>

</body>
</html>