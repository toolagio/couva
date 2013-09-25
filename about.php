<?php
    require_once('includes/blog.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>COUVA | Coffee Couture | Stylish ware for your cafetiere</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
  <meta http-equiv="content-language" content="EN-UK"/>
  <meta name="keywords" content="coffee warm press cover cozy cafetiere french press pot plunger"/>
  <meta name="description" content="COUVA - Coffee Couture: stylish covers for your coffee press/cafetiere"/>
  <meta name="revisit-after" content="2 Days"/>
  <meta name="distribution" content="Global"/>
  <meta name="author" content="Couva"/>
  <link href='http://fonts.googleapis.com/css?family=Questrial|Crete+Round:400,400italic' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/gif" href="favicon.gif" />
  <style type="text/css" media="all">
		@import "css/styles.css";
	</style>
  <!--[if lte IE 6]><style type="text/css" media="all">
		@import "css/ie.css";
	</style><![endif]-->
</head>
<body>
<div id="header">
    <div id="header-inner">
        <a href="http://www.facebook.com/" id="fblink"><strong>Follow us on Facebook</strong></a>
        <a href="http://www.couva.co.uk/" id="logolink"><strong>COUVA</strong></a>
        <h2 id="tagline">Keeps coffee hotter for longer</h2>
        <ul id="nav">
            <li class="active">
                <a href="about.html">All About Couva</a>
            </li>
            <li class="">
                <a href="collection.html">The Collection</a>
            </li>
            <li class="">
                <a href="shop.html">Our Shop</a>
            </li>
            <li class="">
                <a href="blog.html">Blog</a>
            </li>
            <li class="">
                <a href="contact.html">Contact us</a>
            </li>
        </ul>
    </div>
</div>
<div id="side">
    <div id="side-inner">
        <?php
            displayBlogEntries(2);
        ?>
    </div>
</div>
<div id="content">
    <div id="content-inner">
        <h1>Unique features</h1>
        <ul class="content-bold">
            <li>This COUVA fits BODUM, WHITTARD and LA CAFETIÈRE</li>
            <li>
                Made with a HEAT-REFLECTING layer for better insulation
                <img src="images/heat_layer.png" alt="heat-reflecting layer" style="float: right"/>
            </li>
            <li>
                Design & stitched in the UK
                <img src="images/uk_stitch.png" alt="designed and stitched in the UK" style="float: left; padding-right: 10px"/>
            </li>
        </ul>
        <div class="divide"><br/></div>
        <h2>Step by Step</h2>
        <div class="content-block">
            <div class="content-block-inner" id="stepbystep">
                
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div id="footer-inner">
        <span class="disclaimer">Couva can not be held responsible for the misuse of Couva or hot coffee scalding</span>
        <div id="footernav">
            <a href="terms.html">Terms</a>
            |
            <a href="privacy.html">Privacy</a>
            |
            &copy;Couva 2013
        </div>
    </div>
</div> 
<!-- Google Analytics code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33855335-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script></body>
</html>
