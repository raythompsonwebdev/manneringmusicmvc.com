<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mannering Music web project.">
    <meta name="keywords" content="HTML5,CSS,PHP,JavaScript">
    <meta name="author" content="Raymond Thompson">
    <!-- <meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="https://developer.mozilla.org/static/img/opengraph-logo.png">
<meta property="og:description" content="The Mozilla Developer Network (MDN) provides
information about Open Web technologies including HTML, CSS, and APIs for both Web sites
and HTML5 Apps. It also documents Mozilla products, like Firefox OS.">
<meta property="og:title" content="Mozilla Developer Network">
<meta name="twitter:title" content="Mozilla Developer Network">
-->
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/font-awesome.min.css">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  /> -->
    <link rel="icon" href="assets/icons/apple-icon.png">

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie.css">
      <script src="assets/js/old-browser-scripts/Respond-master/dest/respond.src.js"></script>
      <script src="assets/js/old-browser-scripts/html5shiv.min.js"></script>
      <script src="assets/js/old-browser-scripts/selectivizr.js"></script>
    <![endif]-->

    <title><?= $title ?></title>

</head>

<body>

    <div id="wrapper">

        <header role="banner">

            <!---logo-->
            <span id="site-logo" tabindex="0">
                <p id="logo"><span>MANNERING</span><span>MU</span>SIC</p>
                <p class="site-description">Jazz, Hip Hop & Country Music</p>
            </span>

            <span class="social">
                <ul id="social">
                    <li class="social-item">
                        <a href="https://twitter.com/" title="twitter" aria-label="link to twitter">
                            <i class="fa fa-twitter soc"></i>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://facebook.com/" title="facebook" aria-label="link to facebook">
                            <i class="fa fa-facebook soc"></i>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://facebook.com/" title="rss" aria-label="link to frss">
                            <i class="fa fa-rss soc"></i>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://dribbble.com/" title="dribble" aria-label="link to dribble">
                            <i class="fa fa-dribbble soc"></i>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.instagram.com/" title="instagram" aria-label="link to instagram">
                            <i class="fa fa-instagram soc"></i>
                        </a>
                    </li>
                </ul>
            </span>

        </header>

        <button id="mobile-toggle" title="menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <!--navigation here-->
        <nav id="mannering_nav">

            <ul id="mannering_inner_nav">
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

            <ul id="mannering_mobile_inner_nav">
                <li><a href="/" aria-label="link to home page">Home</a></li>
                <li><a href="/search" aria-label="link to album search page">Search</a></li>
                <li><a href="/video" aria-label="link to album search page">Video</a></li>

                <?php if ($loggedIn) : ?>
                <li class="social-item"><a href="/logout" aria-label="link to logout">Log out</a>
                    <?php else : ?>
                <li class="social-item"><a href="/login" aria-label="link to login">Log in</a></li>
                <?php endif; ?>
            </ul>

        </nav>

        <!-- /.container -->
        <main id="content">

            <?php echo $output; ?>

        </main>


        <!--footer here-->
        <footer>

            <ul id="inner_footer">
                <li><a href="#" title="Terms Page" aria-label="link to terms and conditions page">Terms</a></li>
                <li><a href="#" title="Privacy Page" aria-label="link to privacy policy page">Privacy</a></li>
                <li><a href="#" title="About Page" aria-label="link to about page">About</a></li>
                <li><a href="/contact" title="Contact Page" aria-label="link to contacts page">Contact</a></li>
            </ul>

        </footer>
        <!--Footer end-->

        <!--google analytics here-->

    </div><!-- /.wrapper end -->

    <script src="/assets/js/main.js" defer></script>

</body>

</html>
