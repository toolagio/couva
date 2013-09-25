<?php

// load Zend Gdata libraries
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_Query');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Feed');

// set credentials for ClientLogin authentication
$user = "esavagemcglynn@gmail.com";
$pass = "Charlie1";
$feed = null;

/*
try {
  // perform login 
  // initialize service object
  $client = Zend_Gdata_ClientLogin::getHttpClient(
    $user, $pass, 'blogger');
  $service = new Zend_Gdata($client);

  // get list of all posts in blog feed
  $query = new Zend_Gdata_Query(
   'http://www.blogger.com/feeds/5441579027542427220/posts/default');
  $feed = $service->getFeed($query);
} catch (Exception $e) {
  die('ERROR:' . $e->getMessage());  
}
*/
$searchimages = '~<img [^>]* />~';

$entriesToShow = 2;
$maxWidth = 130;
$maxHeight = 150;
$maxRatio = $maxWidth / $maxHeight;
$blogEntries = array();
if($feed != null) {
    for($i=0; $i<$entriesToShow; $i++) {
        $blogEntries[$i] = array();
        $blogEntries[$i]['title'] = $feed[$i]->getTitle();
    
        /*Run preg_match_all to grab all the images and save the results in $pics*/
        preg_match_all( $searchimages, $feed[$i]->getContent(), $pics );
        
        $blogEntries[$i]['imageSrc'] = null;
        if(count($pics[0])) {
            $imgSrc = $pics[0][0];
            preg_match_all('/<img [^>]*src=["|\']([^"|\']+)/i', $imgSrc, $matches);
            $blogEntries[$i]['imageSrc'] = $matches[1][0];
            list($width, $height, $type, $attr) = getimagesize($blogEntries[$i]['imageSrc']);
            $absRatio = $width/$height;
            if($maxRatio < $absRatio) {
                $blogEntries[$i]['imageWidth'] = $maxWidth;
                $blogEntries[$i]['imageHeight'] = $maxWidth / $absRatio;
            }
            else {
                $blogEntries[$i]['imageWidth'] = $maxHeight * $absRatio;
                $blogEntries[$i]['imageHeight'] = $maxHeight;
            }
        }
        
        $blogEntries[$i]['content'] = preg_replace("/<img[^>]+\>/i", "", $feed[$i]->getContent()); 
        $blogEntries[$i]['content'] = preg_replace("/<br[^>]*\>/i", "", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<a[^>]+\>/i", "", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<\/a\>/i", " ", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<div[^>]+\>/i", " ", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<\/div\>/i", " ", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<span[^>]+\>/i", " ", $blogEntries[$i]['content']); 
        $blogEntries[$i]['content'] = preg_replace("/<\/span\>/i", " ", $blogEntries[$i]['content']); 
    
        $blogEntries[$i]['link'] = $feed[$i]->getLink('alternate')->getHref(); 
    }
}

function displayBlogEntries($numToDisplay) {
    global $blogEntries;
    for($i=0; $i<=$numToDisplay-1; $i++) {
        if(isset($blogEntries[$i])) {
            echo '<div class="entry'.($i==0?" first":"").'">';
            echo '<h2><a href="'.$blogEntries[$i]['link'].'" target="_blank">'.$blogEntries[$i]['title'].'</a></h2>';
            echo '<a href="'.$blogEntries[$i]['link'].'" target="_blank"><img src="'.$blogEntries[$i]['imageSrc'].'" width="'.$blogEntries[$i]['imageWidth'].'" height="'.$blogEntries[$i]['imageHeight'].'" /></a><br />';
            $blogPost = $blogEntries[$i]['content'];
            echo '<div class="entry-content">'.substr($blogPost, 0, 100).(strlen($blogPost) > 100?"...":"").'</div></div>
            ';
        }
    }
}

?>