<!--main text-->
<section id="main_text" class="group">

<h1>Music Audio </h1>


<br/>
<!--container-->
<div class="container">

<!--tab menu-->
<ul id="tabs" class="clearfix">
    <li><a href="#">Hip Hop</a></li>
    <li><a href="#">Country</a></li>
    <li><a href="#">Jazz</a></li>
</ul>

<!--tab content-->
<div class="tab-content">

  <div class="tab">


<?php foreach ($rapalbums as $rapalbum) : ?>
    <article class="hiphop_panel">    

      <span class="hiphop_panel_text">
          <figure class="hiphop_panel_img">
              
              <img src="assets/databasepics/<?=$rapalbum['image']?>" alt="">
              
          </figure>

              <ul>
                  <li><?=$rapalbum['album']?></li>
                      <li><?=$rapalbum['artist']?></li>
                  <li>£</li>
              </ul>
          
      </span>

      <span class="social_aud">
        <a href="#" alt="twitter-icon"><i class="fa fa-twitter soc" title="twitter-icon"></i>
        </a>
        <a href="#" alt="twitter-icon"><i class="fa fa-facebook soc" title="facebook-icon"></i></a>
        <a href="#" alt="favourite-icon"><i class="fa fa-heart soc" title="favourite"></i></a>
      </span>

      <audio id="result_player" >
        <source src="#" type='audio/mpeg' />
        <source src="#" type='audio/ogg' />
        <source src="#" type='audio/mp4' />
        <p>Your browser does not support HTML5 audio.</p>
      </audio>
      
      <br/>
      <div id="audio_controls">
          
        <div id="play_toggle" class="player-button">
        <i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
        </div>
                  
        <div id="progress">
          <div id="load_progress"></div>
          <div id="play_progress"></div>
        </div>

        <div id="time">
          <div id="duration">00:00</div>  
          <div id="current_time">00:00</div>  
        </div>

      </div>

    </article>
<?php endforeach; ?>
   
  </div>

  <div class="tab">

  

    <?php foreach ($countryalbums as $countryalbum) : ?>  
    <article class="hiphop_panel">
      <span class="hiphop_panel_text">
        <figure class="hiphop_panel_img">
          <img src="assets/databasepics/<?=$countryalbum['image'];?>" alt="<?=$countryalbum['artist'];?>">
        </figure>

        <ul>
          <li><?=$countryalbum['album'];?></li>
            <li><?=$countryalbum['artist'];?></li>
          <li>£</li>
        </ul>
      </span>

      <span class="social_aud">
        <a href="#" alt="twitter-icon"><i class="fa fa-twitter soc" title="twitter-icon"></i>
        </a>
        <a href="#" alt="twitter-icon"><i class="fa fa-facebook soc" title="facebook-icon"></i></a>
        <a href="#" alt="favourite-icon"><i class="fa fa-heart soc" title="favourite"></i></a>
      </span>
      <audio id="result_player" >
          <source src="audio/" type='audio/mpeg' />
          <source src="audio/" type='audio/ogg' />
          <source src="audio/" type='audio/mp4' />
          <p>Your browser does not support HTML5 audio.</p>
      </audio>
      <br/>
      <div id="audio_controls">
            <div id="play_toggle" class="player-button">
            <i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
            </div>
            <div id="progress">
              <div id="load_progress"></div>
              <div id="play_progress"></div>
            </div>
            <div id="time">
              <div id="current_time">00:00</div>  
              <div id="duration">00:00</div>
            </div>
      </div>
    </article>
    <?php endforeach; ?>
  </div>

  <div class="tab">
 
    <?php foreach ($jazzalbums as $jazzalbum) : ?>
    <article class="hiphop_panel">

      <span class="hiphop_panel_text">
        <figure class="hiphop_panel_img">
          <img src="assets/databasepics/<?=$jazzalbum['image'];?>" alt="">
        </figure>

        <ul>
          <li><?=$jazzalbum['album'];?></li>
          <li><?=$jazzalbum['artist'];?></li>
          <li></li>
        </ul>
      </span>

      <span class="social_aud">
        <a href="#" alt="twitter-icon"><i class="fa fa-twitter soc" title="twitter-icon"></i>
        </a>
        <a href="#" alt="twitter-icon"><i class="fa fa-facebook soc" title="facebook-icon"></i></a>
        <a href="#" alt="favourite-icon"><i class="fa fa-heart soc" title="favourite"></i></a>
      </span>
      <audio id="result_player" >
        <source src="#" type='audio/mpeg' />
        <source src="#" type='audio/ogg' />
        <source src="#" type='audio/mp4' />
        <p>Your browser does not support HTML5 audio.</p>
      </audio>

      <br/>
      <div id="audio_controls">
            <div id="play_toggle" class="player-button">
            <i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
            </div>
            <div id="progress">
              <div id="load_progress"></div>
              <div id="play_progress"></div>
            </div>
            <div id="time">
              <div id="current_time">00:00</div>  
              <div id="duration">00:00</div>
            </div>
      </div>
    </article>
    <?php endforeach; ?>
    <div class="clearfix"></div>

  </div>

  <div class="clearfix"></div>

