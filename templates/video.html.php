<link rel="stylesheet" href="assets/fancyapps/source/jquery.fancybox.css">

<section id="main_section" class="group">

    <h1>Videos</h1>

    <br />
</section>
<section id="sidebar_gallery">

    <!--hip hop videos-->

    <?php foreach ($rapvideos as $rapvideo) : ?>
    <figure class="video-item">
        <img src="/assets/images/videoimages/Newfolder/<?= $rapvideo->video_image; ?>" alt="">
        <figcaption class="overlay">
            <h2 class="artist_name"><?= $rapvideo->video_artist; ?> </h1>

                <a class="fancybox fancybox.iframe" href="<?= $rapvideo->video_link; ?>" ?>See Video </a>
        </figcaption>
    </figure>
    <?php endforeach; ?>
    <br />

    <!--Country Music videos-->
    <?php foreach ($countryvideos as $countryvideo) : ?>
    <figure class="video-item">
        <img src="/assets/images/videoimages/Newfolder/<?= $countryvideo->video_image; ?>" alt="">
        <figcaption class="overlay">
            <h2 class="artist_name"><?= $countryvideo->video_image; ?></h1>

                <a class="fancybox fancybox.iframe" href="<?= $countryvideo->video_link; ?>">See Video </a>

        </figcaption>
    </figure>
    <?php endforeach; ?>
    <br />

    <!--Jazz Music videos-->
    <?php foreach ($jazzvideos as $jazzvideo) : ?>
    <figure class="video-item">
        <img src="/assets/images/videoimages/Newfolder/<?= $jazzvideo->video_image; ?>" alt="">
        <figcaption class="overlay">
            <h2 class="artist_name"><?= $jazzvideo->video_image; ?></h1>

                <a class="fancybox fancybox.iframe" href="<?= $jazzvideo->video_link; ?>" title="">
                    See Video
                </a>
        </figcaption>
    </figure>
    <?php endforeach; ?>
    <br />




    <div class="clearfix"> </div>

</section>

<br /><br />





<!-- Add fancyBox main JS and CSS files -->

<script src="assets/fancyapps/source/jquery.fancybox.js"></script>
<script src="assets/fancyapps/source/jquery.fancybox.pack.js"></script>

<script>
$(document).ready(function() {
    $(".fancybox").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });
});
</script>