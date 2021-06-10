<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'nick', 'test1234', 'crazy_movies');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>