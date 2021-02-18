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



	<?php # DISPLAY COMPLETE REGISTRATION PAGE.


  #require ('includes/header_reg.html');

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('includes/connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php" style="color:#285873">Login</a>' ;
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '
		
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
        <a class="nav-link text-white" href="now_showing.php">Now Showing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Coming Soon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="review.php">Movie Reviews</a>
      </li>
	 
      <li class="nav-item ">
        <a class="nav-link text-white" href="#">Find Us</a>
      </li>
	  
  
	
	</ul>
	
  </div>
  
  
</nav><!-- end primary navigation -->
	<h1 class="text-center display-4"style="color:#285873" Registered!</h1><p>You are now registered.</p><p><a href="login.php"  style="color:#285873">Login</a></p>
	

'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="container">
			<div class="alert alert-primary alert-dismissible fade show" style="background-color: #59B3A2;"role="alert">
			<h1>Error!</h1>
			<p id="err_msg" style="color: #FFFFFF;">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<hr>
			<p class="mb-0" style="color: #FFFFFF;">Please try again.</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		   </div>
		  </div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>  
  <nav class="navbar navbar-expand-lg" style= "background-color:#29665B;">
  <a class="navbar-brand" href="index.php">
    <img src="img/eCinemaLogo2.jpg" width="250" height="80" class="d-inline-block align-top" alt=""href="index.php">
   </a>
  <button class="navbar-toggler" style= "background-color: #29665B; border: solid 1px #59B3A2;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#59B3A2; font-size:28px; padding-top:2px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
    <ul class="navbar-nav mr-auto">
	
         <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Now Showing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="commingSoon.php">Coming Soon</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link text-white" href="snacks drinks.php">Snacks & Drinks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="reviews.php">Movie Reviews</a>
      </li>
	 
      <li class="nav-item ">
        <a class="nav-link text-white" href="#">Find Us</a>
      </li>
	   <li class="nav-item ">
	   <button type="button" class="btn text-dark font-weight-bold" data-toggle="modal" data-target="#register"style="color:#285873">Register Now</button>	
      </li>

	
	</ul>

  </div>
  			<nav class="navbar navbar-light ">
	 <div class="row">
		<form class="form-inline"action="login_action.php" method="post" >
			<div class="input-group">
			<input class="form-control mr-sm-2" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required >
			<input class="form-control mr-sm-2" type="password" placeholder="Password" name="pass" required>
			<button class="btn btn-outline-success my-2 my-sm-0 background-color: #29665B;" type="submit">Login</button>
			</div>
		</form>
		</div>
	</nav>
  
</nav><!-- end primary navigation -->

  
 <nav class="navbar navbar-expand-lg" style="background-color: #59B3A2;">
   
</nav>
 
<div class="container">
  <!-- Content here -->
  <h1 class="text-center"style="color:#285873">Welcome to eCinema</h1>

<div class="container">
  <div class="row"> <!-- row -->
  <div class="row"> <!-- row -->
  <?php
  
  require ( 'includes/connect_db.php' ) ;


# 3. Retrieve data from 'holiday' database table.
	$q = "SELECT * FROM movie" ;
# 4. mysqli_query function performs a query against a database.
	$r = mysqli_query( $link, $q ) ;
# 5. The mysqli_num_rows() function returns the number of rows in a result set. 
	if ( mysqli_num_rows( $r ) > 0 )
	{
/*6. mysql_fetch_array — Fetch a result row as an associative array, a numeric array, or both.
  7. Returns an array of strings that corresponds to display body section.
*/
 
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{

	echo '
		<div class="col-sm d-flex justify-content-center">
			<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
			<img src="'. $row['mov_img'].'" class="card-img-top" alt="movie">
			 <div class="card-body">
		

		   <a href="added.php?id='.$row['id'].'"  class="btn btn-dark btn-block" style="background-color: #29665B;">Book Now</a>
		   
		  </div>
		  
</div>
</div>
		
	';
			 }
	
# 8. Close database connection.
	mysqli_close( $link) ; 
	}
# 9. Or display message if no data is found.
	else { echo '<p>There are currently no beaches.</p>' ; }
	?>

  </div>
  
  </div> <!-- close row -->
</div>

<!-- ========================
Modal Register
============================-->
<div class="modal fade " id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container">
			<h1 class="display-5 text-muted color:#285873;">Register Account</h1>
		</div>
		<hr>
			<div class="container">
				<form action="index.php" method="post">
					<div class="form-group">
					<label for="firstname"style="color:#285873;">First Name</label>
						 <div class="row">
							<div class="col">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
							</div>
						 </div>
					</div>
					<hr>
			 
		
					<div class="form-group">
					<label for="last_name"style="color:#285873;">Last Name</label>
							<div class="row">
								<div class="col">
										<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
								</div>
							</div>
					</div>
					<hr>
		
					<div class="form-group">
					<label for="email"style="color:#285873;">Email</label>
						 <div class="row">
							<div class="col">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" size="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
						</div>
						 </div>
					</div>
		
					<div class="form-group">
					<label for="password"style="color:#285873;">Create Password</label>
						 <div class="row">
							<div class="col">
							 <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Create Password"size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
	
							 </div>
					 </div>
					</div>
					<hr>
		 
					<div class="form-group">
					<label for="confirm_password"style="color:#285873;">Confirm Password</label>
						 <div class="row">
							<div class="col">
							<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	
							</div>
						 </div>
					</div>
					<hr>
		
					<div class="form-group">
						 <div class="row">
							<div class="col">
							<input class="btn btn-success btn-lg btn-block" type="submit" style="background-color: #29665B;" value="Register Now">
							
							</div>
						 </div>
					</div>
				</form><!--Closing Form -->
		
				
			</div><!--Closing container-->
		</div><!--Closing Modal Body-->
</div>
</div> <!--Closing Modal -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>