<?php  ?>

<!-- Slider-->
<section id="slider">
    <img src="assets/images/sliderimages/manneringhiphop.webp" alt="collage of hop hop albums" />
</section>

<!--main text-->
<section id="main_section">
    <h1>MANNERING MUSIC FEATURED ALBUMS</h1>
    <br />
    <!--Hip Hop Section-->
    <section class="album_section">
        <h2>Hip Hop</h2>
        <?php foreach ($rapalbums as $rapalbum) : ?>

        <figure class="grid_1_of_5 ">
            <a href="/singleresult?albumid=<?= $rapalbum->id ?? " " ?>&artistid=<?= $rapalbum->artistId ?? '' ?>"
                title="<?= $rapalbum->album ?>">
                <img class="images_1_of_5" width="100" height="100"
                    src="/assets/databasepics/WEBP/<?= $rapalbum->image ?>" alt="<?= $rapalbum->album ?> album cover"
                    aria-labelledby="<?= $rapalbum->getArtistId()->artist_name ?>">
            </a>
            <figcaption id="<?= $rapalbum->getArtistId()->artist_name ?> " class="cap_1_of_5">
                <h3><?= $rapalbum->getArtistId()->artist_name ?></h3>
                <p><?= $rapalbum->genre ?></p>

            </figcaption>

        </figure>

        <?php endforeach; ?>

    </section>


    <!--Country Section-->
    <section class="album_section ">
        <h2>Country</h2>
        <?php foreach ($countryalbums as $countryalbum) : ?>

        <figure class="grid_1_of_5">
            <a href="/singleresult?albumid=<?= $countryalbum->id ?? '' ?>&artistid=<?= $countryalbum->artistId ?? '' ?>"
                title="<?= $countryalbum->album ?>">
                <img class="images_1_of_5" width="100" height="100"
                    src="/assets/databasepics/WEBP/<?= $countryalbum->image ?>"
                    alt="<?= $countryalbum->album ?> album cover"
                    aria-labelledby="<?= $countryalbum->getArtistId()->artist_name ?>">

            </a>
            <figcaption id="<?= $countryalbum->getArtistId()->artist_name ?>" class="cap_1_of_5">
                <h3><?= $countryalbum->getArtistId()->artist_name ?></h3>
                <p><?= $countryalbum->genre ?></p>
            </figcaption>
        </figure>

        <?php endforeach; ?>

    </section>


    <!--Jazz Section-->
    <section class="album_section">
        <h2>Jazz</h2>
        <?php foreach ($jazzalbums as $jazzalbum) : ?>

        <figure class="grid_1_of_5">
            <a href="/singleresult?albumid=<?= $jazzalbum->id ?? '' ?>&artistid=<?= $jazzalbum->artistId ?? '' ?>"
                title="<?= $jazzalbum->album ?>">
                <img class="images_1_of_5" width="100" height="100"
                    src="/assets/databasepics/WEBP/<?= $jazzalbum->image ?>" alt="<?= $jazzalbum->album ?> album cover"
                    aria-labelledby="<?= $jazzalbum->getArtistId()->artist_name ?>">
            </a>
            <figcaption id="<?= $jazzalbum->getArtistId()->artist_name ?>" class="cap_1_of_5">
                <h3><?= $jazzalbum->getArtistId()->artist_name ?></h3>
                <p><?= $jazzalbum->genre ?></p>
            </figcaption>
        </figure>

        <?php endforeach; ?>

    </section>




</section>
