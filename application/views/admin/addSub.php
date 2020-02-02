
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p class="heading-4">Add  product.</p>
                </div>

                <div class="form-content">
                    <?php echo form_open_multipart('admin/addSub'); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                               
                            <div class="form-group">
                                 <label>Select Main Category</label>
                               <select name="maincategory_id" class="form-control" 
                               id="maincategory_id" >
                                   <option value=""> select one </option>
                                   <?php foreach($mainCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?> ">
                                    <?php echo $cat['title']; ?>
                                </option>
                                   <?php } ?>
                               </select>
                            </div>
                          <div class="form-group" id="dropdownCategory"></div>
                          <div class="form-group" id="subCategory"></div>
                            <div class="form-group">
                                 <label>Product name</label>
                                <input type="text" class="form-control" placeholder="Title" name="author_name" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Description(optional)</label>
                                <textarea class="form-control" name="description" placeholder="description"></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="files">
                                        Upload Image <small>(optional)</small>
                                    </label>
                                <input type="file" id="files" class="form-control " name="image" onchange="readURL(this);"  />

                            </div>
                            <div class="form-group">
                                    <label for="files">
                                        Upload PDF <small>(optional)</small>
                                    </label>
                                <input type="file" id="files" class="form-control " name="pdf" onchange="readURL(this);"  />

                            </div>

                            <div class="form-group d-flex">
                           
                                <label for="isChecked">
                                      Check to show on home page <small>(optional)</small>-
                                    </label>
                                    <input type="checkbox"  id="isChecked" style="width:20px;height:20px" name="isChecked"   />

                            </div>

                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="" id="output" alt="" class="img-fluid w-100">
                          
                        </div>
                        
                    </div>
                  <?php echo form_close(); ?>
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