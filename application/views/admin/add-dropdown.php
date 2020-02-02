
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p class="heading-4">Add Dropdown Category.</p>
                </div>

                <div class="form-content">
                    <?php echo form_open_multipart('Welcome/addDropdown'); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                                 <label>Select Main Category</label>
                               <select name="maincategory_id" class="form-control">
                                   <option value=""> select one </option>
                                   <?php foreach($mainCategories as $cat){?>
                                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
                                   <?php } ?>
                               </select>
                            </div>

                            <div class="form-group">
                                 <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value=""/>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btnSubmit" >Submit</button>

                            </div>
                        </div>
                       
                        
                    </div>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
      