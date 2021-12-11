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
function ctlAjouterEmployée($login,$mdp,$rang){
    if(!empty($login)&&!empty($mdp)&&!empty($rang)){
        ajouterEmployée($login,$mdp,$rang);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}




function ctlErreur($erreur){
    afficherErreur($erreur);
}
