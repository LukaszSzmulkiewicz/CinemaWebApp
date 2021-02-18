


<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('includes/header_logout.php');
?>




<?php
# Open database connection.
require ( 'includes/connect_db.php' ) ;

?>
<div class="col-sm d-flex justify-content-center">
	<div class="card "style="width: 28rem;">
		<div class="card-header text-center">
				Change Password
				</div>
	<div class="card-body">
		<form action="change-password.php" method="post">
<!-- Input box to confirm email address -->
			<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
<!-- Input box for the new password -->
			<input type="password" name="pass1" class="form-control" placeholder="New Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
<!-- Input box to confirm new password -->
			<input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>
<!-- Submit button -->
			<input type="submit" name="btnChangePassword" class="btn btn-dark btn-block" style="background-color: #29665B;" value="Save Changes"/>
		</form> <!-- Create form -->
			</div>
	</div>
	</div>
</div>



<?php
# Close database connection.
 mysqli_close( $link ) ;
 ?>


