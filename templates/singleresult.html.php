<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>
<script src="assets/js/script.js"></script>

<?php
    
    $array = array();

	foreach($singleaudio as $key => $value) {

        var_dump($value[0]);

		array_push($array, $value[0]);
	}
    
    $jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);

    //print_r($array);

?>

<script>

   
    $(document).ready(function() {
        
        currentPlaylist = <?=$jsonArray?>;

        console.log('Current Playlist: ' + currentPlaylist[0]);
        
        audioElement = new Audio();
                                        
        console.log(audioElement);

                
        setTrack(currentPlaylist[0], currentPlaylist, false);

        
        //update volume
        updateVolumeProgressBar(audioElement.audio);


        //prevents highlighting
        $(".product-box-img div.audio_controls").on("mousedown touchstart mouseover touchmove", function(e){
            e.preventDefault();
        })


        //drag progress bar to forward audio
        $("div.progress .play_progress").mousedown(function() {
		    mouseDown = true;
        });

        $("div.progress .play_progress").mousemove(function(e) {
            if(mouseDown == true) {
                //Set time of song, depending on position of mouse
                timeFromOffset(e, this);
            }
        });

        $("div.progress .play_progress").mouseup(function(e) {
            timeFromOffset(e, this);
        });


        //drag volume bar to reduce level on volume
        $("div.audio_volume .volume").mousedown(function() {
		    mouseDown = true;
        });

        $("div.audio_volume .volume").mousemove(function(e) {
            if(mouseDown == true) {

                var percentage = e.offsetX / $(this).width();

                if(percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }
            }
        });

        $("div.audio_volume .volume").mouseup(function(e) {

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

            $("div.audio_controls div.trackname").text(track[0].songtitle)
                                        
            audioElement.setTrack(track);

            audioElement.play();  
            
         });
        
        //set audio to be played
        if(play) {

            audioElement.play();

        }


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

                <img src="assets/databasepics/<?php echo $singlealbums->image; ?>" alt="Album-Cover-Image" />

                <figcaption>

                    <ul class="product-box-info">
                        <li>
                            <span>Artist: </span>
                            <span><?php echo $singleartist->artist_name; ?></span>
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
                         
                        
                    </ul>

                    <div class="audio_controls">

                    <div class="trackname"></div>

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

                            </div>
                            <div class="VolumeImg">
                            <i class="fa fa-volume-up" aria-hidden="true" ></i>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="load_progress"></div>
                            <div class="play_progress"></div>
                        </div>

                        <div class="time">
                            <div class="current_time">00:00</div>  
                            <div class="duration">00:00</div>
                        </div>


                    </div>
    <br/>
                    <ul class="product-box-info">                
                        <?php
                                                
                            $i = 1;
                            foreach($singleaudio as $songId => $value) :
                                
                            //$jsonArray = json_encode($value, JSON_UNESCAPED_SLASHES);

                            //print_r($value[1]); 

                            echo "<li>

                                <span>Trackname:$i </span>
                                <span onclick='setTrack(\"" . $value[0] . "\", tempPlaylist, true)'>" . $value[1] . "</span>
                            
                            </li>";
                        
                            $i = $i + 1;
                    
                            endforeach;
                        
                        ?>
                    </ul>


                    <script>
                        var tempSongIds = '<?php echo json_encode($value[0]); ?>';
                        tempPlaylist = JSON.parse(tempSongIds);
                        
                        console.log('Templaylist: ' + tempPlaylist);
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