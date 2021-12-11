<?php
require_once('modele/modele.php');
require_once('vue/vue.php');
session_start();
function ctlStart(){
    afficherStart();
}
function ctlGestion($login,$mdp){
        $rang=rechercheRang($login,$mdp);
        $_SESSION['rang']=$rang;
        ctlGabarit();
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
function ctlGabarit(){
    afficherGabarit($_SESSION['rang']);
}



function ctlErreur($erreur){
    afficherErreur($erreur);
}
