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
      <title>Results</title>
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
               <style>
         .cards {
  display: flex;width: 100%;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
  width: 100%;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 100%;
  }

}

@media (min-width: 56rem) {
  .cards_item {
    width: 33.3333%;
  }
}

.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  width: 100%;
}

.card_content {
  padding: 1rem;
  background-color: #923cb5;
background-image: linear-gradient(147deg, #923cb5 0%, #000000 74%);
  height: 100%;
}

.card_title {
  color: #ffffff;
  font-size: 1.1rem;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: capitalize;
  margin: 0px;
}

.card_text {
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;    
  font-weight: 400;
}
.bttn {
  color: #ffffff;
  padding: 0.8rem;
  font-size: 14px;
  text-transform: uppercase;
  border-radius: 4px;
  font-weight: 400;
  display: block;
  width: 100%;
  cursor: pointer;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: #111;
}

.bttn:hover {
  background-color: rgba(255, 255, 255, 0.12);
}
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
      </style>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section header_bg">
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
            <div class="container">
               <div class="about_taital_main">
                  <h2 class="about_tag">Results</h2>
                  <div class="about_menu">
                     <ul>
                        
                     </ul>
                  </div>
               </div>
            </div>
         <!-- banner section end -->
      </div>
      <?php
if(isset($_SESSION['success'])){
  echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
  unset($_SESSION['success']);
}
if(isset($_SESSION['error'])){
  echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
  unset($_SESSION['error']);
}
?>
      <!-- header section end -->
      <!-- doctor section start -->
     <div class="search_section layout_padding">
      <h1 class="protect_taital text-center mt-5">Need any kind of medical resource? Search here</h1>
   <form style="width: 80%;display: block;margin: auto;" method="post">
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

   <?php
   if(!sizeof($resources)==0 ||  !sizeof($meds)==0)
   echo'<h1 class="display-8 text-center mt-5">Resources</h1>';
   ?>

<div class="main mb-5">
  <ul class="cards">
  
   <?php

   foreach ($resources as $key) {
      echo '
   <li class="cards_item">
      <div class="card">
        <div class="card_content">
          <h2 class="card_title">'.$key['location'].'</h2>
          <p class="card_text">'.$key['text'].'</p>
          <a href="'.$key['link'].'"><button class="bttn card_btn">Read More</button></a>
        </div>
      </div>
    </li>';
   }

   foreach ($meds as $key) {
      echo '
   <li class="cards_item">
      <div class="card">
        <div class="card_content">
          <h2 class="card_title">'.$key['name'].'</h2>
          <p class="card_text">'.$key['text'].'</p>
          <a href="'.$key['link'].'"><button class="bttn card_btn">Read More</button></a>
        </div>
      </div>
    </li>';
   }
   echo "</ul></div>";
   if(isset($string)){
      echo'<h1 class="display-8 text-center mt-5 mb-5">Resources from Social Platforms</h1>';
   foreach($string as $items)
    {    
      echo '<iframe border=0 align="center" conversation="none" frameborder=0 style="width:100%;height:450px;" 
 src="https://twitframe.com/show?url=https://twitter.com/'.$items['user']['screen_name'].'/status/'.$items['id'].'"></iframe>';
        
    }}
   ?>
   
</div></div>
      <!-- doctor section end -->
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