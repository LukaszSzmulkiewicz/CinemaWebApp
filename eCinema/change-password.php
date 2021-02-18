<?php 

$page_title = 'User Area ' ;
include('includes/header_logout.php');


# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )

{
# Connect to the database.
require ('includes/connect_db.php');

# Initialize an error array.
$errors = array();
# Check for an email address:
if ( empty( $_POST[ 'email' ] ) )
{ $errors[] = 'Enter your email address.'; }
else
{ $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }


# Check for a password and matching input passwords.
if ( !empty($_POST[ 'pass1' ] ) )
{
if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
{ $errors[] = 'Passwords do not match.' ; }
else
{ $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
}
else { $errors[] = 'Enter your password.' ; }

# Check if email address exists.
if ( empty( $errors ) )
{
$q = "SELECT * FROM users WHERE email='$e'" ;
$r = @mysqli_query ( $link, $q ) ;
}

if ( empty( $errors ) )
{
$q = "UPDATE users SET pass= SHA2('$p',256) WHERE email='$e'";
$r = @mysqli_query ( $link, $q ) ;
if ($r)
{
header("Location: user_login.php");

} else {
echo "Error deleting record: " . $link->error;
}
mysqli_close($link);
exit();
}
else
{
echo ' <h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
foreach ( $errors as $msg )
{ echo " - $msg<br>" ; }
echo 'Please try again.</div></div>';
# Close database connection.
mysqli_close( $link ); } } ?>