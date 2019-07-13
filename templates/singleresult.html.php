<!--<script src="assets/js/jquery-3.4.1.js"></script>-->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>

<?php
    
    $array = array();

	foreach($singleaudio as $key => $value) {

        var_dump($value[0]);

		array_push($array, $value[0]);
	}
    
    $jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);

    print_r($array);

?>

<script>

   
    $(document).ready(function() {
        
        currentPlaylist = <?=$jsonArray?>;

        console.log('Current Playlist: ' + currentPlaylist[0]);
        
        audioElement = new Audio();
                                        
        console.log(audioElement);
                
        setTrack(currentPlaylist[0], currentPlaylist, false);
                        
    });

    function setTrack(trackId, newPlaylist, play) {
       
        //console.log(trackId);         
      
                   
         $.post("getSongJson.php", { songId: trackId }, function(data) {

            console.log('**getSongJson Data: ' + data);
                                                
            var track = JSON.parse(data);
                    
            //console.log(track[0].mp3_File);
                            
            audioElement.setTrack(track);
            
            //audioElement.play();
                       
            
         });
        
       
        if(play) {

            audioElement.play();

        }


    }

        
   
    function playSong(){
                
        $(".player-button.play").hide();
        $(".player-button.pause").show();
        audioElement.play();  

    }


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
                                        
                        <?php
                                                
                            $i = 1;
                            foreach($singleaudio as $songId => $value) :
                                
                            //$jsonArray = json_encode($value, JSON_UNESCAPED_SLASHES);

                            print_r($value[1]); 

                        ?>
                            
                            <ul>
                                <li>
                                   
                                    <div id="audio_controls">

                                        <div class="player-button play" onclick="playSong()" >
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </div>
                                                                                
                                        <div class="player-button pause" style="display: none;" onclick="pauseSong()">
                                            <i class="fa fa-pause" aria-hidden="true"></i>
                                        </div>

                                        <div class="player-button previous" >Previous</div>
                                        <div class="player-button next" >Next</div>
                                       
                                        <div id="progress">
                                            <div id="load_progress"></div>
                                            <div id="play_progress"></div>
                                        </div>

                                        <div id="time">
                                            <div id="current_time">00:00</div>  
                                            <div id="duration">00:00</div>
                                        </div>
                                        <div id="audio_volume">
                                            
                                            <input type="range" id="volume" title="volume" min="0" max="1" step="0.1" value="1">
                                        </div>
                                    </div>

                                </li>
                            </ul>
                       
                        <?php 
                           
                           $i = $i + 1;
                    
                            endforeach;
                          
                        ?>
                        
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