
			
				<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT mov_title FROM  `movie` ORDER BY  `movie`.`mov_title` ASC ";
	
	$r = mysqli_query( $link, $q ) ;
	?>
	<select name="movie titles">
	<?php
	
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
		  ';

  while ( $row = $r->fetch_assoc())
  {
    echo '
		 
		 <option>'  . $row['mov_title'] . '</option>
		 
		

	
	';
  }

	
  # Close database connection.
  #mysqli_close( $link ) ; 
  
}
else { echo '<div class="alert alert-primary" style="background-color: #59B3A2;" alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				
					<h3 style="color: #FFFFFF;">No review details.</h3>
			 </div>



' ; }
?>
 </select>