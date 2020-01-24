<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Acme Sujan Chemicals</title>

    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="https://fonts.googleapis.com/css?family=Days+One&display=swap" rel="stylesheet">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <style>
        table {
            border: 1px solid grey !important;
            width: 50% !important;
        }

        th,
        td {
            border: 1px solid grey !important;
        }
    </style>
</head>

<body>

    <div class="contact-main">
        <!-- Preloader -->
        <div class="preloader"></div>




        <!--Page Title-->
        <section class="page-banner" style="background-image:url(<?php echo base_url() ?>assets/images/main-slider/contact-us-banner.jpg);">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Products</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="home"><i class="la la-home"></i>Home</a></li>
                        <li>Products</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <div class="product-back">

            <div class="container">
                <div class="">
                    <h2 class="title1"><?php echo $slug;  ?></h2>
                    <br>
                    <?php
                     $pdf='';
                    if ($data) {
                       
                        foreach ($data as $key => $product) {
                            $pdf=$product['pdf_path'];
                            $slug = str_replace(" ", "_", $product['author_name']);
                    ?>
                            <div class="">
                                <div class="product">
                                    <h4>
                                        <?php echo $product['author_name']; ?>
                                    </h4>
                                    <?php if($product['image']!='default.png'){?>
                                    <img src="<?php echo base_url('/uploads/') . $product['image']; ?>" />
                                    <?php } ?>
                                    <div><?php echo $product['description']; ?></div>
                                </div>

                            </div>
                    <?php   }
                    } ?>
                    <center>

                        <a href="#" data-toggle="modal" data-target="#myModal"><button class="btn btn-danger btn-lg">MSDS</button></a>&nbsp;&nbsp;
                        <a href=""><button class="btn btn-primary btn-lg">Spec Sheet</button></a>
                    </center><br>

                </div>


            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade submit-model-box" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content -->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-body">
                        <div class="model-header">
                            <i class="icon icon-Files"></i>
                            <h3><span>Contact</span> Us</h3><br>
                        </div>
                        <div class="submit-form">
                            <form action="<?php echo base_url() ?>SubmitToGetPdf" method="post" id="SubmitToGetPdf">
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" required name="fname"  type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" required name="lname"  type="text">
                                </div>



                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone Number" required name="number"  type="number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" required name="email"  type="email">
                              <?php 
                              if($pdf=='none' || $pdf==""){
                                echo "<h6 class='my-2'>PDF is not available</h6>";
                              }
                              ?>
                                </div>






                                <div class="form-group">
                                    <button title="Submit Request" type="submit" class="send-form">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- Modal content /- -->
            </div>
        </div><!-- Modal /- -->


        <!-- Main Footer -->
        <footer class="main-footer alternate">
            <!--Widgets Section-->
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo base_url() ?>assets/images/footer-logo-new.png" class="img-responsive">
                    <div class="btn-box btn-footer "><a href="contact" class="theme-btn btn-style-one">Contact Us</a></div>
                </div>
                <div class="col-md-9">
                    <div class="widgets-section">
                        <div class="auto-container footer-second">
                            <div class="row">


                                <div class="big-column col-xl-12 col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="footer-column col-lg-2 col-md-4 col-sm-12">
                                            <div class="footer-widget links-widget">
                                                <h2 class="widget-title">Quick link</h2>
                                                <div class="widget-content">
                                                    <ul class="list">
                                                        <li><a href="about">About Us</a></li>

                                                        <li><a href="main-product">Products</a></li>
                                                        <li><a href="blog">Blog</a></li>
                                                        <li><a href="capability">capability</a></li>
                                                        <li><a href="contact">Contact Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="footer-column col-xl-5 col-lg-6 col-md-12">
                                            <div class="footer-widget post-widget">
                                                <h2 class="widget-title">Latest News</h2>

                                                <!--News Widget Block-->
                                                <div class="news-widget-block">
                                                    <div class="widget-inner">
                                                        <div class="image">
                                                            <a href="#"><img src="<?php echo base_url() ?>assets/images/resource/news-thumb-1.jpg" alt="" /></a>
                                                        </div>
                                                        <h3><a href="blog-single">We are Best For Any Industrial And Business Solution.</a></h3>
                                                        <div class="post-date">March 16, 2019</div>
                                                    </div>
                                                </div>

                                                <!--News Widget Block-->
                                                <div class="news-widget-block">
                                                    <div class="widget-inner">
                                                        <div class="image">
                                                            <a href="#"><img src="<?php echo base_url() ?>assets/images/resource/news-thumb-2.jpg" alt="" /></a>
                                                        </div>
                                                        <h3><a href="blog-single">Design and Advanced Materials As a Driver of Innovation.</a></h3>
                                                        <div class="post-date">March 16, 2019</div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>



                                        <div class="footer-column col-lg-5 col-md-4 col-sm-12">
                                            <div class="footer-widget contact-widget">
                                                <h2 class="widget-title">Contact Info</h2>
                                                <div class="widget-content">
                                                    <ul class="contact-list">
                                                        <li><i class="material-icons">place</i> 703,F-Oxford, Shiv Sai Paradise Complex, Behind Fatima Church, Majiwada Thane-West 400603
                                                            Dist : Thane (M.S.) India.</li>

                                                        <li><i class="material-icons">phone</i> <a href="tel:001-845-28386">(+91) 9423185240</a></li>
                                                        <li><i class="material-icons">email</i> <a href="mailto:info@Acme Sujan Chemicals.com">acmesujan@gmail.com</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----col-md-8---->
            </div>



            <!--Bottom-->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="copyright-text">Copyright &copy; 2019 Acme Sujan Chemicals Designed by <a href="https://www.brandbucketsofttech.com/" target="blank">Brand Bucket Softtech</a></div>
                </div>
            </div>

        </footer>
        <!-- End Main Footer -->

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <!--Scroll to top-->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#SubmitToGetPdf').bind('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(res) {
                       let response=JSON.parse(res)
                        if (response.success) {
                            var link = document.createElement('a');
                            link.href = "<?php echo base_url('/uploads/').$pdf; ?>";
                            link.download ="<?php echo $pdf; ?>"
                            link.dispatchEvent(new MouseEvent('click'));
                           
                        }
                    }
                })
            })
        })
    </script>