
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p class="heading-4">Update <?php echo $title; ?>.</p>
                </div>
                <div class="form-content">
                    <?php echo form_open_multipart('MainController/update/'.$type.'/'.$id); ?>
                    <div class="row">
                        <?php if($type === 'MainCategories'){
                             $data = $data[0]; ?>
                        
                        <div class="col-md-6">
                               
                            <div class="form-group">
                                 <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $data['title'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description(optional)</label>
                                <textarea class="form-control" name="description" placeholder="description"><?php echo $data['description'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                        <?php } 

                        #DropDown
                        if($type === 'DropDownCategories'){
                            $data = $data[0];
                        ?>
                        <div class="col-md-6">
                        <div class="form-group">
                                 <label>Select Main Category</label>
                               <select name="maincategory_id" class="form-control">
                                   <?php foreach($mainCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?>"
                                    <?php echo $cat['id']===$data['maincategory_id']?'selected':'';?>
                                    ><?php echo $cat['title']; ?></option>
                                   <?php } ?>
                               </select>
                            </div>

                            <div class="form-group">
                                 <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" 
                                value="<?php echo $data['title'] ?>"/>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                        <?php }

                        if($type === 'SubCategories'){
                            $data = $data[0]; ?>
                        <div class="container register-form">
            <div class="form">
               
                <div class="form-content">
                    <div class="row">
                        
                        <div class="col-md-6">
                      
                                 <!-- <div class="form-group">
                                    <label for="files" class="border p-4">
                                        <span class="fa fa-camera fa-3x"></span>
                                    </label>
                                <input type="file" id="files" class="form-control d-none" name="image" onchange="readURL(this);"  />

                            </div> -->
                         
                            <div class="form-group">
                                 <label>Select Main Category</label>
                               <select name="maincategory_id" class="form-control" 
                               id="maincategory_id" required>
                                   <option value=""> select one </option>
                                   <?php foreach($mainCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?>"
                                    <?php echo $cat['id']===$idForDropdown?'selected':'';?>
                                    ><?php echo $cat['title']; ?></option>
                                   <?php } ?>
                               </select>
                            </div>
                            <?php if(isset($dropDownCategories)) {  ?>
                             <div class="form-group">
                                 <label>Select Dropdown Category</label>
                               <select name="dropdown_id" class="form-control" required>
                                   <option value=""> select one </option>
                                   <?php foreach($dropDownCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?>"
                                    <?php echo $cat['id']===$data['dropdown_id']?'selected':'';?>
                                    >
                                    <?php echo $cat['title']; ?>
                                </option>
                                   <?php } ?>
                               </select>
                            </div>
                                   <?php } ?>
                            <div class="form-group">
                                 <label>Product name</label>
                                <input type="text" class="form-control" placeholder="Title" name="author_name" value="<?php echo $data['author_name'] ?>"/>
                            </div>
                            <div class="form-group">
                                 <label>CAS</label>
                                <input type="text" class="form-control" placeholder="cas" name="cas" value="<?php echo $data['cas'] ?>"/>
                            </div>
                            <div class="form-group">
                                 <label>Abbreviation</label>
                                <input type="text" class="form-control" placeholder="Abbreviation" name="abbr" value="<?php echo $data['abbr'] ?>"/>
                            </div>
                            <div class="form-group">
                                 <label>HSN Code</label>
                                <input type="text" class="form-control" placeholder="HSN code" name="hsn" value="<?php echo $data['hsn'] ?>"/>
                            </div>
                            <!-- <div class="form-group">
                                <label>Description(optional)</label>
                                <textarea class="form-control" name="description" placeholder="description"></textarea>
                            </div> -->

                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                       
                        
                    </div>
               
                </div>
            </div>
        </div>
        <script type="text/javascript">  
              CKEDITOR.replace( 'description' );
            function readURL(input) {
      
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#output')
                    .attr('src', e.target.result)
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#maincategory_id").change(function(){
        let edit_id = <?php echo $data['id']; ?>;
        let id=$(this).val();
        window.location.href="<?php echo base_url()?>admin/Edit/"+edit_id+"/SubCategories/"+id;
    })
    </script>

                    <?php    } 
                    
                    
                    if($type === 'Products'){
                        $data =$data[0];
                        ?>
        
                        <div class="col-md-6">
                               
                            <div class="form-group">
                                 <label>Select Main Category</label>
                               <select name="maincategory_id" class="form-control" 
                               id="maincategory_id" >
                                   <option value=""> select one </option>
                                   <?php foreach($mainCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?> "
                                    <?php echo $cat['id']===$data['maincategory_id']?'selected':'';?>
                                    >
                                    <?php echo $cat['title']; ?>
                                </option>
                                   <?php } ?>
                               </select>
                            </div>
                          <div class="form-group" id="dropdownCategory"></div>
                          <div class="form-group" id="subCategory"></div>
                            <div class="form-group">
                                 <label>Product name</label>
                                <input type="text" class="form-control" placeholder="Title" name="author_name" value="<?php echo $data['author_name'];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description(optional)</label>
                                <textarea class="form-control" name="description" placeholder="description"><?php echo $data['description'];?></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="files">
                                        Upload Image <small>(optional)</small>
                                    </label>
                                <input type="file" id="files" class="form-control " name="image" onchange="readURL(this);"  />
                                    <?php 
                                    if($data['image']!=='default.png'){
                                        ?>
                                    <img src = "<?php echo base_url('/uploads/'.$data['image']) ?>" width="200"/>
                                        <?php
                                    }
                                    ?>
                            </div>
                            <div class="form-group">
                                    <label for="files">
                                        Upload PDF <small>(optional)</small>
                                    </label>
                                <input type="file" id="files" class="form-control " name="pdf" onchange="readURL(this);"  />
                                <?php 
                                    if($data['pdf_path']!=='none'){
                                        ?>
                                    <a href = "<?php echo base_url('/uploads/'.$data['pdf_path']) ?>" > file </a>
                                        <?php
                                    } else { echo "file not available" ;}
                                    ?>
                            </div>

                            <div class="form-group d-flex">
                           
                                <label for="isChecked">
                                      Check to show on home page <small>(optional)</small>-
                                    </label>
                                    <input type="checkbox"  id="isChecked" style="width:20px;height:20px" name="isChecked" 
                                    <?php echo $data['isChecked']==1?'checked':''; ?>  />

                            </div>

                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                     
        <script type="text/javascript">  
              CKEDITOR.replace( 'description' );
            function readURL(input) {
      
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#output')
                    .attr('src', e.target.result)
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#maincategory_id").on('change , mouseover', function(){
        let id=$(this).val();
       $.ajax({
           url:'<?php echo base_url() ?>admin/getAllOptions',
           type:'post',
           data:{id:id,type:'dropdownCategory'},
           success:function(res){
             
         
               let response=JSON.parse(res)
            if(response.options.length > 0){
              //  console.log(res);
              let htmlData=` <label>Select Dropdown Category</label>
                               <select name="dropdown_id" class="form-control" 
                               id="dropdown_id" >
                                   <option value=""> select one </option>`
                                   for (let index = 0; index < response.options.length; index++) {
                                    htmlData+=` <option value="${response.options[index].id}">
                                    ${response.options[index].title}
                                        </option>`
                                       
                                   }
                                 
                                   htmlData+='</select>'        
                                   $('#dropdownCategory').html(htmlData);
                                
                                       }else {
                                        $('#dropdownCategory').html("<h4>No DropDown Category Found </h4>");
                                   }
           
            
           }
           
       })
    })

    $(document).delegate("#dropdown_id","change",function(){
        let id=$(this).val();
       $.ajax({
           url:'<?php echo base_url() ?>admin/getAllOptions',
           type:'post',
           data:{id:id,type:'subCategory'},
           success:function(res){
             
         
               let response=JSON.parse(res)
            if(response.options.length > 0){
                console.log(res);
              
              let htmlData=` <label>Select Sub Category</label>
                               <select name="main_cat" class="form-control" 
                               id="main_cat" >
                                   <option value=""> select one </option>`
                                   for (let index = 0; index < response.options.length; index++) {
                                    htmlData+=` <option value="${response.options[index].id}">
                                    ${response.options[index].author_name}
                                        </option>`
                                       
                                   }
                                 
                                   htmlData+='</select>'        
                                   $('#subCategory').html(htmlData);
                                  
                                       }else {
                                        $('#subCategory').html("<h4>No sub Category Found </h4>");
                                   }
           
            
           }
           
       })
    })
    </script>
                    
                    
                    
                    <?php } ?>

                    </div>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
      