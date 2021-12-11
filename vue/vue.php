<?php
function afficherStart(){
  require_once('gabaritDef.php');
}
function afficherGabarit($rang){
    if ($rang=="Directeur"){
        $contenu="";
        require_once('gabaritdirec.php');
    }
    elseif ($rang=="Conseiller") {
        $contenu="";
        require_once('gabaritconseil.php');
    }
    elseif ($rang=="Agent") {
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
function afficherConseillersSelect($conseillers){
    $contenu='<select name="les conseillers">

    </select>'
}









function afficherErreur($erreur){
    $contenu="<fieldset>";
    $contenu.='<legend class="Erreur">Erreur</legend>';
    $contenu.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenu.="</fieldset>";
    require_once('vue/gabarit.php');
}
