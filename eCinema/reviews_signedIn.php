<!doctype html>
<html lang="en">
  <head>
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
$page_title = 'User Area ' ;
	include('includes/header_logout.php');

?>

	


  <!-- Content here -->
  <h1 	class="text-center"style="color:#285873"><strong>
				Add your review:  <?php
		# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		echo "{$_SESSION['first_name']}";
		?>
				</strong></h1>
				
				
			
<div class="container">


<div class="col-sm d-flex justify-content-center">
	<div class="card "style="width: 28rem;">
	
	<div class="card-body">
		<form action="add_review.php" method="post">
<!-- Input box to confirm email address -->
			<div class="form-group">
							<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT mov_title FROM  `movie` ORDER BY  `movie`.`mov_title` ASC ";
	
	$r = mysqli_query( $link, $q ) ;
	?>
	<select name="movie titles" >
	<?php
	
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
		  ';

  while ( $row = $r->fetch_assoc())
  {
	  $mt= $row['mov_title'];
    echo "<option value='$mt'>$mt</option>";

	
	
  }

	
  # Close database connection.
  #mysqli_close( $link ) ; 
  
}
$_SESSION['varname'] = $mt;
?>
 </select>

<!-- Input box for the text review -->
			<input type="text" name="content" class="form-control" placeholder="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; ?>" required>
<!-- Input box to rate the movie -->
			<input type="text" name="rating" class="form-control" placeholder="rating" value="<?php if (isset($_POST['rating'])) echo $_POST['rating']; ?>" required>
<!-- Submit button -->
			<input type="submit" name="btnChangePassword" class="btn btn-dark btn-block" style="background-color: #29665B;" value="Submit the review"/>
		</form> <!-- Create form -->
			</div>
	</div>
	</div>
</div>

<div class="container">
  <!-- Content here -->
  <h1 class="text-center"style="color:#285873"> </h1>

<div class="container">
<h1 class="text-center"style="color:#285873">Review History</h1>



	<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM reviews ORDER BY review_id DESC" ;
	
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
		  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
		 
		<div class="alert alert-primary" style="background-color: #59B3A2;" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		<h1 style="color: #FFFFFF;">Movie title: '  . $row['movie_id'] . '</h1>
		<strong style="color: #FFFFFF;"> Rating : '  . $row['rating'] . '*</strong></p>
		
		
		<strong style="color: #FFFFFF;">  '  . $row['content'] . '</strong>  </p>
		<p style="color: #FFFFFF;"> Date Created : '  . $row['date_created'] . ' by: '  . $row['author'] . ' </p>
		
		<hr>
		</div>
	
	';
  }
	
  # Close database connection.
  #mysqli_close( $link ) ; 
}
else { echo '<div class="alert alert-primary" style="background-color: #59B3A2;" alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				
					<h3 style="color: #FFFFFF;">No review details.</h3>
			 </div>



' ; }
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>