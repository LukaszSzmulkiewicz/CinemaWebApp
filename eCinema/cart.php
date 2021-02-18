<?php # DISPLAY SHOPPING CART ADDITIONS PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Cart Addition' ;
include ( 'includes/header_logout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 



# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $id => $mov_qty )
  {
    # Ensure values are integers.
    $id = (int) $id;
    $qty = (int) $mov_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Open database connection.
require ( 'includes/connect_db.php' ) ;
  
  # Retrieve all items in the cart from the 'movie' database table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
  $r = mysqli_query ($link, $q);

  # Display body section with a form and a table.
  echo '<div class="container">
		  <div id="txtHint">
			<!-- Display Search -->	
		</div>
			
		
		<h1 class="display-4 text-center">Booking Summary</h1>
		  <div class="space">
			<div class="row justify-content-center">
			
			<div class="alert alert-dark alert-dismissible fade show" style="background-color: #59B3A2; role="alert">
			
			  <form action="cart.php" method="post">
			    
				
						
						
				
		
	  ';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $_SESSION['cart'][$row['id']]['price'];
    $total += $subtotal;
	$time = $

    # Display the row/s:
    echo " 
		<div class=\"row\">
			<div class=\"col-md-6 col-sm-12\">
			<h3>
				<span class=\"badge badge-secondary\"style=\"background-color: #29665B;\">
				   Movie Title:  {$row['mov_title']}
				</span>
			</h3>
			</div>
		</div>
		<div class=\"row\">
			<div class=\"col-md-6 col-sm-12\">
				<h3>
					<span class=\"badge badge-secondary\"style=\"background-color: #29665B;\">
					  Start Time:  {$row['showing1']}
					</span>
				</h3>
			</div>
			
		</div>
		<div class=\"row\">
		
			<div class=\"col-md-6 col-sm-12\">
				<h3>
					<span class=\"badge badge-success\"style=\"background-color: #29665B;\">
					  Ticket Price:  &pound {$row['mov_price']} 
					</span>
				</h3>
			</div>
			
			
			<div class=\"col-md-6 col-sm-12\">	  
				<div class=\"input-group mb-3\">
					<input type=\"text\" class=\"form-control\" name=\" qty[{$row['id']}]\" value=\" {$_SESSION['cart'][$row['id']]['quantity']}\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\">
				
				<div class=\"input-group-append\">
				
					<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-refresh\"></i></button>
				</div>
			</div>
			</div>
		</div>
	
	
		<div class=\"row\">
			<div class=\"col-md-6 col-sm-12\">
				<h3>
				  <span class=\"badge badge-secondary\" style=\"background-color: #29665B;\">
					 Sub-Total:  &pound " .number_format ($subtotal, 2). "
				  </span>
				</h3>
			</div>
		</div>
		
  
		
		<div class=\"row\">
			<div class=\"col-md-6 col-sm-12\">
				<h3>
				  <span class=\"badge badge-primary\">
					To Pay:  &pound ".number_format($total,2)."
				  </span>
				</h3>
			</div>
		</div>	
		
		 
		 ";
  }
   # Display the total.
  echo '
  
	
	<div class="row">
		  <div class="col-md col-sm">
		   <a href="checkout.php?total='.$total.'"><button type="button" class="btn btn-dark btn-block" style="background-color: #29665B;" role="button">Continue</button></a>
		  </div>
		</form>
	</div>';
}
else
# Or display a message.
{ echo '<div class="container"><h2>No reservations have been made.</h2>' ; }

?>

</div>
</div>
<?php
include ('includes/footer.html');
?>
</body>
</html>

