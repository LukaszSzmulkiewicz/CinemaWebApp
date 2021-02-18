<?php # DISPLAY SHOPPING CART ADDITIONS PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Cart Addition' ;
include ( 'includes/header_logout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
	
    echo '<div class="container">
	 

			<h1 class="text-center display-4" style="color:#285873">'.$row['mov_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-1by1">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
				<p>'.$row['mov_desc'].'</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4 style="color:#285873">Book Now</h4>
				<hr>
				<h2>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" style="background-color: #29665B;" role="button"> ' . $row['showing1'] . '</button></a>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" style="background-color: #29665B;" role="button">' . $row['showing2'] . '</button></a>
				</h2>
			
			</div>
		</div>
		';
  }
else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['mov_price'], 'time1' => $row['showing1'], 'time2' => $row['showing2']) ;
 echo '<div class="container">
			<h1 class="text-center display-4"style="color:#285873">'.$row['mov_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
				<p>'.$row['mov_desc'].'</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4 style="color:#285873">Book Now</h4>
				<hr>
				<h2>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" style="background-color: #29665B;role="button"> ' . $row['showing1'] . '</button></a>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" style="background-color: #29665B;role="button">' . $row['showing2'] . '</button></a>
				</h2>
			</div>
		</div>';
  }
}

# Close database connection.
mysqli_close($link);
?>

 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>