<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
    <title>eCinema</title>
  </head>
  <body>

 
</nav>
  
    <nav class="navbar navbar-expand-lg" style="background-color: #AD7876;">
 <a class="navbar-brand" href="#">
    <img src="img/eCinemaLogo.jpg" width="250" height="80" class="d-inline-block align-top" alt="">
   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Now Showing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Coming Soon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Movie Reviews</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-white" href="#">Find Us</a>
      </li>
	   <li class="nav-item ">
        <a class="nav-link text-dark font-weight-bold" href="#">Register Now</a>
      </li>
    </ul>
  </div>
  <nav class="navbar navbar-light">
  <form class="form-inline" action="login_action.php" method="post">
  <input type="text" name="email" placeholder="Email">
<input type="password" name="pass"placeholder="Password"></p>
<input type="submit" value="Login" >
    <div class="input-group">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
  </form>
</nav>
<nav class="navbar navbar-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Password" aria-label="Login">
    <button class="btn btn-outline-success my-2 my-sm-0 background-color: #29665B;" type="submit">Login</button>
  </form>
</nav>
  
  
  
</nav>
  <nav class="navbar navbar-light" style="background-color: #D8D2D2;">
  <a class="navbar-brand" href="#">eCinema</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
		
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
		
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
  <!-- Content here -->
  <h1 class="text-center">Welcome to eCinema</h1>

<div class="container">
  <div class="row"> <!-- row -->
  <?php
  
  require ( 'includes/connect_db.php' ) ;
	
# 3. Retrieve data from 'holiday' database table.
	$q = "SELECT * FROM NowShowing" ;
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
			<img src="'. $row['img'].'" class="card-img-top" alt="beach">
			 <div class="card-body">
			
		  
		  <h2 class="text-center">'. $row['title'].'</h2>
		  <p>'. $row['more_info'].'</p>
		   <a href="#" class="btn btn-primary">Book Now</a>
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
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>