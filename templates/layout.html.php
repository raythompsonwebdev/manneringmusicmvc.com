<html lang="en" class="no-js" >

<head>

    <title>Mannering Music</title>
    <link rel="stylesheet" href="assets/css/normalise.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title><?=$title?></title>
  </head>
  
  <body>

    <div id="wrapper">

    <header role="banner">

      <span class="social">
        <ul id="social">
          
          <li class="social-item"><a href="#">Login</a></li>
          <li class="social-item"><a href="#">Register</a></li>
        </ul>
      </span>

      <!---logo-->
      <hgroup>
        <h1 id="logo"><span>MANNERING</span><span>MU</span>SIC</h1>
        <h2 class="site-description">Jazz, Hip Hop & Country</h2>
      </hgroup>

    </header>

      <!--navigation here-->
      <nav role="navigation" >
                  
        <ul id="inner_nav">
          <li><a rel='tab' href="/">Home</a></li>
            <li><a rel='tab' href="/search">Search</a></li>
              <li><a rel='tab' href="/audio">Audio</a></li>
            <li><a rel='tab' href="/video">Video</a></li>
          <li><a rel='tab' href="/contact">Contact</a></li>
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
        <li><a href="#">Delivery</a></li>
      <li><a href="#">About</a></li>
    <li><a href="/contact">Contact</a></li>
  </ul>

</footer><!--Footer end-->

<!--google analytics here-->

    </div><!-- /.wrapper end -->
    
  </body>
</html>