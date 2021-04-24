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
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
	/* Font */
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

/* Design */
*,
*::before,
*::after {
  box-sizing: border-box;
}

html {
  background-color: #ecf9ff;
}

body {
  color: #272727;
  font-family: 'Quicksand', serif;
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
  padding: 1rem;
}

.main{
  max-width: 1200px;
  margin: 0 auto;
}
a{
	text-decoration: none;
}
h1 {
    font-size: 24px;
    font-weight: 400;
    text-align: center;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
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
  background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
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
.made_by{
  font-weight: 400;
  font-size: 13px;
  margin-top: 35px;
  text-align: center;
}
	.linkplace{
		padding: 10px;
		margin-left:10px;
		margin-right: 10px; 
	}
	.btun {
		display: inline-block;
  background: #3498db;
  max-width: 300px;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
	}

.btun:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  color: #ffffff;
}
</style>
</head>
<body style="padding-top: 80px;">
	<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">
    <img src="logo.svg" style="width: 200px;height: 50px;">
  </a>      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0 d-flex">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <?php
          if(isset($_SESSION['id'])){
            echo '<li class="nav-item">
            <a class="nav-link active" href="dash.php">Dashboard</a>
          </li><li class="nav-item">
            <a class="nav-link active" href="logout.php">Logout</a>
          </li>';
          }
          else echo '<li class="nav-item">
            <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
          </li>';
          ?>       
        </ul>
      </div>
    </div>
  </nav>
</header>

	<div class="container-fluid">
		<div class="row"></div>
		<div class="col-12 col-md-6">
			<img src="assets/undraw_medical_care_movn.svg" style="width: 100%;">
		</div>
	</div>
	
	<h1 class="display-5 text-center mt-5">Need any kind of medical resource? Search here</h1>
	<form style="width: 80%;display: block;margin: auto;" method="post">
  <div class="row">
    <div class="col-12 col-md-6 pt-3">
      <input type="text" name="resource" class="form-control" placeholder="Resource Name">
    </div>
    <div class="col-12 col-md-6 pt-3">
      <input type="text" name="state" class="form-control" placeholder="State">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-2 m-auto d-block">Search</button>
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
  	
</div>
<a href="https://linktr.ee/Switchindiacovid" class="btun m-auto d-block btn mt-5">Resources from Switch India Organisation</a>
<a href="https://www.instagram.com/pandemicrelieflistindia/" class="btun m-auto d-block btn mt-5">Pandemic Relief List India</a>
You can find consolidated resources for plasma at – covidplasma.online/
https://dhoondh.com
http://needplasma.in/
<a href="https://www.donatekart.com/" class="btun m-auto d-block btn mt-5">Donate for oxygen, beds</a>
<script type="text/javascript">
	twttr.widgets.createTweet(
  "20",
  document.getElementById("tweet-container"),
  {
    theme: "dark"
  }
);
</script>
</body>
</html>