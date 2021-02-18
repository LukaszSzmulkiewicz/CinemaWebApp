<?php # DISPLAY CHECKOUT PAGE.

# Set page title and display header section.
$page_title = 'Checkout' ;
include ( 'includes/header_logout.php' ) ;


# Check for passed total and cart.
if ( isset( $_GET['total'] ) 
	&& ( $_GET['total'] > 0 ) 
&& (!empty($_SESSION['cart']) ) )
{
  # Open database connection.
  require ('includes/connect_db.php');
  
  # Ticket reservation and total in 'bookings' database table.
  $q = "INSERT INTO booking ( user_id, total, booking_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
  $r = mysqli_query ($link, $q);
  
  # Retrieve current booking number.
  $booking_id = mysqli_insert_id($link) ;
  
  # Retrieve cart items from 'movie' database table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
  $r = mysqli_query ($link, $q);

   # Store booking contents in 'booking_contents' database table.
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO booking_contents
	( booking_id, id, quantity, mov_price )
    VALUES ( $booking_id, ".$row['id'].",".$_SESSION['cart'][$row['id']]['quantity'].",".$_SESSION['cart'][$row['id']]['price'].")" ;
    $result = mysqli_query($link,$query);
  }
  
  
  
	# Display Booking.
	echo '<div class="container">
			<h1 class="display-4" style="color:#285873">Thank you for booking with <span>EC</span>inema.  </h1>';
  
  # Remove cart items.  
  $_SESSION['cart'] = NULL ;
}
# Or display a message.
else { echo '<p></p>' ; }

 
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
ORDER BY booking_date DESC
LIMIT 1" ;


$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  
  echo '<div class="container">
		<div class="alert alert-primary" style="background-color: #59B3A2;" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		<h1 class="text-center display-4"style="color: #FFFFFF;">Recently Booked</h1>
		
		
				';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '	<div class="text-center">
				<p><img src="img/qr.jpg"></p>
			</div>
			<strong class="text-white"> Booking ID : </strong>EC2020'  . $row['booking_id'] . ' </p>
			<strong class="text-white">Payment Successfull: </strong> &pound ' . $row['total'] . '</p>
			<strong class="text-white">Booking Date:  </strong>'  . $row['booking_date'] . '</p>
			<h4 class="text-center display-4"style="color: #FFFFFF;"> Enjoy the movie!</h4>
			
<p><strong><a href="user_login.php"><button type="button" class="btn btn-dark btn-block" style="background-color: #29665B;" role="button">Continue</strong></button></a>			
		';
  }
		 
  # Close database connection.
  mysqli_close( $link ) ; 
}

?>