<?php
session_start();
require_once "pdo.php";

$resources=$meds=array();
if(isset($_POST['resource']) && isset($_POST['state'])){
   if(strlen($_POST['resource'])<1 || strlen($_POST['state'])<1){}
   else{
      $stmt = $pdo->prepare('SELECT * FROM "Resources" WHERE location=:em ');
      $stmt->execute(array(':em' => $_POST['state']));
      $resources = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $stmt = $pdo->prepare('SELECT * FROM "meds" WHERE name=:em');
      $stmt->execute(array(':em' => $_POST['resource']));
      $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);

      require_once "littleApp.php";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Covid Care</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>

         .search_section{
           width: 100%;
    float: left;
    padding: 90px 0px;
    padding-top: 90px;
    padding-right: 0px;
    padding-bottom: 90px;
    padding-left: 0px;
         }
      </style>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
               <div class="main">
                  <div class="logo"><a href="index.php"><img src="logo.svg"></a></div>
                  <div class="menu_text">
                     <ul>
                        <div class="togle_">
                           <div class="menu_main">
                              <ul>
                                 <li><a href="doctors.php">Doctors</a></li>
                              </ul>
                           </div>
                        </div>
                        <div id="myNav" class="overlay">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                           <div class="overlay-content">
                              <a href="index.php">Home</a>
                              <a href="about.html">Precautions</a>
                              <a href="doctors.php">Doctors</a>
                              <a href="consult.php">Consult Doctors</a>
                              <a href="news.html">Covid Stats</a>
                           </div>
                        </div>
                        <span class="navbar-toggler-icon"></span>
                        <span onclick="openNav()"><img src="images/toogle-icon.png" class="toggle_menu"></span>
                        <span onclick="openNav()"><img src="images/toogle-icon1.png" class="toggle_menu_1"></span>
                     </ul>
                  </div>
               </div>
            </div>

      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item ">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="container">
                              <h1 class="banner_taital">Get Medical Care Online</h1>
                              <p class="banner_text">Consult doctors online on our platform. </p>
                              <div class="more_bt"><a href="consult.php">Read More</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_img"><img src="images/banner-img.png"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="container">
                              <h1 class="banner_taital">Search for Medical Resources</h1>
                              <p class="banner_text">Find sources to beds , injections and pills on our platform.</p>
                              <div class="more_bt"><a href="#covidresources">Read More</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_img"><img src="assets/undraw_medical_care_movn.svg"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="container">
                              <h1 class="banner_taital">Read about Precautionary measures.</h1>
                              <p class="banner_text">Know about covid statistics and the precautionary measures to be taken to stop covid spread.</p>
                              <div class="more_bt"><a href="about.html">Read More</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="banner_img"><img src="assets/undraw_social_distancing_2g0u.svg"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>            
      </div>
      <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- protect section start -->
      <div class="protect_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="protect_taital">How to Protect Yourself</h1>
               </div>
            </div>
            <div class="protect_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="hands_text"><a href="#">Wash your <br>hands frequently</a></h1>
                     <h1 class="hands_text_2"><a href="#">Maintain social <br>distancing</a></h1>
                     <h1 class="hands_text"><a href="#">Avoid touching eyes,<br>nose and mouth</a></h1>
                  </div>
                  <div class="col-md-6">
                     <div class="image_2"><img src="images/img-2.png"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>         <a href="about.html"><button type="submit" class="subscribe_bt m-auto d-block mb-5">Read More</button></a>

      <!-- protect section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_img"><img src="images/img-1.png"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">Coronavirus what it is?</span></h1>
                  <p class="about_text">Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment</p>
                  <div class="read_bt"><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">Read More</a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- doctor section start -->
      <div class="doctors_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="taital_main">
                     <div class="taital_left">
                        <div class="play_icon"><img src="images/play-icon.png"></div>
                     </div>
                     <div class="taital_right">
                        <h1 class="doctor_taital">What doctors say..</h1>
                        <p class="doctor_text">If COVID-19 is spreading in your community, stay safe by taking some simple precautions, such as physical distancing, wearing a mask, keeping rooms well ventilated, avoiding crowds, cleaning your hands, and coughing into a bent elbow or tissue. Check local advice where you live and work. Do it all!</p>
                        <div class="readmore_bt"><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">Read More</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<div class="search_section layout_padding" id="covidresources">
      <h1 class="protect_taital text-center mt-5">Need any kind of medical resource? Search here</h1>
   <form style="width: 80%;display: block;margin: auto;" method="post" action="results.php">
  <div class="row mb-2">
    <div class="col-12 col-md-6 pt-3">
      <input type="text" name="resource" class="form-control" placeholder="Resource Name">
    </div>
    <div class="col-12 col-md-6 pt-3">
      <input type="text" name="state" class="form-control" placeholder="State">
    </div>
  </div>
  <button type="submit" class="subscribe_bt m-auto d-block">Search</button>
</form>
<div>
</div>
  </div>

  
      <!-- doctor section end -->
      <!-- news section start -->
      <div class="news_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-item active">
                     <h1 class="news_taital">Latest News</h1>
                     <div class="news_section_2 layout_padding">
                        <div class="box_main">
                           <div class="image_1"><img src="images/news-img.png"></div>
                           <h2 class="design_text"></h2>
                           <p class="lorem_text">Coronavirus is Very dangerous. Take a look at the worldwide statistics.</p>
                           <div class="read_btn"><a href="news.html">Explore</a></div>
                        </div>
                     </div>
                  </div>
            </div>
            </div>
         </div>
      </div>

      <div class="about_section layout_padding">
         <div class="container">
            <!-- <div class="row">
               <div class="col-md-6">
                  <h1 class="about_taital" style="text-align: right;">Donations</h1>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital" style="text-align: left;">Section</h1>
               </div>
            </div> -->
            <div class="row">
               <div class="col-md-6">
                  <div class="about_img"><img src="images/blood-donation.png"></div>
               </div>
               <div class="col-md-6">
                  <h2 class="about_taital">Plasma Donataions</span></h2>
                  <p class="about_text">“A single pint can save three lives, a single gesture can create a million smiles.”</p>
                  <p class="about_text">Links -

                     <br> <a href="https://covidplasma.online/" style="color: rgb(156, 160, 221);">Covid Plasma</a>
                     <br> <a href="https://dhoondh.com/" style="color: rgb(156, 160, 221);">dhoondh.com</a>
                     <br> <a href="https://needplasma.in/" style="color: rgb(156, 160, 221);">Need Plasma</a>
                  </p>
               </div>

            </div>

         </div>
      </div>
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h2 class="about_taital">Donations for Hospitals</span></h2>
                  <p class="about_text">There is an acute shortage of Beds, Medicines, Injections and Oxygen cyclinders in hospitals. Be a part of the of the good cause, and Donate.</p>
                  <div class="read_bt"><a href="https://www.donatekart.com/">Donate</a></div>
               </div>
               <div class="col-md-6">
                  <div class="about_img"><img src="images/charity.jpg"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- news section end -->
      <!-- update section start -->
      
      <!-- update section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_section_2">
                                    <h2 class="useful_text text-center">Resources</h2>
               <div class="row">
                  <div class="col-lg-6 col-sm-6">

                     <div class="footer_menu">
                        <ul>                                                    
                           <li><a href="index.php">Home</a></li>
                           <li><a href="about.html">Precautions</a></li>
                           <li><a href="https://www.cowin.gov.in/home">Get Vaccinated</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                     <div class="footer_menu">
                        <ul>
                           <li><a href="doctors.php">Doctors</a></li>
                           <li><a href="consult.php">Consult Doctors</a></li>
                           <li><a href="news.html">Covid Stats</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->

      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
              
         $(".zoom").hover(function(){
              
         $(this).addClass('transition');
         }, function(){
              
         $(this).removeClass('transition');
         });
         });
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>  
   </body>
</html>