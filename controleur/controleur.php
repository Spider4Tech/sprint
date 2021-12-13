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
    if(!empty($idclient)){}
        $client=rechercheClient($idclient);
        $id_conseiller=$client->id_conseiller;
        $conseiller=rechercheConseiller($id_conseiller);
        syntheseClient($client,$conseiller);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlAjouterEmployée($login,$mdp,$rang){
    if(!empty($login)&&!empty($mdp)&&!empty($rang)){
        ajouterEmployée($login,$mdp,$rang);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlAjouterClient($nom,$prenom,$date,$adresse,$telephone,$mail,$profession,$situation,$cons){
    if(!empty($nom)&&!empty($prenom)&&!empty($date)&&!empty($adresse)&&!empty($telephone)&&!empty($mail)&&!empty($profession)&&!empty($situation)&&!empty($cons)){
        ajouterClient($nom,$prenom,$date,$adresse,$telephone,$mail,$profession,$situation,$cons);
    }
    else{
        throw new Exception("Entrée des données non valides")
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
function ctlDebitRetrait($compte,$solde,$id){
    $select=checkSolde($compte,$id);
    if ($select->solde+$solde>=-$select->decouvert_maxi){
      $compte=modificationSolde($compte,$solde,$id);
    }
    else {
      throw new Exception("Nouveau solde inférieur au découvert max");
    }
}
function ctlContrat($contrat,$entrée,$modif) {
    if($contrat == "suppression"){
      supprimerContrat($entrée);
    }
    elseif($contrat == "ajout"){
      ajouterContrat($entrée);
    }
    elseif($contrat == "modification" && !empty($modif)){
      editionContrat($entrée,$modif);
    }
}















































function ctlErreur($erreur){
    afficherErreur($erreur);
}
