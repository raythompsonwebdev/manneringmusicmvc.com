<?php  ?>

<!--Slider-->
<section id="slider">
  
    <article id="pageContainer">
    <ul class="bxslider">

        <li>
        <article class="slider-text">
            <h1>CLEARANCE <span>SALE</span></h1>
            <h2>UP TO 10&#37; OFF</h2>
                <div class="features_list">
                    <h3>Check out our end of season sale on the latest Hip Hop music from our vast collection.</h3>
                </div>
                <a href="#" class="button">Shop Now</a>
            <br/>
            </article>
        <img src="assets/images/sliderimages/manneringhiphop.png" alt="hip-hop-albums"/>
        </li>

        <li>
        <article class="slider-text">
            <h1>CLEARANCE<span>SALE</span></h1>
            <h2>UP TO 10&#37; OFF</h2>
                <div class="features_list">
                    <h3>Check out our end of season sale on the latest Jazz music from our vast collection.</h3> 
                </div>
            <a href="#" class="button">Shop Now</a>
            </article>
        <img src="assets/images/sliderimages/manneringjazz.png" alt="jazz-albums"/>
        </li>

        <li>
        <article class="slider-text">
            <h1>CLEARANCE<span>SALE</span></h1>
            <h2>UP TO 10&#37; OFF</h2>
                <div class="features_list">
                    <h3>Check out our end of season sale on the latest Country music from our vast collection.</h3> 
                </div>
            <a href="#" class="button">Shop Now</a>
            </article>
        <img src="assets/images/sliderimages/manneringcountry.png" alt="country-albums"/>
        </li>

        <li>
        <article class="slider-text">
            <h1>CLEARANCE<span>SALE</span></h1>
            <h2>UP TO 10&#37; OFF</h2>
                <div class="features_list">
                    <h3>Check out our end of season sale on the latest Jazz music albums from our vast collection.</h3>
                </div>
            <a href="#" class="button">Shop Now</a>
            </article>
        <img src="assets/images/sliderimages/manneringjazz.png" alt="hip-hop-albums"/>
        </li>
    </ul>

    </article>
 
</section>

<!--main text-->
<section id="main_text" role="main" >

    <h1>Welcome to Mannering Music</h1>

    <!--Hip Hop Section-->
    <article class="section">
        <h1>Featured Hip Hop Albums</h1>
        <?php foreach ($rapalbums as $rapalbum) : ?>
                <div class="flex-wrapper">

                    <figure class="grid_1_of_5 ">

                        <img class="images_1_of_5" src="/assets/databasepics/<?=$rapalbum->image?>" alt="HipHopMusicAlbum">

                        <figcaption class="cap_1_of_5">
                            <h3><?=$rapalbum->getArtistName()->artist_name?></h3>
                                <p><?=$rapalbum->album?></p>
                            <h4>&#163;<?=$rapalbum->price?></h4>
                            <!-- commented out for now.-->
                            <form method="get" action="/singleresult" id="frontform">
                                <input type="hidden" name="artistid" value="<?=$rapalbum->artistid ?? ''?>">
                                <input type="hidden" name="albumid" value="<?=$rapalbum->albumid ?? ''?>">
                                <input type="submit" name="submit" class="frontform" value="See more.."/>
                            </form>
                        </figcaption>
                    
                    </figure>

                </div>
        <?php endforeach; ?>
    </article>
    <div class="clearfix"></div>

    <!--Country Section-->
    <article class="section ">
        <h1>Featured Country Albums</h1>
        <?php foreach ($countryalbums as $countryalbum) : ?>
            <div class="flex-wrapper">
                <figure class="grid_1_of_5">

                    <img class="images_1_of_5" src="/assets/databasepics/<?=$countryalbum->image?>" alt="CountryMusicAlbum">

                    <figcaption class="cap_1_of_5">
                        <h3><?=$countryalbum->getArtistName()->artist_name?></h3>
                        <p><?=$countryalbum->album?></p>
                        <h4> &#163;<?=$countryalbum->price?></h4>
                        <form method="get" action="/singleresult" id="frontform">
                            <input type="hidden" name="artistid" value="<?=$countryalbum->artistid ?? ''?>">
                            <input type="hidden" name="albumid" value="<?=$countryalbum->albumid ?? ''?>">
                            <input type="submit" name="submit" class="frontform" value="See more.."/>
                        </form>
                    </figcaption>
                </figure>

            </div>
        <?php endforeach; ?>
    </article>
    <div class="clearfix"></div>

    <!--Jazz Section-->
    <article class="section">
        <h1>Featured Jazz Albums</h1>
        <?php foreach ($jazzalbums as $jazzalbum) : ?>
            <div class="flex-wrapper">
                <figure class="grid_1_of_5">

                    <img class="images_1_of_5" src="/assets/databasepics/<?=$jazzalbum->image?>" alt="JazzMusicAlbum">
                    <figcaption class="cap_1_of_5">
                        <h3><?=$jazzalbum->getArtistName()->artist_name?></h3>
                        <p><?=$jazzalbum->album?></p>
                        <h4>&#163;<?=$jazzalbum->price?></h4>
                        <form method="get" action="/singleresult" id="frontform">
                            <input type="hidden" name="artistid" value="<?=$jazzalbum->artistid ?? ''?>">
                            <input type="hidden" name="albumid" value="<?=$jazzalbum->albumid ?? ''?>">
                            <input type="submit" name="submit" class="frontform" value="See more.."/>
                        </form>
                    </figcaption>

                </figure>
            </div>
        <?php endforeach; ?>
    </article>
    <div class="clearfix"></div>


    <br/>

</section>
<!--main_text End-->

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script src="assets/js/bxslider-4-master/jquery.bxslider.js" ></script>

<script>
    
    $(document).ready(function(){

        $('.bxslider').bxSlider();

        $(".grid_1_of_5").on('mouseenter', function () {
                        
            $(this).find('figcaption.cap_1_of_5 form#frontform').css('opacity' , '1').slideDown('100', 'swing');
    
        });
        
        $(".grid_1_of_5").on('mouseleave', function () {
            
            $(this).find('figcaption.cap_1_of_5 form#frontform').css('opacity' , '1').slideUp('100', 'swing');
            
        });

    });
</script>

