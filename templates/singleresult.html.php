<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script src='assets/js/script.js'></script>

<?php

    $array = array();
    foreach ($singleaudio as $key => $value) {
        array_push($array, $value[0]);    }      
    $jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);
  
?>

<script>

   
    $(document).ready(function() {
        
        currentPlaylist = <?=$jsonArray?>;        
                        
            audioElement = new Audio();
            setTrack(currentPlaylist[0], currentPlaylist, false);                             
        
            //update volume add full width
            updateVolumeProgressBar(audioElement.audio);

            //prevents highlighting
            $("div.audio_controls").on("mousedown touchstart mousemove touchmove", function(e){
                e.preventDefault();
            });


            //drag progress bar 
            $("div.progress div.play_progress").mousedown(function() {
                mouseDown = true;
            });

            $("div.progress div.play_progress").mousemove(function(e) {
                if(mouseDown == true) {
                    //Set time of song, depending on position of mouse
                    timeFromOffset(e, this);
                }
            });

            $("div.progress div.play_progress").mouseup(function(e) {
                timeFromOffset(e, this);
            });


            //drag volume bar 
            $("div.audio_volume div.volume").mousedown(function() {
                mouseDown = true;
            });

            $("div.audio_volume div.volume").mousemove(function(e) {
                if(mouseDown == true) {

                    var percentage = e.offsetX / $(this).width();

                    if(percentage >= 0 && percentage <= 1) {
                        audioElement.audio.volume = percentage;
                    }
                }
            });

            $("div.audio_volume div.volume").mouseup(function(e) {

                var percentage = e.offsetX / $(this).width();

                if(percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }

            });

            //allows mouse up
            $(document).mouseup(function() {
                mouseDown = false;
            });            
                        
    });


    //us mouse to drag progress bar and change audio position
    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }


    //skip to previous song
    function prevSong() {
        if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
            audioElement.setTime(0);
        }
        else {
            currentIndex = currentIndex - 1;
            setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
            
        }
    }

    //skip to next song
    function nextSong() {
        
        if(currentIndex == currentPlaylist.length - 1) {
            currentIndex = 0;
        }
        else {
            currentIndex++;
        }

        var trackToPlay = currentPlaylist[currentIndex];
        setTrack(trackToPlay, currentPlaylist, true);

    }

    //repeat button need repeat button added
    // function setRepeat() {
    //     repeat = !repeat;
    //     var imageName = repeat ? "repeat-active.png" : "repeat.png";
    //     $(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
    // }

    //mute button need mute button added
    // function setMute() {
    //     audioElement.audio.muted = !audioElement.audio.muted;
    //     var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
    //     $(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName);
    // }

    // function setShuffle() {
    //     shuffle = !shuffle;
    //     var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
    //     $(".controlButton.shuffle img").attr("src", "assets/images/icons/" + imageName);

    //     if(shuffle == true) {
    //         //Randomize playlist
    //         shuffleArray(shufflePlaylist);
    //         currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
    //     }
    //     else {
    //         //shuffle has been deactivated
    //         //go back to regular playlist
    //         currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
    //     }

    // }

    // function shuffleArray(a) {
    //     var j, x, i;
    //     for (i = a.length; i; i--) {
    //         j = Math.floor(Math.random() * i);
    //         x = a[i - 1];
    //         a[i - 1] = a[j];
    //         a[j] = x;
    //     }
    // }

    //Set Audio tracks to to be played in tracklist
    function setTrack(trackId, newPlaylist, play) {

        if(newPlaylist != currentPlaylist) {
            currentPlaylist = newPlaylist;
            
        }

        // if(shuffle == true) {
        //     currentIndex = shufflePlaylist.indexOf(trackId);
        // }
        // else {
        //     currentIndex = currentPlaylist.indexOf(trackId);
        // }
        // pauseSong();

        //create tracklist index
        currentIndex = currentPlaylist.indexOf(trackId);  
        pauseSong();
             
                                                      
        //Get song IDs from Database
        $.post("getSongJson.php", { songId: trackId }, function(data) {            
                                                           
            var track = JSON.parse(data);

            $("div.audio_controls h1.trackName").text(track[0].songtitle)
                                        
            audioElement.setTrack(track);

            if(play == true) {
                playSong();
            }  
            
        });     
        
    }
        
   
    //Play song
    function playSong(){

        //track plays function needs ajax file updatePlays.php 
        //also Plays column in database audio table   
        // if(audioElement.audio.currentTime == 0) {
        //  $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
        // }
                

        $(".player-button.play").hide();
        $(".player-button.pause").show();        
        audioElement.play();  

    }

    //Pause Song
    function pauseSong(){
        
        $(".player-button.play").show();
        $(".player-button.pause").hide();
        audioElement.pause();
        
    }
    

