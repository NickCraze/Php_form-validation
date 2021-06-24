<?php

	include('config/db_connect.php');

	// write query for all movies
	$sql = 'SELECT title, movie, id FROM movies ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Movies!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($movies as $movie): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<img src="img/film.svg"class="movie">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($movies['title']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $movies['movie']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $movies['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
