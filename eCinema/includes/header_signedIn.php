<?php

# Access session.
session_start() ;



?>

<!doctype html>
<html lang="en">
  <head>
  <!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A37 -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2116129,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/custom.css">

    <title>eCinema</title>
  </head>
  <body>
	
   <nav class="navbar navbar-expand-lg" style= "background-color:#29665B;">
  <a class="navbar-brand" href="index.php">
    <img src="img/eCinemaLogo2.jpg" width="250" height="80" class="d-inline-block align-top" alt="">
   </a>
  <button class="navbar-toggler" style= "background-color: #29665B; border: solid 1px #59B3A2;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#59B3A2; font-size:28px; padding-top:2px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
        <a class="nav-link text-white" href="user_login.php"><?php
		# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";
		?>
		<span class="sr-only">(current)</span></a>
      </li>
	
         <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Now Showing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Coming Soon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Movie Reviews</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link text-white" href="snacks drinks.php">Snacks & Drinks</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Sign Out</a>
      </li>
	 
      <li class="nav-item ">
        <a class="nav-link text-white" href="#">Find Us</a>
      </li>
		
	</ul>
	 <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
 
  
</nav><!-- end primary navigation -->
 <nav class="navbar navbar-expand-lg" style="background-color: #59B3A2;">
   
</nav>
<div class="container">

  
 