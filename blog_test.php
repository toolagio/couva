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
?>
<html>
  <head></head>
  <body>
    <h2>Posts</h2>
    <ul>
      <?php echo count($feed); foreach ($feed as $entry): ?>      
      <li>
        <a href="<?php 
         echo $entry->getLink('alternate')->getHref(); ?>">
            TITLE: <?php echo $entry->getTitle(); ?>
        </a>          
            <br/>CONTENT:<br/>
            <?php echo $entry->getContent(); ?>
            <br/>
      </li>
      <?php endforeach; ?>
    </ul>  
  </body>
</html>  