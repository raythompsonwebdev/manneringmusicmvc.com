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
      <button class="fancybox fancybox.iframe">See Video </button>
    
  </figcaption>
</figure>
<?php endforeach; ?>
<br/>

<!--Country Music videos-->

<h1>Country Music Videos</h1>

<figure class="project-item">
  <img src="/assets/images/videoimages/Newfolder/" alt="">
    <figcaption class="overlay">
    <h1 class="artist_name"></h1>
    <p class ="video_text"></p>
    <button class="fancybox fancybox.iframe">See Video </button>
    
  </figcaption>
</figure>

<br/>

<!--Jazz Music videos-->

<h1>Jazz Music Videos</h1>

<figure class="project-item">
  <img src="/assets/images/videoimages/Newfolder/" alt="">
    <figcaption class="overlay">
    <h1 class="artist_name"></h1>
    <p class ="video_text"></p>
    <button class="fancybox fancybox.iframe">See Video </button>
  
  </figcaption>
</figure>

<br/>

<div class="clearfix"> </div>

</article>

<br/><br/>

</section>

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<!-- Add fancyBox main JS and CSS files -->

<script src="/assets/js/fancyapps/source/jquery.fancybox.js" async></script>
<script src="/assets/js/fancyapps/source/jquery.fancybox.pack.js"></script>

<script>
    $(document).ready(function() {
      $("a.fancybox").fancybox({
        'transitionIn'    :    'elastic',
        'transitionOut'    :    'elastic',
        'speedIn'        :    600, 
        'speedOut'        :    200, 
        'overlayShow'    :    false
      });
    });

</script>