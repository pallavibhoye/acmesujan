<!DOCTYPE html>
<html>
<head>

	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<a href="<?php echo base_url() ?>admin/addBlog" class="btn btn-danger float-right mt-5">Add Blog</a>
<?php echo br(5); ?>
	</div>

	<div class="container">

		<div class="table-responsive " >
			<table class="table table-striped table-bordered">
				<tr>
					<th>Blog ID</th>
					<th>Image</th>
					<th>Title</th>
					<th>Discription</th>
					<th>Author</th>
					<th>Action</th>
				</tr>
				<?php if (!empty($blog)) {
					foreach ($blog as $blogtp ) { 
						
					
				 ?>
				<tr>
					<td> <?php echo $blogtp['Blog-id']  ?> </td>
					<td style="width: 30%"><img src="<?php echo base_url().'assets/blog-img/'.$blogtp['Image'] ?>"  style="width: 30%"></td>
					<td><?php echo $blogtp['Title']  ?></td>
					<td><?php echo $blogtp['Discription']  ?></td> 
					<td><?php echo $blogtp['Author']  ?></td>
					<td>
						<a href="<?php echo base_url() ?>admin/editBlog/<?php echo $blogtp['Blog-id'] ?>" class="btn btn-primary ">Edit</a>
						<a href="#" onClick="deleteID(<?php echo  $blogtp['Blog-id'] ?> )"  class="btn btn-danger ">Delete </a>

						<script type="text/javascript">
							function deleteID(id){ 
								//alert();
								var checkToDelete = confirm("Are you sure you want to delete this");
								if(checkToDelete){
									window.location.href = '<?php echo base_url() ?>BlogController/deleteBlog/'+id;
								}
							}
						</script>

					</td>
				</tr>
				<?php
			        }
		         }
				 ?>
			</table>
		</div>
		
	</div>

</body>
</html>