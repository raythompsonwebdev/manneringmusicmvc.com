<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>
<script src="assets/js/script.js"></script>


<?php
    
    $array = array();

	foreach($singleaudio as $key => $value) {

        
		array_push($array, $value[0]);
	}
    
    $jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);

    

?>

<script>

   
    $(document).ready(function() {
        
        currentPlaylist = <?=$jsonArray?>;
                
        audioElement = new Audio();
                                        
      
        //update volume
        updateVolumeProgressBar(audioElement.audio);
                
        setTrack(currentPlaylist[0], currentPlaylist, false);


        //prevents highlighting
        $("div.audio_controls").on("mousedown mouseover", function(e){
            e.preventDefault();
        })


        //drag progress bar to forward audio
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


        //drag volume bar to reduce level on volume

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


    //drag progress bar to forward audio
    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }


    //scroll to previous song
    function prevSong() {
        if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
            audioElement.setTime(0);
        }
        else {
            currentIndex = currentIndex - 1;
            setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
            
        }
    }


    //scroll to next song
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

    //Set Audio tracks to to be played
    function setTrack(trackId, newPlaylist, play) {

        if(newPlaylist != currentPlaylist) {
            currentPlaylist = newPlaylist;
            
        }

        //create playlist index
        currentIndex = currentPlaylist.indexOf(trackId);  
        pauseSong();           
                   
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

            <figure class="product-box-img">

                <img src="assets/databasepics/<?=$singlealbums->image; ?>" alt="Album-Cover-Image" />

                <figcaption>
                <pre></pre>
                    <ul class="product-box-info">
                        <li>
                            <span>Artist: </span>
                            <span><?= $singleartist[0][0]; ?></span>
                        </li>
                        <li>
                            <span>Album:</span>
                            <span><?=$singlealbums->album; ?></span>
                        </li>
                        <li>
                            <span>Formats:</span>
                            <span><?=$singlealbums->text; ?></span>
                        </li>
                        <li>
                            <span>Genre:</span>
                            <span><?=$singlealbums->genre; ?></span>
                        </li>
                        <li>
                            <span>Price:</span>
                            <span><?=$singlealbums->price; ?></span>
                        </li>
                         
                        
                    </ul>

                    <div class="audio_controls">

                    <h1 class="trackName"></h1>

                    <div class="audiocntrl_containers">

                        
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
                            <!--<div class="load_progress"></div>-->
                            <div class="play_progress"></div>
                        </div>
                        <div class="duration">00:00</div>


                        <!--<div class="time"></div>-->

                    </div>

                    </div>
    <br/>
                    <ul class="audio-tracklist">                
                        <?php
                                                
                            $i = 1;
                            foreach($singleaudio as $songId => $value) :
                             

                            echo "<li>

                                <span>Track " . $i . " : </span>
                                <span >" . $value[1] . "</span>
                                <span onclick='setTrack(\"" . $value[0] . "\", tempPlaylist, true)'><i class=\"fa fa-play\" aria-hidden=\"true\"></i> </span>
                            </li>";
                        
                            $i = $i + 1;
                    
                            endforeach;
                        
                        ?>
                    </ul>


                    <script>
                        var tempSongIds = '<?php echo json_encode($value[0]); ?>';
                        tempPlaylist = JSON.parse(tempSongIds);
                        
                        
                    </script>
                </figcaption>

                <div class="clearfix"></div>

            </figure>

        </div>

<div>

<div>

<br />
</section>
<!--Main_text end-->