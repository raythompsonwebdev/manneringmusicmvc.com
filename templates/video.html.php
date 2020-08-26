<link rel="stylesheet" href="assets/fancyapps/source/jquery.fancybox.css" >

<section id="main_text" class="group">

  <h1>Videos</h1>

    <br/>
</section>
<section id="sidebar_gallery"  >

  <!--hip hop videos-->
  <?php foreach ($rapvideos as $rapvideo) : ?>
  <figure class="video-item">
    <img src="/assets/images/videoimages/Newfolder/<?php echo $rapvideo->video_image; ?>" alt="">
      <figcaption class="overlay">
        <h1 class="artist_name"><?php echo $rapvideo->video_artist; ?> </h1>
        
        <a class="fancybox fancybox.iframe" href="<?php echo $rapvideo->video_link; ?>" ?>See Video </a>
    </figcaption>
  </figure>
  <?php endforeach; ?>
  <br/>

  <!--Country Music videos-->  
  <?php foreach ($countryvideos as $countryvideo) : ?>
  <figure class="video-item">
    <img src="/assets/images/videoimages/Newfolder/<?php echo $countryvideo->video_image; ?>" alt="">
      <figcaption class="overlay">
        <h1 class="artist_name"><?php echo $countryvideo->video_image; ?></h1>
        
        <a class="fancybox fancybox.iframe" href="<?php echo $countryvideo->video_link; ?>">See Video </a>
        
    </figcaption>
  </figure>
  <?php endforeach; ?>
  <br/>

  <!--Jazz Music videos-->
  <?php foreach ($jazzvideos as $jazzvideo) : ?>
  <figure class="video-item">
    <img src="/assets/images/videoimages/Newfolder/<?php echo $jazzvideo->video_image; ?>" alt="">
      <figcaption class="overlay">
        <h1 class="artist_name"><?php echo $jazzvideo->video_image; ?></h1>
        
        <a class="fancybox fancybox.iframe" href="<?php echo $jazzvideo->video_link; ?>">See Video </a>
      
      </figcaption>
  </figure>
  <?php endforeach; ?>
  <br/>

  <div class="clearfix"> </div>

</section>

<br/><br/>



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
