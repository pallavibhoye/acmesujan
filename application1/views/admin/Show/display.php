<div class="container">
<h5 class="text-secondary"><?php echo $title; ?></h5>
  <div class="card-group">

    <?php 
    if(isset($products)){
       
          foreach ($products as $row ) {
        
        
     ?>
     <div class="col-sm-4">
  <div class="card">
    <div class="card card-1">
    <img class="card-img-top" src="<?php echo base_url()."uploads/".$row['image']; ?>" alt="Card image cap" height="200" widht="200">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['author_name']; ?></h5>
      <p class="card-text"><?php echo $row['description']; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated <?php echo $row['created_at']; ?></small>
      <button class="delete btn btn-danger" data-type="SubCategory" data-id="<?php echo $row['id']; ?>">Delete </button>
 
    </div>
 
  </div>
</div>
  
  </div>
   <?php } }?>
   <?php 
    if(isset($SubCategories)){
      
          foreach ($SubCategories as $key=> $main ) {
           ?> <h6 class="text-secondary"><?php echo $key; ?></h6> 
           <div class="row w-100"><?php
            foreach ($main as $row ) {
     ?>
     <div class="col-sm-4">
  <div class="card">
    <div class="card card-1">
    <img class="card-img-top" src="<?php echo base_url()."uploads/".$row['image']; ?>" alt="Card image cap" height="200" widht="200">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['author_name']; ?></h5>
      <p class="card-text"><?php echo $row['description']; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated <?php echo $row['created_at']; ?></small>
      <button class="delete btn btn-danger" data-type="SubCategory" data-id="<?php echo $row['id']; ?>">Delete </button>
 
    </div>
 
  </div>
</div>
  
  </div>
   <?php } 
} ?> </div> 
<?php }?>
   <?php 
    if(isset($mainCategories)){

          foreach ($mainCategories as $row ) {
        
        
     ?>
     <div class="col-sm-4">
  <div class="card">
    <div class="card card-1">
     <div class="card-body">
      <h5 class="card-title"><?php echo $row['title']; ?></h5>
      <p class="card-text"><?php echo $row['description']; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Added on<?php echo $row['created_at']; ?></small>
      <button class="delete btn btn-danger" data-type="Product" data-id="<?php echo $row['id']; ?>">Delete </button>
    </div>
 
  </div>
</div>
  
  </div>
   <?php } }?>
</div>
</div>
<script>

$(".delete").click(function(){
        let id=$(this).data('id');
        let type=$(this).data('type');
      let confirmation=  confirm("Are you sure you want to delete this?")
       if(confirmation) {window.location.href="<?php echo base_url()?>Delete/"+id+"/"+type;}
    })
    </script>