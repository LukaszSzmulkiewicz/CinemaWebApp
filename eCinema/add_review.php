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


# Check for the movie review content:
if ( empty( $_POST[ 'content' ] ) )
{ $errors[] = 'Enter the review content'; }
else
{ $c = mysqli_real_escape_string( $link, trim( $_POST[ 'content' ] ) ) ; }

# Check for the movie rating:
if ( empty( $_POST[ 'rating' ] ) )
{ $errors[] = 'Enter the rating'; }
else
{ $rat = mysqli_real_escape_string( $link, trim( $_POST[ 'rating' ] ) ) ; }



if ( empty( $errors ) )
{
$auth = $_SESSION['first_name'];
$m = $_SESSION['varname'];

$q = "INSERT INTO reviews (movie_id, author, content, rating) VALUES ('$m', '$auth', '$c', '$rat')";	

$r = @mysqli_query ( $link, $q ) ;
if ($r)
{
header("Location: reviews_signedIn.php");

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