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
        $rang=$rang->rang;
        if($rang!=null){
          $_SESSION['rang']=$rang;
          ctlGabarit();
        }else{
          throw new Exception("Login ou mdp incorect");
        }

    }
    else {
        throw new Exception("Entrée des données vide");
    }
}
function ctlAfficherClient($idclient){
    if(!empty($idclient)){
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
        throw new Exception("Entrée des données non valides");
    }
}
function ctlGabarit(){
    afficherGabarit($_SESSION['rang']);
}
function ctlAfficherClientParNom($nom,$prenom,$birth){
    if(!empty($nom)&&!empty($prenom)&&!empty($birth)){
        $client=rechercheClientNom($nom,$prenom,$birth);
        affichageClient($client);
    }
    else{
        throw new Exception("Entrée des données non valides");
  }
}
function ctlChangmentMdp($alogin,$nlogin,$amdp,$nmdp){
    if(!empty($alogin)&&!empty($nlogin)&&!empty($amdp)&&!empty($nmdp)){
        $id=rechercheEmployée($alogin,$amdp);
        editionEmployée($id,$nlogin,$nmdp);
    }
    else{
        throw new Exception("Entrée des données non valides");
    }
}
function ctlModifClient($id,$tele,$adrr,$situ,$prof,$mail){
    if(!empty($id)&&!empty($tele)&&!empty($adrr)&&!empty($situ)&&!empty($prof)&&!empty($mail)){
        $client=editionClient($id,$tele,$adrr,$situ,$prof,$mail);
        ctlAfficherClient($client);
    }
    else{
        throw new Exception("Entrée des données non valides");
    }
}
function ctlAfficherSelectionConseiller(){
  	$conseillers=rechercherTousConseillers();
    afficherConseillersSelect($conseillers);
}
function ctlAfficherInscription(){
    inscription();
}
function ctlResilierContrat(){
  $contrats=rechercherTousContrats();
  afficherContratsSelect($contrats);
}
function ctlResilierCompte(){
  $cbs=rechercherTousComptesBancaires();
  afficherComptesSelect($cbs);
}
function ctlResilierCompteEffectif($compte_supp){
    supprimerUnCompte($compte_supp);

}
function ctlResilierContratEffectif($contrat_supp){
    supprimerUnContrat($contrat_supp);
}
function ctlAffichageOuvertureCompte(){
  $clients=rechercherTousClients();
  $types_comptes=rechercherTousTypesComptes();
  menuOuvertureCompte($clients,$types_comptes);
}
function ctlAfficherVenteContrat(){
  $clients=rechercherTousClients();
  $contrats=rechercherTousTypesContrats();
  vendreUnContrat($clients,$contrats);
}
function ctlVendreContrat($client,$contrat,$tarif_mensuel){
  $datedujour= date('d-m-y h:i:s');
  $nomContrat=rechercherNomContrat($contrat);
  $nomContrat=$nomContrat->type_contrat;
  ajouterUnContrat($client,$nomContrat,$tarif_mensuel,$datedujour);
  ctlGabarit();
}
function ctlAjouterCompteBancaire($choix_du_client,$choix_du_type_de_compte){
  $datedujour= date('d-m-y h:i:s');
  ajouterCompteBancaire($choix_du_client,$choix_du_type_de_compte,$datedujour);

}
function ctlAffichageBlocage(){
  $conseillers=rechercherTousConseillers();
  blocage_creneau($conseillers);
}
function ctlBlocage($sdfsdf){



}
function ctlModifDecouvert(){
    $cbs=rechercherTousComptesBancaires();
    afficherComptesSelectDec($cbs);
}

function ctlModifDecouvertEffectif($nouv_decouvert,$lecompte){
    modificationDecouvert($nouv_decouvert,$lecompte);
}

function ctlCompteBancaire($id){
    if(!empty($id)){
        $client=rechercheCompteBancaire($id);
        affichageCompteBancaire($client);
    }
    else {
        throw new Exception("Entrée des données non valide");
    }
}
function ctlAfficherSelectionDate(){
	afficherSelectionDate();
}
function ctlAfficherEDTDate($date){
    if(!empty($date)){
        $dates=rechercheEDTDate($date);
        afficherEDTDate($dates);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlAfficherEDTConseiller($id_conseiller){
  $rdvs=rechercherTousRDV($id_conseiller);
	AfficherEDTConseiller($rdvs);
}
function ctlContratClient($id){
    if(!empty($id)){
        $client=rechercheContrat($id);
        affichageContrat($client);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlSyntheseClient($id) {
    if(!empty($id)){
        $client=rechercheCompteBancaire($id);
        $client2=rechercheContrat($id);
        affichageContraEtCompte($client,$client2);
    }
    else {
        throw new Exception("Entrée des données non valides");
    }
}
function ctlDebitRetrait($compte,$solde,$id){
    $select=checkSolde($compte,$id);
    if ($select->solde+$solde>=-$select->decouvert_maxi){
      modificationSolde($compte,$solde,$id);
      ctlSyntheseClient($id);
    }
    else {
      throw new Exception("Nouveau solde inférieur au découvert max");
    }
}
function ctlContratpc($contrat,$entrée1,$modif2,$cpc) {
    if(!empty($contrat)&&!empty($entrée1)&&!empty($cpc)){
        if($contrat == "del_p"){
            supprimerContratpiece($entrée1,$cpc);
        }
        elseif($contrat == "add_p"){
            ajouterContratpiece($entrée1,$cpc);
        }
        elseif($contrat == "edit_p" && !empty($modif2)){
            editionContratpiece($entrée1,$modif2,$cpc);
        }
        else{
            throw new Exception("Entrée des données non valides");
        }
      }
      else{
          throw new Exception("Entrée des données non valides");
      }
}
function ctlContrat($contrat,$entrée,$modif,$cpc) {
    if(!empty($contrat)&&!empty($entrée)){
        if($contrat == "suppression"){
          supprimerContrat($entrée);
        }
        elseif($contrat == "ajout"){
          ajouterContrat($entrée);
        }
        elseif($contrat == "modification" && !empty($modif)){
          editionContrat($entrée,$modif);
        }
        else{
            throw new Exception("Entrée des données non valides");
        }
    }
    else{
        throw new Exception("Entrée des données non valides");
      }
}

function ctlEmploieDuTemps($conseiller,$semaine){
    if (!empty($conseiller)&&!empty($semaine)){
        $idsemaine=chercherSemaine($semaine);
        $debut=$idsemaine->Debut;
        $fin=$idsemaine->Fin;
        $rdv=rechercherRDVSemaine($conseiller,$debut,$fin);
        affichageEDT($rdv,$debut,$fin);
    }
    else{
      throw new Exception ("Aucun conseiller trouvé");
    }
}

function statctr2($contrat,$date,$date2) {
    if(!empty($date)){
      if($contrat == "c_souscris" && !empty($date2) && $date < $date2){
        $cmptcontrat=statctr($date,$date2);
        statcontrat($cmptcontrat);
      }
      if($contrat == "nrb_rdv"  && !empty($date2) && $date < $date2){
        $rdv_reserver=rdv_select($date,$date2);
         rdvpris($rdv_reserver);
      }
      if($contrat == "total_cli"){
        $total_client=compteur_client($date,$date2);
        tot_cli($total_client);
      }
      if($contrat == "solde_cli"){
        $totalsolde=solde_total($date,$date2);
        tot_solde($totalsolde);
      }
    }
}
function ctlErreur($erreur){
    afficherErreur($erreur);
}
