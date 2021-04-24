<?php // Do not put any HTML above this line
session_start();

require_once "pdo.php";

if ( isset($_POST['email']) && isset($_POST['phno']) && isset($_POST['name']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['phno']) < 1 || strlen($_POST['name']) < 1) {
        $_SESSION['error'] = "All fields are required";
        header("Location: doctors.php");
        return;
    }  else if (strpos($_POST['email'], "@") === false) {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: doctors.php");
        return;
    }else { 

    $stmt = $pdo->prepare('INSERT INTO doctors (name, phno, email) VALUES (  :fn, :ln, :em)');

        $stmt->execute(array(
                ':fn' => $_POST['name'],
                ':ln' => $_POST['phno'],
                ':em' => $_POST['email'])
        );
                
      
        $_SESSION['success'] = "Successfully Applied. You will be hearing from us soon.";
        header("Location: doctors.php");
        return;
      

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
      <title>Doctors</title>
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
   </head>
   <body>
      <!--header section start -->
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
                  <h2 class="about_tag">Doctors</h2>
                  <div class="about_menu">
                     <ul>
                        
                     </ul>
                  </div>
               </div>
            </div>
         <!-- banner section end -->
      </div>
      
      <!-- header section end -->
      <!-- doctor section start -->
      <div class="update_section">
         <div class="container">
            <h1 class="update_taital">Doctor's Voluntary Form </h1>
            <form method="post" >
               <div class="form-group">
                   <input class="update_mail" placeholder="Name" id="comment" name="name" required>
                   <input class="update_mail" placeholder="E-Mail" id="comment" name="email" required>
                   <input class="update_mail" placeholder="Phone Number" id="comment" name="phno" required>
               </div>
               <button type="submit" class="subscribe_bt m-auto d-block">Submit</button>
            </form>
         </div>
      </div>
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