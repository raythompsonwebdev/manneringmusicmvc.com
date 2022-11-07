<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Mannering music. Website build using PHP and Javascript. listen to audio. register to create review. ">
	<meta name="keywords" content="HTML5,CSS,PHP,JavaScript">
	<meta name="author" content="Raymond Thompson">
	<meta property="og:image" content="https://developer.mozilla.org/static/img/opengraph-logo.png">
	<meta property="og:description" content="The .">
	<meta property="og:title" content="Mozilla Developer Network">
	<meta name="twitter:title" content="Mozilla Developer Network">
	<!--
			<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta property="og:image" content="https://developer.mozilla.org/static/img/opengraph-logo.png">
			<meta property="og:description" content="The .">
			<meta property="og:title" content="Mozilla Developer Network">
			<meta name="twitter:title" content="Mozilla Developer Network">
		-->
	<link rel="stylesheet" href="/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Oswald:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="icon" href="assets/icons/apple-icon.png">

	<!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie.css">
      <script src="assets/js/old-browser-scripts/html5shiv.min.js"></script>
      <script src="assets/js/old-browser-scripts/selectivizr.js"></script>
    <![endif]-->

	<title><?= $title ?></title>

</head>

<body>

	<div id="wrapper">

		<header id="mannering-header">

			<div id="site-logo" tabindex="0">
				<h1 id="logo"><span>MANNERING</span><span>MU</span>SIC</h1>
				<p class="site-description">Jazz, Hip Hop & Country Music</p>
			</div>

			<aside id="mannering-social">
				<ul id="mannering-social-links">
					<li class="mannering-social-item">
						<a href="https://twitter.com/" title="twitter" aria-label="link to twitter" class="mannering-social-link">
							<i class="fa fa-twitter soc"></i>
						</a>
					</li>
					<li class="mannering-social-item">
						<a href="https://facebook.com/" title="facebook" aria-label="link to facebook" class="mannering-social-link">
							<i class="fa fa-facebook soc"></i>
						</a>
					</li>
					<li class="mannering-social-item">
						<a href="https://facebook.com/" title="rss" aria-label="link to rss" class="mannering-social-link">
							<i class="fa fa-rss soc"></i>
						</a>
					</li>
					<li class="mannering-social-item">
						<a href="https://dribbble.com/" title="dribble" aria-label="link to dribble" class="mannering-social-link">
							<i class="fa fa-dribbble soc"></i>
						</a>
					</li>
					<li class="mannering-social-item">
						<a href="https://www.instagram.com/" title="instagram" aria-label="link to instagram" class="mannering-social-link">
							<i class="fa fa-instagram soc"></i>
						</a>
					</li>
				</ul>
			</aside>

		</header>

		<button id="mobile-toggle" title="mobilemenu" aria-label="mobilemenu">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</button>
		<!--navigation here-->
		<nav id="mannering-nav">

			<ul id="mannering-inner-nav">
				<li><a href="/" aria-label="link to home page">Home</a></li>
				<li><a href="/review/list" aria-label="link to reviews page">Reviews</a></li>
				<li><a href="/search" aria-label="link to album search page">Search</a></li>
				<li><a href="/video" aria-label="link to video search page">Video</a></li>

				<?php if ($loggedIn) : ?>


					<li class="social-item"><a href="/logout" aria-label="link to logout">Log out</a>
					<?php else : ?>
					<li class="social-item"><a href="/login" aria-label="link to login">Log in</a></li>
				<?php endif; ?>
			</ul>

			<ul id="mannering-mobile-inner-nav">
				<li class="mannering-mobile-inner-nav-item">
					<a href="/" aria-label="link to home page" class="mannering-mobile-inner-nav-link">
						Home
					</a>
				</li>
				<li class="mannering-mobile-inner-nav-item">
					<a href="/search" aria-label="link to album search page" class="mannering-mobile-inner-nav-link"> Search
					</a>
				</li>
				<li class="mannering-mobile-inner-nav-item">
					<a href="/video" aria-label="link to album search page" class="mannering-mobile-inner-nav-link">
						Video
					</a>
				</li>

				<?php if ($loggedIn) : ?>
					<li class="social-item"><a href="/logout" aria-label="link to logout">Log out</a>
					<?php else : ?>
					<li class="social-item"><a href="/login" aria-label="link to login">Log in</a></li>
				<?php endif; ?>
			</ul>

		</nav>

		<!-- /.container -->
		<main id="mannering-content">

			<?php echo $output; ?>

		</main>


		<!--footer here-->
		<footer>

			<ul id="inner-footer">
				<li id="inner-footer-item">
					<a href="#" title="Terms Page" class="inner-footer-link" aria-label="link to terms and conditions page">Terms</a>
				</li>
				<li id="inner-footer-item">
					<a href="#" title="Privacy Page" class="inner-footer-link" aria-label="link to privacy policy page">Privacy</a>
				</li>
				<li id="inner-footer-item">
					<a href="#" title="About Page" class="inner-footer-link" aria-label="link to about page">About</a>
				</li>
				<li id="inner-footer-item">
					<a href="/contact" title="Contact Page" class="inner-footer-link" aria-label="link to contacts page">Contact</a>
				</li>
			</ul>

		</footer>
		<!--Footer end-->

		<!--google analytics here-->

	</div><!-- /.wrapper end -->

	<script src="/assets/js/main.js" defer></script>

</body>

</html>
