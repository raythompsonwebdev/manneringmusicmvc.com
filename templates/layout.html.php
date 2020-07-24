
<!DOCTYPE html>
<html lang="en" class="no-js" >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mannering Music web project.">
    <meta name="keywords" content="HTML5,CSS,PHP,JavaScript">
    <meta name="author" content="Raymond Thompson">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/style.css" >
     <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/fontawesome/css/font-awesome.min.css" >
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  /> -->
    <link rel="icon" href="assets/icons/apple-icon.png">


    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie.css">
      <script src="assets/js/old-browser-scripts/Respond-master/dest/respond.src.js"></script>
      <script src="assets/js/old-browser-scripts/html5shiv.min.js"></script>
      <script src="assets/js/old-browser-scripts/selectivizr.js"></script>
    <![endif]-->
    <title><?=$title?></title>
  </head>

  <body>

    <div id="wrapper">

    <header role="banner">

    <!---logo-->
    <hgroup>
        <h1 id="logo"><span>MANNERING</span><span>MU</span>SIC</h1>
        <h2 class="site-description">Jazz, Hip Hop & Country</h2>
      </hgroup>

      <span class="social">
        <ul id="social">

          <li class="social-item"><a href="">Link</a></li>
          <li class="social-item"><a href="">Link</a></li>


        </ul>
      </span>

    </header>
    <button id="mobile-toggle" title="menu">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
      <!--navigation here-->
      <nav role="navigation" >

        <ul id="inner_nav">
            <li><a rel='tab' href="/">Home</a></li>
            <li><a href="/review/list">Reviews</a></li>
            <li><a href="/review/edit">Add Review</a></li>
            <li><a rel='tab' href="/search">Search</a></li>
            <li><a rel='tab' href="/video">Video</a></li>

        <?php if ($loggedIn) : ?>
            <li class="social-item"><a href="/logout">Log out</a>
        <?php else : ?>
            <li class="social-item"><a href="/login">Log in</a></li>
        <?php endif; ?>
        </ul>

        <ul id="mobile_inner_nav">
            <li><a rel='tab' href="/">Home</a></li>
            <li><a href="/review/list">Reviews</a></li>
            <li><a href="/review/edit">Add Review</a></li>
            <li><a rel='tab' href="/search">Search</a></li>
            <li><a rel='tab' href="/video">Video</a></li>

        <?php if ($loggedIn) : ?>
            <li class="social-item"><a href="/logout">Log out</a>
        <?php else : ?>
            <li class="social-item"><a href="/login">Log in</a></li>
        <?php endif; ?>
        </ul>

      </nav>

      <!-- /.container -->
      <main id="content">



              <?php echo $output; ?>



      </main>


<!--footer here-->
<footer role="navigation">

   <div class="social-btns">
  <ul>
    <li><a href="#"><i class="fa fa-twitter soc"></i></a></li>
      <li><a href="#"><i class="fa fa-facebook soc"></i></a></li>
        <li><a href="#"><i class="fa fa-rss soc"></i></a></li>
      <li><a href="#"><i class="fa fa-dribbble soc"></i></a></li>
    <li><a href="#"><i class="fa fa-instagram soc"></i></a></li>
  </ul>
</div>
  <ul id="inner_footer">
    <li><a href="#">Terms</a></li>
      <li><a href="#">Privacy</a></li>
      <li><a href="#">About</a></li>
      <li><a rel='tab' href="/contact">Contact</a></li>

  </ul>

</footer><!--Footer end-->

<!--google analytics here-->

    </div><!-- /.wrapper end -->
    <script src="/assets/js/main.js" defer></script>
  </body>
</html>
