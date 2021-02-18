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

	

<?php # DISPLAY COMPLETE REGISTRATION PAGE.

	echo "<div class=\"container text-center\"><h1 style=\"color:#285873\">Welcome {$_SESSION['first_name']} {$_SESSION['last_name']}</h1></div>";
?>
<div class="container">

<div class="row">
<div class="col-sm-12 col-md-6">
<div class="alert alert-primary alert-dismissible fade show" style="background-color: #59B3A2;" role="alert">
<?php
# Open database connection.
require ( 'includes/connect_db.php' ) ;
# Create query to retrieve items from 'payments' table, based on the user_id PHP set in session.
$q = "SELECT * FROM payments WHERE user_id={$_SESSION[user_id]}" ;
#Create variable to validate database connection and query.
$r = mysqli_query( $link, $q ) ;
#Create conditional if statement which will execute code if the condition is TRUE.
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<p><strong style="color: #FFFFFF;">Card Stored</strong></p>';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
{
echo '
<p><strong style="color: #FFFFFF;"> Card Holder : </strong> ' . $row['full_name'] . ' </p>
<p><strong style="color: #FFFFFF;"> Card Number : </strong> ' . $row['card_number'] . ' </p>
<p><strong style="color: #FFFFFF;"> Expire Date : </strong> ' . $row['exp_month'] . ' ' . $row['exp_year'] . '</p>
<p><a href="" data-toggle="modal" data-target="#delete_card" style="color: #FFFFFF;">Remove Card</a></p>';
}
}
#code to be executed if condition is false
else { echo '
<a href="card.php"><strong style="color: #FFFFFF;">Add Payment Card!</strong> </a>For quick and easy payments.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>' ; }
?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span></button></div>
</div>
	
	
    <div class="col">
	<div class="alert alert-primary alert-dismissible fade show" style="background-color: #59B3A2;" role="alert">
	<a href="password.php"style="color: #FFFFFF;"><strong >Change Password</strong> </a>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">

	<span aria-hidden="true">&times;</span></button></div>
	
	</div>
	</div>
	
    <div class="w-100"></div>
	
	<div class="row">
    <div class="col">
	<div class="alert alert-primary alert-dismissible fade show" style="background-color: #59B3A2;" role="alert">
	<a href="history.php"style="color: #FFFFFF;"><strong >Booking History</strong> </a>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span></button></div>
	</div>
    <div class="col">
<div class="alert alert-primary alert-dismissible fade show" style="background-color: #59B3A2;" role="alert">
	<a href="#"style="color: #FFFFFF;"><strong >E-Tickets</strong> </a>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span></button></div>
	</div> 
		
	</div>
  </div>
</div>



<!--  =============================
=====    Modal Delete Card  =======
	=================================== -->	 
<div class="modal fade" id="delete_card" tabindex="-1" role="dialog" aria-labelledby="delete_card" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="background-color: #59B3A2;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"style="color: #FFFFFF;">Remove This Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"style="background-color: #59B3A2;">
		<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'payments' table.
	$q = "SELECT * FROM payments WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '<div class="col-sm">';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	
		
			
			<strong style="color: #FFFFFF;"> Card Holder : </strong> '  . $row['full_name'] . ' </p>
			<strong style="color: #FFFFFF;"> Card Number : </strong> '  . $row['card_number'] . '</p>
			<strong style="color: #FFFFFF;"> Expire Date : </strong> '  . $row['exp_month'] . '   '  . $row['exp_year'] . '</p>
		</div>
			 
				
				<div class="modal-footer">
				 
				  <div class="form-group">
				   <form action="delete_card.php" method="post">
				   <p style="color: #FFFFFF;">*Are you sure you want to remove this card?</p>
				   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<a href="delete_card.php?user_id=' .$row['user_id'] . '" class="btn btn-dark"  style="background-color: #29665B;" >Continue</a>
					
				  </div>
				</div>
					</form>		
		 
      </div>
     
    </div>
  </div>
</div>
		
	';
  }
	
  # Close database connection.
  mysqli_close( $link ) ; 
}
else { echo '<div class="container"><h3 style="color: #FFFFFF;">No card stored</h3>
<div class="modal-footer">
		<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
</div>' ; }
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>