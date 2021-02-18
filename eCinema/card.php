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
	include('includes/header_logout.html');

?>

<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('includes/header_logout.php');
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Open database connection.
require ( 'includes/connect_db.php' ) ;
			echo'
	
		<div class="col-sm d-flex justify-content-center">
			<div class="card ">
				<div class="card-header text-center">
				Add Payment Card
				</div>
			<div class="card-body">
			  <form action="add_card.php" method="post">
				<div class="form-group">
					<label for="full_name">Full Name</label>
					<input type="text" name="full_name" placeholder="Full Name (printed on card)" required class="form-control ">
				</div>
				
				<div class="form-group">
					<label for="cardNumber">Card number</label>
						<div class="input-group">
							<input type="text" name="card_number" placeholder="Your card number" required class="form-control"  ">
							<div class="input-group-append">
								<span class="input-group-text text-muted">
									<i class="fa fa-cc-visa mx-1"></i>
									<i class="fa fa-cc-amex mx-1"></i>
									<i class="fa fa-cc-mastercard mx-1"></i>
								</span>
							</div>
						</div>
				</div>
				<div class="form-group">
					<label for="expiryDate">Expiry Date</label>
						<div class="input-group">
						  <input type="number" placeholder="MM" name="exp_month" required class="form-control" > 
						  <input type="number" placeholder="YY" name="exp_year" required class="form-control"  > 
						</div>
				</div>
         
				<div class="form-group">
					<label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                        <i class="fa fa-question-circle"></i>
                    </label>
					<input type="text" name="cvv" required class="form-control" required >
				</div>
				<input class="btn btn-dark btn-lg btn-block" style="background-color: #29665B;" type="submit" value="Add Card">
			</form>
	</div>
	</div>
   ';
 #Close database connection.
mysqli_close( $link ) ;
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>