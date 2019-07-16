<link rel="stylesheet" href="assets/fancyapps/source/jquery.fancybox.css" >

<section id="main_text" class="group">

<h1>Music Videos</h1>
<p>Watch classic and the latest Hip Hop, Jazz and Country music videos from a wide selection of music videos.</p>
<br/>

<article class="sidebar_gallery"  >

<!--hip hop videos-->
<h1>Hip Hop Music Videos</h1>
<?php //var_dump($rapvideos); ?>

<?php foreach($rapvideos as $rapvideo) : ?>
<figure class="project-item">
  <img src="/assets/images/videoimages/Newfolder/<?php echo $rapvideo->video_image; ?>" alt="">
    <figcaption class="overlay">
      <h1 class="artist_name"><?php echo $rapvideo->video_artist; ?> </h1>
      <p class="video_text"></p>
      <a class="fancybox fancybox.iframe" href="<?php echo $rapvideo->video_link; ?>" ?>See Video </a>
  </figcaption>
</figure>
<?php endforeach; ?>
<br/>

<!--Country Music videos-->

<h1>Country Music Videos</h1>
<?php foreach($countryvideos as $countryvideo) : ?>
<figure class="project-item">
  <img src="/assets/images/videoimages/Newfolder/<?php echo $countryvideo->video_image; ?>" alt="">
    <figcaption class="overlay">
      <h1 class="artist_name"><?php echo $countryvideo->video_image; ?></h1>
      <p class ="video_text"></p>
      <a class="fancybox fancybox.iframe" href="<?php echo $countryvideo->video_link; ?>">See Video </a>
      
  </figcaption>
</figure>
<?php endforeach; ?>
<br/>

<!--Jazz Music videos-->

<h1>Jazz Music Videos</h1>
<?php foreach($jazzvideos as $jazzvideo) : ?>
<figure class="project-item">
  <img src="/assets/images/videoimages/Newfolder/<?php echo $jazzvideo->video_image; ?>" alt="">
    <figcaption class="overlay">
      <h1 class="artist_name"><?php echo $jazzvideo->video_image; ?></h1>
      <p class ="video_text"></p>
      <a class="fancybox fancybox.iframe" href="<?php echo $jazzvideo->video_link; ?>">See Video </a>
    
    </figcaption>
</figure>
<?php endforeach; ?>
<br/>

<div class="clearfix"> </div>

</article>

<br/><br/>

</section>

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<!-- Add fancyBox main JS and CSS files -->

<script src="assets/fancyapps/source/jquery.fancybox.js" ></script>
<script src="assets/fancyapps/source/jquery.fancybox.pack.js"></script>

<script>
    $(document).ready(function() {
      $(".fancybox").fancybox({
        'transitionIn'    :    'elastic',
        'transitionOut'    :    'elastic',
        'speedIn'        :    600, 
        'speedOut'        :    200, 
        'overlayShow'    :    false
      });
    });

</script>