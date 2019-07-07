<script src="assets/js/jquery-3.4.1.js"></script>

<script src="assets/js/audio.js"></script>


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

                            print_r($value); 

                        ?>


                                                                    
                            <audio>
                                <source src="" type='audio/mpeg' />
                                <source src="" type='audio/ogg' />
                                <source src="" type='audio/mp4' />
                                <p>Your browser does not support HTML5 audio.</p>
                            </audio>


                            
                            <ul>
                                <li>
                                   
                                    <div id="audio_controls">
                                        <div id="play_toggle" class="player-button" >
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                                        </div>
                                                                                
                                        <div class="player-button" >Previous</div>
                                        <div class="player-button" >Next</i></div>
                                       
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