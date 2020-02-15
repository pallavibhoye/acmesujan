<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from t.commonsupport.com/industar/contact by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2019 09:38:29 GMT -->
<head>
<meta charset="utf-8">
<title>Acme Sujan Chemicals</title>

<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="hover/css/hover.css" rel="stylesheet" media="all">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

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
    <div class="preloader"></div>


     <!--Page Title-->
    <section class="page-banner" style="background-image:url(<?php echo base_url() ?>assets/images/main-slider/product.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Products</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="home"><i class="la la-home"></i>Home</a></li>
                    <li>ABOUT OUR PRODUCTS</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="container"><br><br><br> 
         
        <div class="row">
            <div class="col-md-3">
                <div>
                        <ul class="tab1">
                            
                          
                            <li class="tablinks  "><i class="fa fa-angle-right"></i>&nbsp;<a href="about"> Company Profile</a></li>
                           <li ><i class="fa fa-angle-right"></i>&nbsp;<a href="mission">Mission & Vision</a></li>
                            <li class=""><i class="fa fa-angle-right"></i>&nbsp;<a href="quality_control">Quality Control</a></li>
                       
                            <li ><i class="fa fa-angle-right"></i>&nbsp;<a href="">News 1</a></li>
                            <li ><i class="fa fa-angle-right"></i>&nbsp;<a href="">News 2</a></li>
                            <li ><i class="fa fa-angle-right"></i>&nbsp;<a href="">News 3</a></li>

                        </ul>
                    </div>
            </div>

    <div class="col-md-9" id="content">
        <div class="text-center">
                            <h2 class="title1 product">About Our Products</h2><br>
                          
        </div>
         <div class="row">
         <?php
        if(isset($data)){
            foreach ($data as $key=> $main ) {
            ?>
        <div class="chembutton col-md-12">
            <div class="products dropdown">

            <?php if($main['link']!=''){ 
                 $slug=str_replace(" ","_",$main['link']);
                ?>
                <a href="<?php echo base_url() ?>product/<?php echo $slug ?>">
               <?php echo $main['title'] ?><span class="caret"></span>
            </a>
            <?php } else {?>
                <a id="dLabel" role="button" data-toggle="dropdown"  data-target="#" href="/page">
               <?php echo $main['title'] ?><span class="caret"></span>
            </a>
            <?php }?>
                <ul class="dropdown-menu multi-level sub-menu-list" role="menu" aria-labelledby="dropdownMenu">
                    <?php
                    if(isset($dropdownCategories)){
                       foreach ($dropdownCategories as $row ) {
                        $slug=str_replace(" ","_",$row['title']);
                           if($row['maincategory_id']===$main['id']){
                    ?>
                <li><a href="<?php echo base_url() ?>/sub-product/<?php echo $slug ?>"><?php echo  $row['title'] ?></a></li>
                       <?php } } } ?>
            </ul>
        </div>

        </div>
        <?php
            } } ?>
      
    

    </div>
          </div>
          </div>
          </div>




   

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

