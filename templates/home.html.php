<?php  ?>

<!--Slider-->
<section id="slider">
  <img src="assets/images/sliderimages/silder.gif" alt="hip-hop-albums"/>
     
</section>

<!--main text-->
<section id="main_text" role="main" >
<h1>MANNERING MUSIC FEATURED ALBUMS</h1>
    
    <!--Hip Hop Section-->
    <section class="album_section">
        <h1>Hip Hop</h1>
        <?php foreach ($rapalbums as $rapalbum) : ?>
                <div class="flex-wrapper">

                    <figure class="grid_1_of_5 ">

                        <img class="images_1_of_5" src="/assets/databasepics/<?=$rapalbum->image?>" alt="HipHopMusicAlbum">

                        <figcaption class="cap_1_of_5">
                            <h3><?=$rapalbum->getArtistId()->artist_name?></h3>
                                <p><?=$rapalbum->album?></p>
                            <h4>&#163;<?=$rapalbum->price?></h4>
                            <!-- commented out for now.-->
                            <form method="get" action="/singleresult" id="frontform">
                                <input type="hidden" name="artistid" value="<?=$rapalbum->artistId ?? ''?>">
                                <input type="hidden" name="albumid" value="<?=$rapalbum->id ?? ''?>">
                                <input type="submit" name="submit" class="frontform" value="Go To Album"/>
                            </form>
                        </figcaption>
                    
                    </figure>

                </div>
        <?php endforeach; ?>
    </section>
    <div class="clearfix"></div>

    <!--Country Section-->
    <section class="album_section ">
        <h1>Country</h1>
        <?php foreach ($countryalbums as $countryalbum) : ?>
            <div class="flex-wrapper">
                <figure class="grid_1_of_5">

                    <img class="images_1_of_5" src="/assets/databasepics/<?=$countryalbum->image?>" alt="CountryMusicAlbum">

                    <figcaption class="cap_1_of_5">
                        <h3><?=$countryalbum->getArtistId()->artist_name?></h3>
                        <p><?=$countryalbum->album?></p>
                        <h4> &#163;<?=$countryalbum->price?></h4>
                        <form method="get" action="/singleresult" id="frontform">
                            <input type="hidden" name="artistid" value="<?=$countryalbum->artistId ?? ''?>">
                            <input type="hidden" name="albumid" value="<?=$countryalbum->id ?? ''?>">
                            <input type="submit" name="submit" class="frontform" value="Go To Album"/>
                        </form>
                    </figcaption>
                </figure>

            </div>
        <?php endforeach; ?>
    </section>
    <div class="clearfix"></div>

    <!--Jazz Section-->
    <section class="album_section">
        <h1>Jazz</h1>
        <?php foreach ($jazzalbums as $jazzalbum) : ?>
            <div class="flex-wrapper">
                <figure class="grid_1_of_5">

                    <img class="images_1_of_5" src="/assets/databasepics/<?=$jazzalbum->image?>" alt="JazzMusicAlbum">
                    <figcaption class="cap_1_of_5">
                        <h3><?=$jazzalbum->getArtistId()->artist_name?></h3>
                        <p><?=$jazzalbum->album?></p>
                        <h4>&#163;<?=$jazzalbum->price?></h4>
                        <form method="get" action="/singleresult" id="frontform">
                            <input type="hidden" name="artistid" value="<?=$jazzalbum->artistId ?? ''?>">
                            <input type="hidden" name="albumid" value="<?=$jazzalbum->id ?? ''?>">
                            <input type="submit" name="submit" class="frontform" value="Go To Album"/>
                        </form>
                    </figcaption>

                </figure>
            </div>
        <?php endforeach; ?>
    </section>
    <div class="clearfix"></div>


    <br/>

</section>
<!--main_text End-->

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script>
    
    $(document).ready(function(){

        $(".grid_1_of_5").on('mouseenter', function () {
                        
            $(this).find('figcaption.cap_1_of_5 form#frontform').css('opacity' , '1').slideDown('100', 'swing');
    
        });
        
        $(".grid_1_of_5").on('mouseleave', function () {
            
            $(this).find('figcaption.cap_1_of_5 form#frontform').css('opacity' , '1').slideUp('100', 'swing');
            
        });

    });
</script>