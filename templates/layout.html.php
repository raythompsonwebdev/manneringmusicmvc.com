<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mannering Music web project.">
        <meta name="keywords" content="HTML5,CSS,PHP,JavaScript">
        <meta name="author" content="Raymond Thompson">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <span id="site-logo">
                    <p id="logo"><span>MANNERING</span><span>MU</span>SIC</p>
                    <p class="site-description">Jazz, Hip Hop & Country Music</p>
                </span>

                <span class="social">
                    <ul id="social">
                        <li class="social-item"><a href="#" title="twitter"><i class="fa fa-twitter soc"></i></a></li>
                        <li class="social-item"><a href="#" title="facebook"><i class="fa fa-facebook soc"></i></a></li>
                        <li class="social-item"><a href="#" title="rss"><i class="fa fa-rss soc"></i></a></li>
                        <li class="social-item"><a href="#" title="dribble"><i class="fa fa-dribbble soc"></i></a></li>
                        <li class="social-item"><a href="#" title="instagram"><i class="fa fa-instagram soc"></i></a>
                        </li>
                    </ul>
                </span>

            </header>

            <button id="mobile-toggle" title="menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <!--navigation here-->
            <nav role="navigation">

                <ul id="inner_nav">
                    <li><a href="/" title="Home Page">Home</a></li>
                    <li><a href="/review/list" title="twitter" title="Reviews Page">Reviews</a></li>
                    <li><a href="/search" title="Search Page">Search</a></li>
                    <li><a href="/video" title="Videos Page">Video</a></li>

                    <?php if ($loggedIn) : ?>
                    <li class="social-item"><a href="/logout" title="Log Out">Log out</a>
                        <?php else : ?>
                    <li class="social-item"><a href="/login" title="Log In">Log in</a></li>
                    <?php endif; ?>
                </ul>

                <ul id="mobile_inner_nav">
                    <li><a href="/" title="Home Page">Home</a></li>
                    <li><a href="/review/list" title="twitter" title="Reviews Page">Reviews</a></li>
                    <li><a href="/search" title="Search Page">Search</a></li>
                    <li><a href="/video" title="Videos Page">Video</a></li>

                    <?php if ($loggedIn) : ?>
                    <li class="social-item"><a href="/logout" title="Log Out">Log out</a>
                        <?php else : ?>
                    <li class="social-item"><a href="/login" title="Log In">Log in</a></li>
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
                    <li><a href="#" title="Terms Page">Terms</a></li>
                    <li><a href="#" title="Privacy Page">Privacy</a></li>
                    <li><a href="#" title="About Page">About</a></li>
                    <li><a href="/contact" title="Contact Page">Contact</a></li>

                </ul>

            </footer>
            <!--Footer end-->

            <!--google analytics here-->

        </div><!-- /.wrapper end -->

        <script src="/assets/js/main.js" defer></script>

    </body>

</html>