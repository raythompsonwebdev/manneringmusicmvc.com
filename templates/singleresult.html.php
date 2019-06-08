<?php

    include __DIR__ . '/../includes/DatabaseConnection.php';
    
   //$songQuery = query("SELECT id FROM audio LIMIT 10");

    //$resultArray = array();

    //while($row = fetch($songQuery)) {
    //    array_push($resultArray, $row['id']);
    //}

    //$jsonArray = json_encode($resultArray);
   
?>

<!--
<script>

    $(document).ready(function() {
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, false);
    });


    function setTrack(trackId, newPlaylist, play) {

        $.post("handlers/ajax/getSongJson.php", { audioId: trackId }, function(data) {

            var track = JSON.parse(data);
            $(".trackName span").text(track.title);

            //$.post("handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
            });

            //$.post("handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.artworkPath);
            });


            audioElement.setTrack(track.path);
            audioElement.play();
        });

        if(play == true) {
            audioElement.play();
        }
    }

    function playSong() {
        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }

</script>
-->

<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/audio.js"></script>
<section id="main_text" class="group">

    <h1>Albums</h1>

    <!--main text-->

    <div id="results">
        
            <div class="product-box-large">

                <figure class="product-box-img">

                    <img src="assets/databasepics/<?php echo $singlealbums->image; ?>" alt="Album-Cover-Image" />

                    <figcaption>

                        <ul class="product-box-info">
                            <li>
                                <span>Artist: </span>
                                <span><?php echo $singleartist->artist; ?></span>
                            </li>
                            <li>
                                <span>Album:</span>
                                <span><?php echo $singlealbums->album; ?></span>
                            </li>
                            <li>
                                <span>Formats:</span>
                                <span><?php echo $singlealbums->text; ?></span>
                            </li>
                            <li>
                                <span>Genre:</span>
                                <span><?php echo $singlealbums->genre; ?></span>
                            </li>
                            <li>
                                <span>Price:</span>
                                <span><?php echo $singlealbums->price; ?></span>
                            </li>
                            <li id="trackName">
                                <span>
                               Song Title
                                </span>
                                <?php //echo $singleaudio['songtitle']; ?>
                            </li>
                    
                            <?php
                                 
                                $songIds = $singleaudio->getSongId();
                                
                                var_dump($songIds);
                                $i = 1;
                                
                                foreach($songIds as $songId) :

                                    //var_dump($songId);
                                   // echo ',br/>';
                                   // $albumArtist = $singleaudio->getArtist();
                                   // $album = $singleaudio->getAlbum();
                                                                        

                                   // $i = $i + 1;



                              ?>

		                   
                            <li>
                                
                                <audio id="result_player" >
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<? ?>" type='audio/mpeg' />
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<?php  ?>" type='audio/ogg' />
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<?php  ?>" type='audio/mp4' />
                                    <p>Your browser does not support HTML5 audio.</p>
                                </audio>
                
                                <div id="audio_controls">
                                    <div id="play_toggle" class="player-button">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
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
                                                          

                            </li>

                            <?php 
                             $i = $i + 1;
                        
                        endforeach;?>
                            
                        </ul>

                    </figcaption>

                <div class="clearfix"></div>

                </figure>
                    
                         
           

            </div>

     
    <div>

<div>




<br />
</section>
<!--Main_text end-->