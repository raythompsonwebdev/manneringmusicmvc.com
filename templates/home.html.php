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
				<h3>Check out our end of season sale on the latest Hip Hop music from our vast collection.</h3></div>
				<a href="search_page.php" class="button">Shop Now</a>
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
			<a href="search_page.php" class="button">Shop Now</a>
			</article>
		<img src="assets/images/sliderimages/manneringjazz.png" alt="jazz-albums"/>
		</li>

		<li>
		<article class="slider-text">
			<h1>CLEARANCE<span>SALE</span></h1>
			<h2>UP TO 10&#37; OFF</h2>
				<div class="features_list">
				<h3>Check out our end of season sale on the latest Country music from our vast collection.</h3> </div>
			<a href="search_page.php" class="button">Shop Now</a>
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
			<a href="search_page.php" class="button">Shop Now</a>
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

	<?php foreach($rapalbums as $rapalbum): ?>
			<div class="flex-wrapper">

				<figure class="grid_1_of_5 ">

				<img class="images_1_of_5" src="/assets/databasepics/<?=$rapalbum['image']?>" alt="HipHopMusicAlbum">

					<figcaption class="cap_1_of_5">
					<h3><?=$rapalbum['album']?></h3>
						<p><?=$rapalbum['artist']?></p>
					<h4>&#163;</h4>
					<form method="post" action="addtocart.php" id="front-btn">
				<input type="hidden" name="sel_item_id" value="" />
				<button type="submit" class="button" name="submit" value="submit">See More..</button>
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
		<?php foreach($countryalbums as $countryalbum): ?>
			<div class="flex-wrapper">
				<figure class="grid_1_of_5">

				<img class="images_1_of_5" src="/assets/databasepics/<?=$countryalbum['image']?>" alt="CountryMusicAlbum">

				<figcaption class="cap_1_of_5">
				<h3><?=$countryalbum['album']?></h3>
				<p><?=$countryalbum['artist']?></p>
				<h4> &#163;</h4>
				<form method="post" action="addtocart.php" id="front-btn">
				<input type="hidden" name="sel_item_id" value="" />
				<button type="submit" class="button" name="submit" value="submit">See More..</button>
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
	<?php foreach($jazzalbums as $jazzalbum): ?>
		<div class="flex-wrapper">
			<figure class="grid_1_of_5">

				<img class="images_1_of_5" src="/assets/databasepics/<?=$jazzalbum['image']?>" alt="JazzMusicAlbum">
				<figcaption class="cap_1_of_5">
				<h3><?=$jazzalbum['album']?></h3>
				<p><?=$jazzalbum['artist']?></p>
				<h4>&#163;</h4>
				<form method="post" action="addtocart.php" id="front-btn">
				<input type="hidden" name="sel_item_id" value="" />
				<button type="submit" class="button" name="submit" value="submit">See More..</button>
				</form>
				</figcaption>

			</figure>
		</div>
	<?php endforeach; ?>
	</article>
	<div class="clearfix"></div>

	<!--end-->
	<br/>

</section>
<!--main_text End-->

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script src="assets/js/bxslider-4-master/jquery.bxslider.js" ></script>

<script>
    $(document).ready(function(){

		$('.bxslider').bxSlider();

	});
</script>

