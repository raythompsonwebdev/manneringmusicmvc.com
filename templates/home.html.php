<?php  ?>

<!-- Slider-->
<section id="slider">
    <img src="assets/images/sliderimages/manneringhiphop.webp" alt="hip-hop-albums" />
</section>

<!--main text-->
<section id="main_text">
    <h1>MANNERING MUSIC FEATURED ALBUMS</h1>
    <br />
    <!--Hip Hop Section-->
    <div class="album_section">

        <?php foreach ($rapalbums as $rapalbum) : ?>

        <figure class="grid_1_of_5 ">
            <a href="/singleresult?albumid=<?= $rapalbum->id ?? " " ?>&artistid=<?= $rapalbum->artistId ?? '' ?>"
                title="<?=$rapalbum->getArtistId()->artist_name?>">
                <img class="images_1_of_5" width=100 height=100 src="/assets/databasepics/WEBP/<?= $rapalbum->image ?>"
                    alt="HipHopMusicAlbum">
            </a>
            <figcaption class="cap_1_of_5">
                <h3><?= $rapalbum->getArtistId()->artist_name ?></h3>
                <p><?= $rapalbum->genre ?></p>

            </figcaption>

        </figure>

        <?php endforeach; ?>

    </div>
    <div class="clearfix"></div>

    <!--Country Section-->
    <div class="album_section ">

        <?php foreach ($countryalbums as $countryalbum) : ?>

        <figure class="grid_1_of_5">
            <a href="/singleresult?albumid=<?= $countryalbum->id ?? '' ?>&artistid=<?= $countryalbum->artistId ?? '' ?>"
                title="<?=$countryalbum->getArtistId()->artist_name?>">
                <img class="images_1_of_5" src="/assets/databasepics/WEBP/<?= $countryalbum->image ?>"
                    alt="CountryMusicAlbum">
            </a>
            <figcaption class="cap_1_of_5">
                <h3><?= $countryalbum->getArtistId()->artist_name ?></h3>
                <p><?= $countryalbum->genre ?></p>
            </figcaption>
        </figure>

        <?php endforeach; ?>

    </div>
    <div class="clearfix"></div>

    <!--Jazz Section-->
    <div class="album_section">

        <?php foreach ($jazzalbums as $jazzalbum) : ?>

        <figure class="grid_1_of_5">
            <a href="/singleresult?albumid=<?= $jazzalbum->id ?? '' ?>&artistid=<?= $jazzalbum->artistId ?? '' ?>"
                title="<?=$jazzalbum->getArtistId()->artist_name?>">
                <img class="images_1_of_5" src="/assets/databasepics/WEBP/<?= $jazzalbum->image ?>"
                    alt="JazzMusicAlbum">
            </a>
            <figcaption class="cap_1_of_5">
                <h3><?= $jazzalbum->getArtistId()->artist_name ?></h3>
                <p><?= $jazzalbum->genre ?></p>
            </figcaption>
        </figure>

        <?php endforeach; ?>

    </div>
    <div class="clearfix"></div>

    <br />

</section>