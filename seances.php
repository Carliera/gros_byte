<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://80.211.175.238/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

// Affichage pour le nom du cinema

$CineName = $client->request('GET', 'theater');
$data = json_decode($CineName->getBody());

// Affichage pour les id films et titre

$idShowtimes = $client->request('GET', 'showtimes');
$dataId = json_decode($idShowtimes->getBody());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Le Grand Bô Técran</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</head>
<body id="page1">

<div class="tail-top">
  <div class="tail-bottom">
    <div id="main">
      <div id="header">
        <div class="row-1">
          <div class="fleft"><a href="#"><?php echo $data->name; ?></div>
          <ul>
            <li><a href="#"><img src="images/icon1-act.gif" alt="" /></a></li>
            <li><a href="#"><img src="images/icon2.gif" alt="" /></a></li>
            <li><a href="#"><img src="images/icon3.gif" alt="" /></a></li>
          </ul>
        </div>
        <div class="row-2">
          <ul>
            <li><a href="index.php" >Home</a></li>
            <li><a href="seances.php" class="active">Séances</a></li>
            <li><a href="articles.php">Tarifs</a></li>
            <li><a href="contact-us.php">Contacts</a></li>
          </ul>
        </div>
      </div>
    </div>
   </div>
 </div>

  <div class="content">
    <h3>séances disponibles</h3>
    <fieldset>
      <div class="field">
        <label>séances :</label>
        <?php foreach ($dataId as $key => $value): ?>
          <p><?= $value->id ?></p>
          <p><?= $value->name ?></p>
        <?php endforeach; ?>
      </div>
    </fieldset>
  </div>




      <div id="footer">
        <div class="left">
          <div class="right">
            <div class="footerlink">
              <p class="lf">Copyright &copy; 2018 <a href="#">LeGrandBôTécran</a> - All Rights Reserved</p>
              <p class="rf">Design by Les Gros Byte</p>
              <div style="clear:both;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>