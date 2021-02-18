<?php
$page_title = 'User Area ' ;
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
#Open database connection.
require ( 'includes/connect_db.php' ) ;
#new variable ‘$user_id’ which will include the information posted from the form/link.
 $user_id=$_GET['user_id'];
#SQL statement which will delete the record based on the user id.
 $sql = "DELETE FROM payments WHERE user_id='".$user_id."'";
#if the user_id in the database and the session are the same, it will proceed with the deletion and if not, display error 
if ($link->query($sql) === TRUE) {
 header("Location: user_login.php");
 }
else {
 echo "Error deleting record: " . $link->error;
 }
 

 