<?php

include __DIR__ . '/../includes/DatabaseConnection.php';
if (!isset($_GET['submit'])) {
	//Store search form data submitted into variables
	$artistname = htmlspecialchars($_GET['artist_name']);
	$albumname = htmlspecialchars($_GET['album']);
	$genre = htmlspecialchars($_GET['genre']);

	//Inner Join
	$sql = 'SELECT * FROM `album`
												INNER JOIN `artist`
												ON `artistId` = `artist`.`id`
												WHERE `album`
												LIKE :album AND `genre`
												LIKE :genre AND `artist_name`
												LIKE :artist_name';

	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':artist_name', '%' . $artistname . '%');
	$stmt->bindValue(':album', '%' . $albumname . '%');
	$stmt->bindValue(':genre', '%' . $genre . '%');
	$stmt->execute();
	$rows = $stmt->fetchAll();

	if ($rows) {
		foreach ($rows as $row) : ?>
			<div class="results">

				<figure class="results-info">
					<a href="/singleresult?albumid=<?= $row[0] ?? '' ?>&artistid=<?= $row['artistId'] ?? '' ?>" title="Go album page">
						<img src="assets/databasepics/WEBP/<?= $row['image']; ?>" alt="Album-Cover-Image" />
					</a>
					<figcaption class="results-text">


						<h3><?= $row['artist_name']; ?></h3>
						<h4><?= $row['album']; ?></h4>
						<h5> <a href="/artist?albumid=<?= $row[0] ?? '' ?>&artistid=<?= $row['artistId'] ?? '' ?>" title="Go artist page">Go To Artist</a></h5>


					</figcaption>

				</figure>

			</div>

<?php
		endforeach;
	} else {
		echo '<p>Nothing to see</p>';
	}
}
?>
