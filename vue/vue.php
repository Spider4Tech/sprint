<?php
function afficherStart(){
  require_once('gabaritDef.php');
}
function afficherGabarit($rang){
  if ($rang==1){
    require_once('gabaritdirec.php');
  }
  elseif ($rang==2) {
    require_once('gabaritconseil.php');
  }
  elseif ($rang==3) {
    require_once('gabaritagent.php');
  }
}

function afficherErreur($erreur){
    $contenuAffichage="<fieldset>";
    $contenuAffichage.='<legend class="Erreur">Erreur</legend>';
    $contenuAffichage.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenuAffichage.="</fieldset>";
    require_once('vue/gabarit.php');
}
