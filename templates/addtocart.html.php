<section id="main_text" class="group">

    <h1>Cart </h1>

    <!--main text-->

    <div id="results">

        <?php 

            include __DIR__ . '/../includes/DatabaseConnection.php';
             
        ?>

            <div class="product-box-large">

                <figure class="product-box-img">

                    <img src="assets/databasepics/<?php echo $singlealbums['image']; ?>" alt="Album-Cover-Image" />

                    <figcaption>

                        <ul class="product-box-info">
                            <li>
                                <span>Artist: </span>
                                <span><?php echo $singlealbums['artistid']; ?></span>
                            </li>
                            <li>
                                <span>Album:</span>
                                <span><?php echo $singlealbums['album']; ?></span>
                            </li>
                            <li>
                                <span>Formats:</span>
                                <span><?php echo $singlealbums['text']; ?></span>
                            </li>
                            <li>
                                <span>Genre:</span>
                                <span><?php echo $singlealbums['genre']; ?></span>
                            </li>
                            <li>
                                <span>Price:</span>
                                <span><?php echo $singlealbums['price']; ?></span>
                            </li>
                            <li>
                                <!-- <audio id="result_player" >
                                    <source src="audio/" type='audio/mpeg' />
                                    <source src="audio/" type='audio/ogg' />
                                    <source src="audio/" type='audio/mp4' />
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
                                </div>-->
                            </li>
                        </ul>

                    </figcaption>

                <div class="clearfix"></div>

                </figure>

                <form method="get" action="/addtocart" id="cartbtn">
                    <input type="hidden" name="albumid" value="<?=$singlealbums['albumid'] ?? ''?>">
					<input type="submit" name="submit" class="cartbtn" value="Go to Cart"/>
                </form>

            </div>

     
    <div>

<div>




<br />
</section>
<!--Main_text end-->