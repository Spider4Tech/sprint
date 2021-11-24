<?php



function afficherErreur($erreur){
    $contenuAffichage="<fieldset>";
    $contenuAffichage.='<legend class="Erreur">Erreur</legend>';
    $contenuAffichage.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenuAffichage.="</fieldset>";
    require_once('vue/gabarit.php');
}
