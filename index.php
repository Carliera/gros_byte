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
<link rel="icon" href="image/favicon.ico">
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="seances.php">Séances</a></li>
            <li><a href="articles.php">Tarifs</a></li>
            <li><a href="contact-us.php">Contacts</a></li>
          </ul>
        </div>
      </div>
    </div>
   </div>
 </div>

  <div class="content">
    <h3>A l'affiche</h3>
    <ul class="movies">
      <li>
        <h4>Jumanji</h4>
        <img src="image/jumanji.jpg" style="width=20" alt="" />
        <p>Le destin de quatre lycéens en retenue bascule lorsqu’ils sont aspirés dans le monde de Jumanji. Après avoir découvert une vieille console contenant un jeu vidéo dont ils n’avaient jamais entendu parler, les quatre jeunes se retrouvent mystérieusement propulsés au cœur de la jungle de Jumanji, dans le corps de leurs avatars. Ils vont rapidement découvrir que l’on ne joue pas à Jumanji, c’est le jeu qui joue avec vous… Pour revenir dans le monde réel, il va leur falloir affronter les pires dangers et triompher de l’ultime aventure. Sinon, ils resteront à jamais prisonniers de Jumanji…</p>
        <div class="wrapper"><a href="#" class="link2"><span><span>+ de détails</span></span></a></div>
      </li>
      <li>
        <h4>Star wars</h4>
        <img src="image/star_wars.jpeg" alt="" />
        <p>Les héros du Réveil de la force rejoignent les figures légendaires de la galaxie dans une aventure épique qui révèle des secrets ancestraux sur la Force et entraîne de surprenantes révélations sur le passé…  </p>
        <div class="wrapper"><a href="#" class="link2"><span><span>+ de détails</span></span></a></div>
      </li>
      <li class="last">
        <h4>Ferdinand</h4>
        <img src="image/ferdiand.jpg" alt="" />
        <p>Ferdinand est un taureau au grand cœur. Victime de son imposante apparence, il se retrouve malencontreusement capturé et arraché à son village d’origine. Bien déterminé à retrouver sa famille et ses racines, il se lance alors dans une incroyable aventure à travers l’Espagne, accompagné de la plus déjantée des équipes ! </p>
        <div class="wrapper"><a href="#" class="link2"><span><span>+ de détails</span></span></a></div>
      </li>
      <li>
        <h4>Au revoir la-haut</h4>
        <img src="image/au_revoir.jpg" alt="" />
        <p>Novembre 1919. Deux rescapés des tranchées, l'un dessinateur de génie, l'autre modeste comptable, décident de monter une arnaque aux monuments aux morts. Dans la France des années folles, l'entreprise va se révéler aussi dangereuse que spectaculaire.. </p>
        <div class="wrapper"><a href="#" class="link2"><span><span>+ de détails</span></span></a></div>
      </li>


      <li class="clear">&nbsp;</li>
    </ul>
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
