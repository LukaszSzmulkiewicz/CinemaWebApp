<?php # DISPLAY SHOPPING CART PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Cart' ;
#include ( 'includes/header_logout.php' ) ;

# Get passed mov id and assign it to a variable.
if ( isset( $_GET['mov_id'] ) ) $id = $_GET['mov_id'] ;

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $mov_id => $mov_qty )
  {
    # Ensure values are integers.
    $mov_id = (int) $id;
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
  # Connect to the database.
  require ('includes/connect_db.php');
  
  # Retrieve all items in the cart from the 'movie' table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
  $r = mysqli_query ($link, $q);

  # Display body section with a form and a table.
  echo '<div class="card">
			<h5 class="card-header">Cart</h5>
			  <div class="card-body">
				<form action="cart1.php" method="post">
					<div class="row">
						<div class="col-md col-sm">
				';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['id']]['quantity']
			  * $_SESSION['cart'][$row['id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<h4>{$row['mov_title']}</h4>
			</div>
			<div class=\"col-md-4 col-sm-12\">
		<p>{$row['mov_desc']}</p>
    </div>
	<div class=\"col-md-4 col-sm-12\">
		<strong>Start Time:  </strong> <span class=\"badge badge-primary\">{$row['showing1']}</span>
    </div>
	
	</div>
	<div class=\"row\">
		<div class=\"col-md-4 col-sm-12\">
			 <input type=\"text\" class=\"form-control\" 
				name=\"qty[{$row['id']}]\" 
					value=\"{$_SESSION['cart'][$row['id']]['quantity']}\">
		</div>
		
		<div class=\"col-md-4 col-sm-12\">
		<input type=\"submit\" class=\"btn btn-dark\" name=\"submit\" value=\"Update My Cart\">
		  
		</div>
		
		<div class=\"col-md-4 col-sm-12\">
          <strong>Ticket Price: </strong> &pound  {$row['mov_price']} 
		</div>
		
		
		
	</div>
	
	
	
	<div class=\"row\">
		<div class=\"col-md-4 col-sm-12\">
		</div>
		
		<div class=\"col-md-4 col-sm-12\"></div>
		
		<div class=\"col-md-4 col-sm-12\">
			<strong>Subtotal: </strong> &pound  ".number_format($subtotal, 2)."
		</div>
		
	</div>
	<div class=\"row\">
		<div class=\"col-md-4 col-sm-12\">
		</div>
		<div class=\"col-md-4 col-sm-12\">
		
		</div>
		<div class=\"col-md-4 col-sm-12\">
		<h4><span class=\"badge badge-primary\">Total: </strong> &pound ".number_format($total,2)."</span></h4>
		</div>
		
	</div>
	</div>
	<div class=\"row\">
		<div class=\"col-md col-sm\">
		<div class=\"card-footer\">
			<a class=\"btn btn-dark btn-block\" href=\"checkout.php?total='.$total.'\">Checkout</a>
		</div>
		</div>
	
	
		";
  }
  
  
  # Close the database connection.
  mysqli_close($link); 
  
  echo '	</form>';
}
else
# Or display a message.
{ echo '<div class="container">
		<h1 class="text-center">Your Cart...</h1><div class="col-sm">
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
			  <a href="now_showing.php"><strong>Your cart is currently empty.</strong>  View what\'s On Now</a>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>


</div>' ; }
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>