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
include('includes/header_reg.php');

?>

<div class="container">

<div class="container">
  <!-- Content here -->
  <h1 class="text-center">eCinema Organic Snacks & Drinks</h1>


<table class="table">
  <thead class="thead-background-color: #29665B" style= "background-color: #29665B">
    <tr>
      <th scope="col"style="color: #FFFFFF;">Snacks</th>
      <th scope="col"style="color: #FFFFFF;">Price</th>
      <th scope="col"style="color: #FFFFFF;">Drinks</th>
      <th scope="col"style="color: #FFFFFF;">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Hazelnut twist</td>
      <td>£2.30</td>
      <td>Minor Figures Cold Brew Coffee Mocha 200ml
</td>
      <td>£1.99</td>
    </tr>
	  <tr>
      <td>Spring Bite</td>
      <td>£2.00</td>
      <td>Vita Coco Natural Coconut Water 1000ml</td>
      <td>£1.84</td>
    </tr>
	  <tr>
      <td>Biscuits starter pack</td>
      <td>£17.00</td>
      <td>Something & Nothing Hibiscus & Rose 330ml</td>
      <td>£1.59</td>
    </tr>
	  <tr>
      <td>Beetroot Breadsticks</td>
      <td>£1.80</td>
      <td>Remedy Ginger Lemon Kombucha 250ml</td>
      <td>£1.99</td>
    </tr>
	  <tr>
      <td>Olive Breadsticks</td>
      <td>£1.80</td>
      <td>ActiPH Alkaline Ionised Water 1Ltr
</td>
      <td>£1.99</td>
    </tr>
	  <tr>
      <td>Breadsticks starter pack</td>
      <td>£17.00</td>
      <td>Grenade Carb Killa Shake Fudge 330ml</td>
      <td>£2.49</td>
    </tr>
	  <tr>
      <td>Almond Banana Starter Pack</td>
      <td>£17.00</td>
      <td>UFIT High 22g Protein Shake Drink Strawberry 310ml</td>
      <td>£2.00</td>
    </tr>
	  <tr>
      <td>Mega combo box</td>
      <td>£34.00</td>
      <td>Rochester Root Ginger Drink 725ml</td>
      <td>£4.99</td>
    </tr>
    <tr>

  </tbody>
</table>

<!-- ========================
Modal Register
============================-->
<div class="modal fade " id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container">
			<h1 class="display-5 text-muted color:#285873;">Register Account</h1>
		</div>
		<hr>
			<div class="container">
				<form action="index.php" method="post">
					<div class="form-group">
					<label for="firstname"style="color:#285873;">First Name</label>
						 <div class="row">
							<div class="col">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
							</div>
						 </div>
					</div>
					<hr>
			 
		
					<div class="form-group">
					<label for="last_name"style="color:#285873;">Last Name</label>
							<div class="row">
								<div class="col">
										<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
								</div>
							</div>
					</div>
					<hr>
		
					<div class="form-group">
					<label for="email"style="color:#285873;">Email</label>
						 <div class="row">
							<div class="col">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" size="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
						</div>
						 </div>
					</div>
		
					<div class="form-group">
					<label for="password"style="color:#285873;">Create Password</label>
						 <div class="row">
							<div class="col">
							 <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Create Password"size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
	
							 </div>
					 </div>
					</div>
					<hr>
		 
					<div class="form-group">
					<label for="confirm_password"style="color:#285873;">Confirm Password</label>
						 <div class="row">
							<div class="col">
							<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	
							</div>
						 </div>
					</div>
					<hr>
		
					<div class="form-group">
						 <div class="row">
							<div class="col">
							<input class="btn btn-success btn-lg btn-block" type="submit" style="background-color: #29665B;" value="Register Now">
							
							</div>
						 </div>
					</div>
				</form><!--Closing Form -->
		
				
			</div><!--Closing container-->
		</div><!--Closing Modal Body-->
</div>
</div> <!--Closing Modal -->
	
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>