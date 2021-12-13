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
function ctlModifClient($id,$tele,$adrr,$situ,$prof,$mail){
    $client=editionClient($id,$tele,$adrr,$situ,$prof,$mail);
    ctlAfficherClient($client);
}
function ctlAfficherSelectionConseiller(){
	$conseillers=rechercherTousConseillers();
    afficherConseillersSelect($conseillers);
}
function ctlCompteBancaire($id){
    $client=rechercheCompteBancaire($id);
    affichageCompteBancaire($client);
}
function ctlAfficherSelectionDate(){
	afficherSelectionDate();
}
function ctlAfficherEDTDate($date){
  echo 'salut';
  $dates=rechercheEDTDate($date);
  afficherEDTDate($dates);
}
function ctlAfficherEDTConseiller($id_conseiller){
  $rdvs=rechercherTousRDV($id_conseiller);
	AfficherEDTConseiller($rdvs);
}
function ctlContratClient($id){
    $client=rechercheContrat($id);
    affichageContrat($client);
}
function ctlSyntheseClient($id) {
    $client=rechercheCompteBancaire($id);
    $client2=rechercheContrat($id);
    affichageContraEtCompte($client,$client2);
}

















































function ctlErreur($erreur){
    afficherErreur($erreur);
}
