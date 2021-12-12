<?php
require_once('modele/modele.php');
require_once('vue/vue.php');
session_start();
function ctlStart(){
    afficherStart();
}
function ctlGestion($login,$mdp){
    if(!empty($login)&&!empty($mdp)){
        $rang=rechercheRang($login,$mdp);
        $_SESSION['rang']=$rang;
        ctlGabarit();
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlAfficherClient($idclient){
    $client=rechercheClient($idclient);
    $id_conseiller=$client->id_conseiller;
    $conseiller=rechercheConseiller($id_conseiller);
    syntheseClient($client,$conseiller);
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
function ctlAfficherClientParNom($nom,$prenom,$birth){
    $client=rechercheClientNom($nom,$prenom,$birth);
    affichageClient($client);
}
function ctlChangmentMdp($alogin,$nlogin,$amdp,$nmdp){
    $id=rechercheEmployée($alogin,$amdp);
    editionEmployée($id,$nlogin,$nmdp);
}
function ctlModifClient($id,$tele,$addr,$situ,$prof,$mail){
    $client=editionClient($id,$tele,$addr,$situ,$prof,$mail);
    ctlAfficherClient($client);
}
function ctlAfficherSelectionConseiller(){
	$conseillers=rechercherTousConseillers();
    afficherConseillersSelect($conseillers);
}
function ctlErreur($erreur){
    afficherErreur($erreur);
}
function ctlAfficherSelectionDate(){
	afficherSelectionDate();
}
function ctlAfficherEDTConseiller($id_conseiller){
	$rdvs=rechercherTousConseillers();
	AfficherEDTConseiller($rdvs);
}
