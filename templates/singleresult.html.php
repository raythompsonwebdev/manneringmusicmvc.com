<?php

    include __DIR__ . '/../includes/DatabaseConnection.php';
    
  
   
?>


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
                                 
                                                                
                                $songIdArray = $singlealbums->getAudioId();                                
                                                                                               
                                

                                $i = 1;
                                
                                foreach($songIdArray as $songIds ) :
                                                                                                                             
                                                                                                                               
                                    echo $singleartist->artist .'<br/>';
                                    echo $singlealbums->album .'<br/>';

                                    $songTitle = implode('', $singlealbums->getSongTitle($songIds)); 
                                                                       
                                    echo $songTitle;
                                     
                            ?>

		                                           
                                
                                <audio id="result_player" >
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<?php echo $singleaudio->mp3_File; ?>" type='audio/mpeg' />
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<?php echo $singleaudio->ogg_File; ?>" type='audio/ogg' />
                                    <source src="http://site.test/www/mannering.musicmvc.com/audio/<?php echo $singleaudio->mp4_File; ?>" type='audio/mp4' />
                                    <p>Your browser does not support HTML5 audio.</p>
                                </audio>

                                <ul>
                                <li>
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