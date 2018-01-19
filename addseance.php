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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'head.php'; ?>
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
        <?php include 'navbar.php'; ?>
    </div>
   </div>
 </div>

 <div class="content">
   <h3>Ajouter une seance</h3>
   <?php if (isset($_GET['error'])): ?>
     <p>Erreur, veuillez saisir un nom</p>
   <?php endif; ?>
   <form id="contacts-form" action="addseance_process.php" method="post">
       <div class="field">
         <label>ajout : </label>
         <form action="addseance_process.php" method="post">
           <p>
             <input type="text" name="prenom" />
             <input type="submit" value="Valider" />
           </p>
         </form>
       </div>
   </form>
 </div>




      <div id="footer">
        <div class="left">
          <div class="right">
            <div class="footerlink">
              <p class="lf">Copyright &copy; 2018 <a href="#"><?php echo $data->name; ?></a> - All Rights Reserved</p>
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
