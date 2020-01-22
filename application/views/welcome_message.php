<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<body class="bg-dark">
<div class="container mt-5">
    <div class="card card-login mx-auto text-center bg-dark w-50 border-danger shadow">
        <div class="card-header mx-auto bg-dark">
            <span> </span><br/>
                        <span class="logo_title mt-5 text-white"> Login Dashboard </span>
<!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body">
            <form id="logForm">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn"><span id="logText"></span>
                    
                </div>

            </form>
        </div>
    </div>
    <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                <span id="message"></span>
            </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#logText').html('Login');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Checking...');
            var url = '<?php echo base_url(); ?>';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: url + 'welcome/login',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                        $('#message').html(response.message);
                        $('#logText').html('Login');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            };
            setTimeout(login, 3000);
        });

        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
</script>

</body>
</html>