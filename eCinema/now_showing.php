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

<div class="container">
  <!-- Content here -->
  <h1 class="text-center">What's On Now...</h1>

<div class="container">
  <div class="row"> <!-- row -->
  <?php
  
  require ( 'includes/connect_db.php' ) ;
	
# 3. Retrieve data from 'movie' database table.
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
	
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
