<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script src='assets/js/script.js'></script>

<?php

    $array = array();
    foreach ($singleaudio as $key => $value) {
        array_push($array, $value[0]);
    }
    $jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);
  
?>

<script>
   
    $(document).ready(function() {

        //create seprate playlists for shuffle        
        var newPlaylist = <?php echo $jsonArray; ?>; 
        audioElement = new Audio(); //instance of audio class
        setTrack(newPlaylist[0], newPlaylist, false); //audio class func 
        //update volume add full width
        updateVolumeProgressBar(audioElement.audio); //audio class func

        var prevHighlight = document.querySelector('div.audio_controls');
        var progressBar = document.querySelector('div.progress div.play_progress');

        prevHighlight.addEventListener("mousedown touchstart mousemove touchmove", function(e){
        e.preventDefault();
        });     

        progressBar.addEventListener("mousedown", function(e){
            mouseDown = true;
        });

        progressBar.addEventListener("mousemove", function(e) {
            if(mouseDown == true) {
                //Set time of song, depending on position of mouse using timeFromOffset function below
                timeFromOffset(e, this);
            }
        });
        
        progressBar.addEventListener("mouseup",function(e) {
            timeFromOffset(e, this);
        });


        $("div.audio_volume div.volume").mousedown(function() {
            mouseDown = true;
        });
        
        $("div.audio_volume div.volume").mousemove(function(e) {
            if(mouseDown == true) {

                var percentage = e.offsetX / $(this).width(); //this = div.audio_volume div.volume

                //limits volume range to bewteen 0 and 1
                if(percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }
            }
        });

        $("div.audio_volume div.volume").mouseup(function(e) {

            var percentage = e.offsetX / $(this).width(); //this = div.audio_volume div.volume

            if(percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }

        });

        $(document).mouseup(function() {
            mouseDown = false;
        }); 

                    
                        
    });

    //us mouse to drag progress bar and change audio position
    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds); //audio class func
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
        //shuffle
        if(repeat == true) {
            audioElement.setTime(0);
            playSong();
            return;
        }
        
        if(currentIndex == currentPlaylist.length - 1) {
            currentIndex = 0;
        }
        else {
            currentIndex++;
        }
        

    }

   
    //repeat button need repeat button added
    function setRepeat() {
        repeat = !repeat;        
        //using font awesome instead of image
        imageName = repeat ? "green" : "red";        
        document.querySelector("i.fa-repeat").style.color = imageName ;        
    }

    //set mute button
    function setMute() {
        audioElement.audio.muted = !audioElement.audio.muted;
        var imageName = audioElement.audio.muted ? "green" : "red";       
        document.querySelector("i.fa-volume-up").style.color = imageName ;
    }
      
    
    //Set Audio tracks to to be played in tracklist
    function setTrack(trackId, newPlaylist, play) {

        // if(newPlaylist != currentPlaylist) {
        //     currentPlaylist = newPlaylist;

        // }

        
        //create tracklist index
        currentIndex = currentPlaylist.indexOf(trackId); 

        pauseSong();


        //get tracks from database
        let url = 'getSongJson.php';
        let formData = new FormData();
        formData.append( "songId", trackId );

        fetch(url, { 
            method: 'POST',            
            body: formData

        }).then(function (response) {

            return response.text();

        }).then(function (body) {

            var track = JSON.parse(body);

            document.querySelector("div.audio_controls h1.trackName").textContent = track[0].songtitle ;

            audioElement.setTrack(track);

            if(play == true) {
                 playSong();
            } 

        }).catch(function(err) {
            console.error('Fetch Error :-S', err);
        }); 
        
    }        
   
    //Play song
    function playSong(){
        console.log(audioElement)
        //track plays function needs ajax file updatePlays.php 
        if(audioElement.audio.currentTime == 0) {
            //get tracks from database
            let url = 'updatePlays.php';
            let formData = new FormData();
            formData.append( "songId", audioElement.currentlyPlaying.id );                       

            fetch(url, { 
                method: 'POST',            
                body: formData

            }).then(function (response) {

                return response.text();

            }).catch(function(err) {
                console.error('Fetch Error :-S', err);
            }); 
        
        }                

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

    <h1>Artist</h1>         

    <div id="results">
            
    <div class="product-box-large">

        <h1><?=$singleartist[0][1];?></h1>

        <!-- <button id="artist_btn" onclick="firstSong()">Play</button> -->
       <!--Audio Controls-->
       <div class="audio_controls">
            
            <h1 class="trackName"></h1>                

            <div class="audiocntrl_containers">
                                
                <div role="button" tabindex="0"  class="player-button play" onclick="playSong()" >
                    <i class="fa fa-play" aria-hidden="true" title="play"></i>
                </div>
                                                        
                <div role="button" tabindex="0"  class="player-button pause" style="display: none;" onclick="pauseSong()">
                    <i class="fa fa-pause" aria-hidden="true" title="pause"></i>
                </div>               

                <div role="button" tabindex="0"  class="player-button repeat" onclick="setRepeat()">
                    <i class="fa fa-repeat" aria-hidden="true" title="repeat"></i>
                </div>

                           
            
                <!--add onclick="setMute() to change volume icon. need to add volume icon-->
                <div class="audio_volume">
                    <div class="VolumeBg">
                        <div class="volume"></div>
                        <!--<input type="range" class="volume" title="volume" min="0" max="1" step="0.1" value="1">-->
                    </div>
                    <div class="VolumeImg" onclick="setMute()" role="button" tabindex="0">
                        <i class="fa fa-volume-up" aria-hidden="true" title="mute"></i>
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
        <br/>
        
        <!--Audio Playlist-->
        <ul class="audio-tracklist">                
            <?php
                                    
                $i = 1;
                
            foreach ($singleaudio as $songId => $value) :
                   
                                                                
                    echo "<li>
                    
                        <span>Track " . $i . " : </span>
                        <span >" . $value[1] . "</span>
                        <span onclick='setTrack(\"" . $value[0] . "\", tempPlaylist, true)''><i class=\"fa fa-play\" aria-hidden=\"true\"></i> </span>
                    </li>";
                
                    $i = $i + 1;
            endforeach;
            
            ?>
        </ul>            

        <!--Temporary Play List-->
        <script>
            //songId value from value of $singleaudio variable
            var tempSongIds = <?= json_encode($value[0]); ?>;
            tempPlaylist = JSON.parse(tempSongIds); 

            console.log(tempPlaylist)
        </script>

    </div>

        <h2> Other Albums</h2> 
    <?php foreach ($singlealbums as $value) :?>

        <div class="product-box">

            <figure class="product-info">
                <a href="/singleresult?artistid=<?=$value[3]?>&albumid=<?=$value[0]?>">
                <img src="assets/databasepics/<?=$value[2];?>" alt="Album-Cover-Image"  /></a>                
                
                <figcaption >
                    
                    <ul class="product-box-info">
                        <li><?=$value[1];?></li>
                    </ul>
                    
                </figcaption>
        
            </figure>              
            
        </div>
        
    <?php endforeach;?>
         

    <div>

<div>

<br />
</section>
