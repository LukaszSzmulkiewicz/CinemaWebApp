<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('includes/header_logout.php');


	
?>
<div class="container">
	<h1 class="text-center display-4" style="color:#285873">Booking History</title></div>";
<div class="row">
    <div class="col-sm">
		
		
	<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]} ORDER BY booking_date DESC" ;
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
		<h1 style="color: #FFFFFF;">Recently Booked</h1>
		<h4 style="color: #FFFFFF;"> Enjoy the movie!</h4>
		<strong style="color: #FFFFFF;"> Booking ID : </strong>EC2020'  . $row['booking_id'] . ' </p>
		<strong style="color: #FFFFFF;"> Total : &pound </strong> '  . $row['total'] . ' </p>
		
		<strong style="color: #FFFFFF;"> Booking Date : </strong> '  . $row['booking_date'] . '   '  . $row['exp_year'] . '</p>
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
				  <h1 style="color: #FFFFFF;">Booking History</h1>
					<h3 style="color: #FFFFFF;">No booking details.</h3>
			 </div>



' ; }
?>
</div>
	</div>
	</div><!-- end of container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>