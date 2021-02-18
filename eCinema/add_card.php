<?php $page_title = 'User Area ' ;

# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) 
{ 
require ( 'login_tools.php' ) ; load() ; 
}

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	# Check Input.
	if ( empty($_POST['full_name'] ) ) ; 
	if ( empty($_POST['card_number'] ) ) ;
	if ( empty($_POST['exp_month'] ) ) ;
	if ( empty($_POST['exp_year'] ) ) ;
	if ( empty($_POST['cvv'] ) ) ;
	
# On success add post to payments table.
if( !empty($_POST['full_name']) &&  !empty($_POST['card_number']) )
{
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	# Execute inserting into 'payments'table.
	$q = "INSERT INTO payments(user_id,full_name,card_number,exp_month,exp_year, cvv,reg_date) 
	VALUES     ('{$_SESSION[user_id]}','{$_POST[full_name]}','{$_POST[card_number]}','{$_POST[exp_month]}','{$_POST[exp_year]}','{$_POST[cvv]}',NOW() )";
	$r = mysqli_query ( $link, $q ) ;
	
	# Report error on failure.
	if (mysqli_affected_rows($link) != 1) 
	{ 
echo '<p>Error</p>'.mysqli_error($link); } 
else 
{ 
include('user_login.php'); 
}
# Close database connection.
mysqli_close( $link ) ; 
}
} 
?>