</div>

<div class="clearfix"></div>

</div>

<br/>
</section>
<!--Main_text end-->

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>
<script>
    
    jQuery(document).ready(function($) {

    //Stop if HTML5 video isn't supported
    if (!document.createElement('audio').canPlayType) {
        $("#audio_controls").hide();
        return;
    }
        
    var audio = document.getElementById("result_player");

    // Play/Pause ============================//
    $("#play_button").bind("click", function(){
        $(this).audio.play();
    });

    $("#pause_button").bind("click", function(){
        $(this).audio.pause();
    });

    $("#play_toggle").on("click", function(){
        if (audio.paused) {
        audio.play();
        $(this).html('<i class="fa fa-pause" aria-hidden="true" title="Pause"></i>');
        } else {
        audio.pause();
        $(this).html('<i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>');
        }
    });

    // Play Progress ============================//
    $(audio).bind("timeupdate", function(){
        var timePercent = (this.currentTime / this.duration) * 100;
        $("#play_progress").css({ width: timePercent + "%" });
    });

    // Load Progress ============================//
    $(audio).bind("progress", function(){
        updateLoadProgress();
    });
    $(audio).bind("loadeddata", function(){
        updateLoadProgress();
    });
    $(audio).bind("canplaythrough", function(){
        updateLoadProgress();
    });
    $(audio).bind("playing", function(){
        updateLoadProgress();
    });
    
    function updateLoadProgress() {
        if (audio.buffered.length > 0) {
        var percent = (audio.buffered.end(0) / audio.duration) * 100;
        $("#load_progress").css({ width: percent + "%" })
        }
    }
    
    // Time Display =============================//
    $(audio).bind("timeupdate", function(){
        $("#current_time").html(formatTime(this.currentTime));
    });
    $(audio).bind("durationchange", function(){
        $("#duration").html(formatTime(this.duration));
    });
    
    function formatTime(seconds) {
        var seconds = Math.round(seconds);
        var minutes = Math.floor(seconds / 60);
        // Remaining seconds
        seconds = Math.floor(seconds % 60);
        // Add leading Zeros
        minutes = (minutes >= 10) ? minutes : "0" + minutes;
        seconds = (seconds >= 10) ? seconds : "0" + seconds;
        return minutes + ":" + seconds;
    }

    });//end of jquery

</script>

<script >

    $(document).ready(function(){

            $('.tab:first').show()
            $('#tabs li a:first').addClass('tab-active');


            $("#tabs li a").hover(
            function () {
            $(this).animate({left:20}, 300, function (){
                $(this).animate({left:0}, 50);
            });
        },
        function () {
        }
        );

        $('ul#tabs li a').bind('click',function () {
            var linkIndex = $('ul#tabs li a').index(this);
            $('ul#tabs li a').removeClass('tab-active');
            $(".tab:visible").hide();
            $(".tab:eq("+linkIndex+")").show();
            $(this).addClass('tab-active');
            return false;
        });

    });

</script>
