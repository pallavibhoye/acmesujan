
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p class="heading-4">Add Main Category.</p>
                </div>

                <div class="form-content">
                    <?php echo form_open_multipart('admin/MainController/addMain'); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                               
                            <div class="form-group">
                                 <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Description(optional)</label>
                                <textarea class="form-control" name="description" placeholder="description"></textarea>
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
      