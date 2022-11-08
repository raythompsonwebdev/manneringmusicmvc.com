<?php  ?>

<!-- Slider-->
<section id="slider">
	<img src="assets/images/sliderimages/manneringhiphop.webp" alt="collage of hop hop albums" />
</section>

<!--main text-->
<section id="main-section">
	<h2>MANNERING MUSIC FEATURED ALBUMS</h2>
	<br />
	<!--Hip Hop Section-->
	<section class="genre-section">
		<h3>Hip Hop</h3>
		<?php foreach ($rapalbums as $rapalbum) : ?>

			<figure class="album-card">
				<a href="/singleresult?albumid=<?= $rapalbum->id ?? " " ?>&artistid=<?= $rapalbum->artistId ?? '' ?>" title="<?= $rapalbum->album ?>">
					<img class="album-card-image" width="100" height="100" src="/assets/databasepics/WEBP/<?= $rapalbum->image ?>" alt="<?= $rapalbum->album ?> album cover" aria-labelledby="<?= $rapalbum->getArtistId()->artist_name ?>">
				</a>
				<figcaption id="<?= $rapalbum->getArtistId()->artist_name ?> " class="album-card-text">
					<h4 class="album-card-artist"><?= $rapalbum->getArtistId()->artist_name ?></h4>
					<h5 class="album-card-genre"><?= $rapalbum->genre ?></h5>

				</figcaption>

			</figure>

		<?php endforeach; ?>

	</section>


	<!--Country Section-->
	<section class="genre-section ">
		<h3>Country</h3>
		<?php foreach ($countryalbums as $countryalbum) : ?>

			<figure class="album-card">
				<a href="/singleresult?albumid=<?= $countryalbum->id ?? '' ?>&artistid=<?= $countryalbum->artistId ?? '' ?>" title="<?= $countryalbum->album ?>">
					<img class="album-card-image" width="100" height="100" src="/assets/databasepics/WEBP/<?= $countryalbum->image ?>" alt="<?= $countryalbum->album ?> album cover" aria-labelledby="<?= $countryalbum->getArtistId()->artist_name ?>">

				</a>
				<figcaption id="<?= $countryalbum->getArtistId()->artist_name ?>" class="album-card-text">
					<h4 class="album-card-artist"><?= $countryalbum->getArtistId()->artist_name ?></h4>
					<h5 class="album-card-genre"><?= $countryalbum->genre ?></h5>
				</figcaption>
			</figure>

		<?php endforeach; ?>

	</section>


	<!--Jazz Section-->
	<section class="genre-section">
		<h3>Jazz</h3>
		<?php foreach ($jazzalbums as $jazzalbum) : ?>

			<figure class="album-card">
				<a href="/singleresult?albumid=<?= $jazzalbum->id ?? '' ?>&artistid=<?= $jazzalbum->artistId ?? '' ?>" title="<?= $jazzalbum->album ?>">
					<img class="album-card-image" width="100" height="100" src="/assets/databasepics/WEBP/<?= $jazzalbum->image ?>" alt="<?= $jazzalbum->album ?> album cover" aria-labelledby="<?= $jazzalbum->getArtistId()->artist_name ?>">
				</a>
				<figcaption id="<?= $jazzalbum->getArtistId()->artist_name ?>" class="album-card-text">
					<h4 class="album-card-artist"><?= $jazzalbum->getArtistId()->artist_name ?></h4>
					<h5 class="album-card-genre"><?= $jazzalbum->genre ?></h5>
				</figcaption>
			</figure>

		<?php endforeach; ?>

	</section>




</section>
