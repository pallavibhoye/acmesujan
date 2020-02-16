<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<title>Acme Sujan Chemicals</title>

<!-- Stylesheets -->
<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet">


<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="https://fonts.googleapis.com/css?family=Days+One&display=swap" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    

   

     <!--Page Title-->
    <section class="page-banner" style="background-image:url(<?php echo base_url() ?>assets/images/main-slider/contact-us-banner.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>News</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="home"><i class="la la-home"></i>Home</a></li>
                    <li>News</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
   <!-- News Section -->
   <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-detail">
                        <!-- News Block -->
                        <?php if(isset($singleBlog)){ ?>
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image-box wow fadeIn">
                                    <figure class="image"><img src="<?php echo base_url().'assets/blog-img/'.$singleBlog['Image'] ?>" alt=""></figure>
                                </div>
                                <div class="lower-content">
                                    <ul class="post-info">
                                       <!--  <li><span class="material-icons">event</span> March 16, 2019</li> -->
                                        <li><span class="material-icons">person</span> Name : <?php echo $singleBlog['Author'] ?></li>
                                       
                                        
                                    </ul>

                                    <h3><?php echo $singleBlog['Title'] ?></h3>
                                    <p><?php echo $singleBlog['Discription'] ?></p>

                                   

                                </div>

                            
                            </div>
                        </div>

                      <?php } ?>
                     
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                     
                        
                        <!-- Category Widget -->
                        <div class="sidebar-widget categories">
                            <h4 class="sidebar-title">Quick Links</h4>
                            <div class="widget-content">
                                <!-- Blog Category -->
                                <ul class="blog-categories">
                                    <li class="tablinks  "><a href="<?php echo base_url() ?>about"> Company Profile</a></li>
                           <li class="active" ><a href="<?php echo base_url() ?>mission">Mission & Vision</a></li>
                            <li ><a href="<?php echo base_url() ?>quality_control">Quality Control</a></li>
                       
                           
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Post Widget -->
                       

                        <!-- Tags Widget -->
                   <!--      <div class="sidebar-widget contact-widget">
                            <h4 class="sidebar-title">Get in Touch</h4>
                            <div class="widget-content">
                                <ul class="contact-list">
                                   
                                    <li><i class="material-icons">email</i> <a href="mailto:contact@industar.com">acmesujan@gmail.com</a></li>
                                    <li><i class="material-icons"></i> 703,F-Oxford, Shiv Sai Paradise Complex, Behind Fatima Church, Majiwada Thane-West 400603<br>
Dist : Thane (M.S.) India.</li>
                                    
                                </ul>
                            </div>
                        </div> -->

                    
                                         
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->

    <!--End News Section -->




   

      <!-- Main Footer -->
    <footer class="main-footer alternate" >
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
                                    <h3><a href="">We are Best For Any Industrial And Business Solution.</a></h3>
                                    <div class="post-date">March 16, 2019</div>
                                </div>
                            </div>
                            
                            <!--News Widget Block-->
                            <div class="news-widget-block">
                                <div class="widget-inner">
                                    <div class="image">
                                        <a href="#"><img src="<?php echo base_url() ?>assets/images/resource/news-thumb-2.jpg" alt="" /></a>
                                    </div>
                                    <h3><a href="">Design and Advanced Materials As a Driver of Innovation.</a></h3>
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
             </div><!----col-md-8---->
        </div>

      
        
        <!--Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text">Copyright &copy; 2019 Acme Sujan Chemicals  Designed by <a href="https://www.brandbucketsofttech.com/" target="blank" >Brand Bucket Softtech</a></div>
            </div> 
        </div>
        
    </footer>
    <!-- End Main Footer -->

</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<!--Scroll to top-->
