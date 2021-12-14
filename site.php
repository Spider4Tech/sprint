<?php
require_once('controleur/controleur.php');
try{
    if(isset($_POST['envoie'])){
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        ctlGestion($login,$mdp);
    }
    elseif(isset($_POST['rechid'])){
        $idclient=$_POST['idclient'];
        ctlAfficherClient($idclient);
    }
    elseif(isset($_POST['Checkcompte'])){
        $idclient=$_POST['idclient'];
        ctlCompteBancaire($idclient);
    }
    elseif(isset($_POST['ajoutemployer'])){
        $login=$_POST['logincompte'];
        $mdp=$_POST['mdp'];
        $rang=$_POST['rang'];
        ctlAjouterEmployée($login,$mdp,$rang);
        ctlGabarit();
    }
    elseif (isset($_POST['rechercheNomClient'])){
        $nom=$_POST['nomclient'];
        $prenom=$_POST['prenomclient'];
        $birth=$_POST['birthclient'];
        ctlAfficherClientParNom($nom,$prenom,$birth);
    }
    elseif (isset($_POST['editclient'])){
        $id=$_POST['id'];
        $tele=$_POST['tele'];
        $adrr=$_POST['adrr'];
        $situ=$_POST['situ'];
        $prof=$_POST['prof'];
        $mail=$_POST['mail'];
        ctlModifClient($id,$tele,$adrr,$situ,$prof,$mail);
    }
    elseif(isset($_POST['changementcompte'])){
        $alogin=$_POST['alogin'];
        $amdp=$_POST['amdp'];
        $nlogin=$_POST['nlogin'];
        $nmdp=$_POST['nmdp'];
        ctlChangmentMdp($alogin,$nlogin,$amdp,$nmdp);
        ctlGabarit();
    }
    elseif(isset($_POST['retour'])){
        ctlGabarit();
    }
    elseif(isset($_POST['disconnect'])){
        ctlStart();
    }
    elseif(isset($_POST['CompteBancaire'])){
        $id=isset($_POST['id']);
        ctlSyntheseClient($id);
    }
    elseif(isset($_POST['validation'])){
      $choix_radio=$_POST['selection'];
      if($choix_radio=='edt_conseiller'){
        ctlAfficherSelectionConseiller();
      }else{
        ctlAfficherSelectionDate();
      }
    }
    elseif(isset($_POST['cons_valide'])){
        $cons=$_POST['les_conseillers'];
        $cons = explode(" ", $cons);
        ctlAfficherEDTConseiller($cons[0]);
    }
    elseif(isset($_POST['date_valide'])){
      $date=$_POST['saisie_date'];
      ctlAfficherEDTDate($date);
    }
    elseif(isset($_POST['demande_nouv_client'])){
      ctlAfficherInscription();
    }
    elseif(isset($_POST['validation_nouv_client'])){
      $nom=$_POST['nouv_nom'];
      $prenom=$_POST['nouv_prenom'];
      $date=$_POST['nouv_date'];
      $adresse=$_POST['nouv_adresse'];
      $telephone=$_POST['nouv_telephone'];
      $mail=$_POST['nouv_mail'];
      $profession=$_POST['nouv_profession'];
      $situation=$_POST['nouv_situation'];
      $cons=$_POST['nouv_cons'];
      ctlAjouterClient($nom,$prenom,$date,$adresse,$telephone,$mail,$profession,$situation,$cons);
      ctlGabarit();
    }
    elseif(isset($_POST['gestioncontrat'])){
        $contrat=$_POST['gestionnaire_ctrt'];
        $entrée=$_POST['entrée'];
        $modif=$_POST['modif'];
        ctlContrat($contrat,$entrée,$modif);
        ctlGabarit();
    }
    elseif(isset($_POST['Crediter'])){
        $compte=$_POST['Compte'];
        $solde=$_POST['solde'];
        $id=$_POST['id'];
        ctlDebitRetrait($compte,$solde,$id);
        ctlGabarit();
    }
    elseif(isset($_POST['gestionnairepc'])){
        $contrat=$_POST['gestionpc'];
        $entrée1=$_POST['entrée1'];
        $modif2=$_POST['modif2'];
        $cpc=$_POST['cpc'];
        ctlContratpc($contrat,$entrée1,$modif2,$cpc);
        ctlGabarit();
    }
    elseif(isset($_POST['demande_modif_decouvert'])){
      ctlModifDecouvert();
    }
    elseif(isset($_POST['compte_valide'])){
      $nouv_decouvert=$_POST['nouv_decouvert'];
      $lecompte=$_POST['les_comptes'];
      ctlModifDecouvertEffectif($nouv_decouvert,$lecompte);
      ctlGabarit();
    }
    elseif(isset($_POST['demande_resiliation'])){
      $choix_res=$_POST['choix_supp'];
      if($choix_res=='supp_con'){
        ctlResilierContrat();
      }else{
        ctlResilierCompte();
      }
    }
    elseif(isset($_POST['contrat_supp_valide'])){
      $con=$_POST['les_contrats'];
      ctlResilierContratEffectif($con);
      ctlGabarit();
    }
    elseif(isset($_POST['compte_supp_valide'])){
      $com=$_POST['les_comptes'];
      ctlResilierCompteEffectif($com);
      ctlGabarit();
    }
    elseif(isset($_POST['demande_ouverture_compte'])){
      ctlAffichageOuvertureCompte();
    }
    elseif(isset($_POST['ouverture_valide'])){
      $choix_du_client=$_POST['les_clients'];
      $choix_du_type_de_compte=$_POST['les_types'];
      ctlAjouterCompteBancaire($choix_du_client,$choix_du_type_de_compte);
      ctlGabarit();
    }
    else{
      ctlStart();
    }

}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
