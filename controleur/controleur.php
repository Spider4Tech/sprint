<?php
require_once('modele/modele.php');
require_once('vue/vue.php');
function ctlStart(){
    afficherStart();
}
function ctlGestion($login,$mdp){
    $rang=rechercheRang($login,$mdp);
    afficherGabarit($rang);
}
function ctlAfficherClient($idclient){
    $client=rechercheClient($idclient);
    affichageClient($client);
}










function ctlErreur($erreur){
    afficherErreur($erreur);
}
