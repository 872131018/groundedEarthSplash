<?php
/*
* Set a base url for assets to use
*/
//$base_url = 'http://73.243.194.169/groundedEarthSplash/public/';
$base_url = 'http://localhost:8888/groundedEarthSplash/public/';
?>
<!DOCTYPE html>
<html lang="en">
<?php /*
* Basic Page Needs
*/ ?>
<meta charset="utf-8">
<title>Your page title here :)</title>
<meta name="description" content="">
<meta name="author" content="">
<?php /*
* Mobile Specific Metas
*/ ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php /*
* Other Meta
*/ ?>
<meta charset='utf-8'>
<?php /*
* Font
*/ ?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:400,300,600">
<?php /*
* CSS
*/ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>Skeleton-2.0.4/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>Skeleton-2.0.4/css/skeleton.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>Glide.js-master/dist/css/glide.core.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>Glide.js-master/dist/css/glide.theme.css">
<?php /*
* Page CSS
*/ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/styles.css">
<?php /*
* Favicon
*/ ?>
<link rel="icon" type="image/png" href="<?php echo $base_url; ?>Skeleton-2.0.4/images/favicon.png">
</head>
<?php /*
* Primary Page Layout
*/ ?>
<body>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="six columns">
          <div><h4>Grounded Earth Designs.</h4></div>
          <div><h4>Welcome.</h4></div>
          <a class="button">Behold</a>
          <form>
            <input type="email" name="email" placeholder="Email Address">
            <input class="button" type="button" value="Sign Up" data-delegate="signup">
          </form>
        </div>
        <div class="six columns">
          <div class="sticker logo-sticker"></div>
        </div>
      </diV>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="three columns"></div>
        <div class="six columns">
          <div id="Glide" class="glide">
            <div class="glide__arrows">
                <button class="glide__arrow prev" data-glide-dir="<">prev</button>
                <button class="glide__arrow next" data-glide-dir=">">next</button>
            </div>
            <div class="glide__wrapper">
                <ul class="glide__track">
                  <?php
                    /*
                    * Load images into the slider
                    */
                    $images = [
                      'bear.png',
                      'buffalo.png',
                      'cougar.png',
                      'mountains.png',
                      'skull.png',
                      'wolf.png'
                    ];
                    /*
                    * Iterate through the images and create the slider
                    */
                    foreach($images as $key => $value)
                    {
                      $url = $base_url."images/".$value;
                      $html = "<li class='glide__slide'>";
                      $html .= "<img src='{$url}'>";
                      $html .= "</li>";
                      echo $html;
                    }
                  ?>
                </ul>
            </div>
            <div class="glide__bullets"></div>
          </div>
        </div>
        <div class="three columns"></div>
      </div>
    </div>
  </div>

  <?php /*
	* Must load the external sources first
	*/ ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<?php /*
	* Then load the internal sources second
	*/ ?>
  <script type="text/javascript" src="<?php echo $base_url; ?>stickerjs-master/sticker.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>Glide.js-master/dist/glide.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>js/validateSignup.js"></script>
	<?php /*
	* Load the driver for execution
	*/ ?>
	<script type="text/javascript" src="<?php echo $base_url; ?>js/splashDriver.js"></script>
</body>
</html>