</script> 

<section id="main_text" class="group">

    <h1>Albums</h1>         

    <div id="results">
            
        <div class="product-box-large">

            <figure class="product-info">

                <img src="assets/databasepics/<?=$singlealbums->image; ?>" alt="Album-Cover-Image" />

                <figcaption>
                    
                    <ul class="product-box-info">
                        <li>
                            <span>Artist </span>
                            <span><?=$singleartist[0][0];?></span>
                        </li>
                        <li>
                            <span>Album</span>
                            <span><?=$singlealbums->album; ?></span>
                        </li>
                        <li>
                            <span>Formats</span>
                            <span><?=$singlealbums->text; ?></span>
                        </li>
                        <li>
                            <span>Genre</span>
                            <span><?=$singlealbums->genre; ?></span>
                        </li>
                        <li>
                            <span>Price</span>
                            <span><?=$singlealbums->price; ?></span>
                        </li>                       
                        
                    </ul>

                </figcaption>

                    
            </figure>

            <!--Audio Controls-->
            <div class="audio_controls">

                <h1 class="trackName"></h1>

                <div class="audiocntrl_containers">

                    <div class="player-button shuffle" title="Shuffle button" >
                        <i class="fa fa-random" aria-hidden="true"></i>
					</div>
                    
                    <div class="player-button play" onclick="playSong()" >
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </div>
                                                            
                    <div class="player-button pause" style="display: none;" onclick="pauseSong()">
                        <i class="fa fa-pause" aria-hidden="true"></i>
                    </div>

                    <div class="player-button previous" onclick="prevSong()">
                    <i class="fa fa-step-backward" aria-hidden="true"></i>
                    </div>
                    <div class="player-button next" onclick="nextSong()" >
                    <i class="fa fa-step-forward" aria-hidden="true" ></i>
                    </div>
                    <div class="player-button repeat" title="Repeat button">
                    <i class="fa fa-repeat" aria-hidden="true"></i>
					</div>

                               
                
                    <!--add onclick="setMute() to change volume icon. need to add volume icon-->
                    <div class="audio_volume">
                        <div class="VolumeBg">
                            <div class="volume"></div>
                            <!--<input type="range" class="volume" title="volume" min="0" max="1" step="0.1" value="1">-->
                        </div>
                        <div class="VolumeImg">
                        <i class="fa fa-volume-up" aria-hidden="true" ></i>
                        </div>
                    </div>
                </div>

                <div class="audiocntrl_containers">
                    <div class="current_time">00:00</div> 
                    <div class="progress">                        
                        <div class="play_progress"></div>
                    </div>
                    <div class="duration">00:00</div>
                </div>

            </div>

            <br/>

            <!--Audio Playlist-->
            <ul class="audio-tracklist">                
                <?php
                                        
                    $i = 1;
                    
                foreach ($singleaudio as $songId => $value) :

                                                
                        echo "<li>
                            <span>Track " . $i . " : </span>
                            <span >" . $value[1] . "</span>
                            <span onclick='setTrack(\"" . $value[0] . "\", tempPlaylist, true)'><i class=\"fa fa-play\" aria-hidden=\"true\"></i> </span>
                        </li>";
                    
                        $i = $i + 1;
                                                

                endforeach;
                
                ?>
            </ul>

            <!--Temporary Play List-->
            <script>
                var tempSongIds = '<?= json_encode($value[0]); ?>';
                tempPlaylist = JSON.parse(tempSongIds); 
            </script>

        </div>

    <div>

<div>

<br />
</section>
