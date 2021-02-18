<?php
/* 1. Open database connection, file stored in the includes folder.  
 2. The require statement takes all the text/code/markup that exists 
	in the specified file and copies it into the file that uses the require statement.
	The require statement will produce a fatal error and stop the script.
*/
	require ( 'includes/connect_db.php' ) ;
	
# 3. Retrieve data from 'holiday' database table.
	$q = "SELECT * FROM holiday" ;
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
	
		  <img src="'. $row['img'].'" class="card-img-top" alt="beach">
		  <h2>'. $row['title'].'</h2>
		  <p>'. $row['more_info'].'</p>
		
	';
			 }
	
# 8. Close database connection.
	mysqli_close( $link) ; 
	}
# 9. Or display message if no data is found.
	else { echo '<p>There are currently no beaches.</p>' ; }
	?>
