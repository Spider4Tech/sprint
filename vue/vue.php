<?php
function afficherStart(){
  require_once('gabaritDef.php');
}
function afficherGabarit($rang){
    if ($rang==1){
        $contenu="";
        require_once('gabaritdirec.php');
    }
    elseif ($rang==2) {
        $contenu="";
        require_once('gabaritconseil.php');
    }
    elseif ($rang==3) {
        $contenu="";
        require_once('gabaritagent.php');
    }
}
function affichageClient($client){
    $contenu='<form id="affichageclient" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Synthese Client</legend>";
    foreach($client as $ligne){
        $contenu.='<p> <input type="text" value="'.$ligne->id.' '.$ligne->nom.'  '.$ligne->prenom.'  '.$ligne->addresse.'  '.$ligne->telephone.'  '.$ligne->situation.'  '.$ligne->conseiller.'" readonly="readonly"/> </p>';
    }
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}









function afficherErreur($erreur){
    $contenu="<fieldset>";
    $contenu.='<legend class="Erreur">Erreur</legend>';
    $contenu.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenu.="</fieldset>";
    require_once('vue/gabarit.php');
}
