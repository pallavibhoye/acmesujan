<div class="container">
  <div class="card-group">
  
    
  <!-- <div class="card">
    <div class="card card-1">
    <img class="card-img-top" src="<?php echo base_url()."uploads/".$row['image']; ?>" alt="Card image cap" height="200" widht="200">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['author_name']; ?></h5>
      <p class="card-text"><?php echo $row['description']; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated <?php echo $row['created_at']; ?></small>
    </div>
 
  </div> -->
  <div class="col-sm-3">
  <div class="card">
    <div class="card card-1 p-4">
   Total Main Categories  
   <h1>
 <?php echo count($MainCats);?>
 </h1>
 <a href="<?php echo base_url('/admin/Show/MainCategories'); ?>" class="btn btn-link">Show All </a>
  </div>
</div>

  </div>

  <div class="col-sm-3">
  <div class="card">
    <div class="card card-1 p-4">
    Dropdown Categories  
   <h1>
 <?php echo count($Dropdown);?>
 </h1>
 <a href="<?php echo base_url('/admin/Show/DropDownCategories'); ?>" class="btn btn-link">Show All </a>
  </div>
</div>
  </div>

  <div class="col-sm-3">
  <div class="card">
    <div class="card card-1 p-4">
    
   Total Sub Categories  
   <h1>
 <?php echo count($SubCats);?>
 </h1>
 <a href="<?php echo base_url('/admin/Show/SubCategories'); ?>" class="btn btn-link">Show All </a>
  </div>
</div>
  
  </div>
  <div class="col-sm-3">
  <div class="card">
    <div class="card card-1 p-4">
   Total Products  
   <h1>
 <?php echo count($products);?>
 </h1>
 <a href="<?php echo base_url('/admin/Show/Products'); ?>" class="btn btn-link">Show All </a>
  </div>
</div>
  
  </div>

</div>
</div>