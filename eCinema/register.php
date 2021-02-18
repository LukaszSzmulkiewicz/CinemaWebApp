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
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="container">
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<h1>Error!</h1>
			<p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<hr>
			<p class="mb-0">Please try again.</p>
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



<div class="container">
	<h1 class="text-center">Sign Up</h1>
	<div class="col-sm d-flex justify-content-center">
	 
	</div>
<!-- Display body section with sticky form. -->
<form action="register.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
	</div> 
	<div class="form-group col-md-6">
		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	</div>
	<div class="form-group col-md-12">
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" size="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	</div>
	<div class="form-group col-md-6">
		<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Create Password"size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
	</div>
	<div class="form-group col-md-6">
		<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	</div>
</div>
	<div class="col-auto my-1">
	<button type="submit" class="btn btn-primary btn-lg btn-block">Create Account Now</button>
	</div>
</form>
</div><!-- end of container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
