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
    $contenu.="<legend>Donnée personnel du Client</legend>";
    $contenu.='<p><input type="hidden" value="'.$client->id.'" name="id"/></p>';
    $contenu.='<p>Adresse :<input type="text" value="'.$client->adresse.'" name="adrr"/></p>';
    $contenu.='<p>Telephone :<input type="text" value="'.$client->telephone.'"name="tele"/></p>';
    $contenu.='<p>Mail :<input type="text" value="'.$client->mail.'"name="mail"/></p>';
    $contenu.='<p>Profession :<input type="text" value="'.$client->profession.'"name="prof"/></p>';
    $contenu.='<p>
      Situation familiale : <select name="situ">
        <option value="célibataire" selected>célibataire</option>
        <option value="marié">marié</option>
        <option value="en couple">en couple</option>
        <option value="non préciser">non précisé</option>
        </select>
        Défaut : <input type="text" value="'.$client->situation.' "readonly/>
        </p>';
    $contenu.='<p><input type="submit" value="Changer" name="editclient"/><input type="submit" value="retour" name="retour"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}
function syntheseClient($client,$conseiller){
    $contenu='<form id="syntheseclient" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Synthese Client</legend>";
    $contenu.='<p><input type="hidden" value="'.$client->id.'" name="id"/></p>';
    $contenu.='<p><input type="hidden" value="'.$conseiller->id_conseiller.'" name="conseiller"/></p>';
    $contenu.='<p>Nom :<input type="text" value="'.$client->nom.'"readonly/></p>';
    $contenu.='<p>Prenom :<input type="text" value="'.$client->prenom.'"readonly/></p>';
    $contenu.='<p>Date de naissance :<input type="text" value="'.$client->date_de_naissance.'"readonly/></p>';
    $contenu.='<p>Adresse :<input type="text" value="'.$client->adresse.'"readonly/></p>';
    $contenu.='<p>Telephone :<input type="text" value="'.$client->telephone.'"readonly/></p>';
    $contenu.='<p>Mail :<input type="text" value="'.$client->mail.'"readonly/></p>';
    $contenu.='<p>Profession :<input type="text" value="'.$client->profession.'"readonly/></p>';
    $contenu.='<p>Situation familiale :<input type="text" value="'.$client->situation.' "readonly/></p>';
    $contenu.='<p>Conseiller :<input type="text" value="'.$conseiller->nom.' '.$conseiller->prenom.' "readonly/></p>';
    $contenu.='<p>Semaine :<input type="date" name="sem" /></p>';
    $contenu.='<p><input type="submit" value="CompteBancaire" name="CompteBancaire"/><input type="submit" value="retour" name="retour"/>';
    $contenu.='<input type="submit" value="Emploie du temps" name="edt"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}

function affichageCompteBancaire($client){
    $contenu='<form id="vue compte client" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Selection Compte</legend>";
    $contenu.='<p>Compte a modifier : <select name="Compte">';
    foreach($client as $ligne){
      $contenu.='<option value="'.$ligne->nom.'">'.$ligne->nom.'</option>';
    }
    $contenu.='</select></p>';
    foreach($client as $ligne2){
      $contenu.='<input type="hidden" value="'.$ligne2->id_client.'" name="id"/>';
      break;
    }
    $contenu.='<p>Solde <input type="text" name="solde"><p>';
    $contenu.='<p><input type="submit" value="Créditer/Débiter" name="Crediter"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}
function affichageContrat($client){
    $contenu='<form id="vue compte client" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Contrat</legend>";
    foreach($client as $ligne){
        $contenu.='<hr>';
        $contenu.='<p>Nom :<input type="text" value="'.$ligne->nom.'"readonly/></p>';
        $contenu.='<p>Date ouverture :<input type="text" value="'.$ligne->date_ouverture.'"readonly/></p>';
        $contenu.='<p>Tarif mensuel :<input type="text" value="'.$ligne->tarif_mensuel.'"readonly/></p>';
        $contenu.='<hr>';
    }
    $contenu.='<input type="submit" value="retour" name="retour"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');

}
function affichageContraEtCompte($client,$client2){
  $contenu='<form id="vue compte client" action="site.php" method="post">';
  $contenu.="<fieldset>";
  $contenu.="<legend>Compte Bancaire</legend>";
  foreach($client as $ligne){
      $contenu.='<hr>';
      $contenu.='<p>Nom :<input type="text" value="'.$ligne->nom.'"readonly/></p>';
      $contenu.='<p>Date ouverture :<input type="text" value="'.$ligne->date_ouverture.'"readonly/></p>';
      $contenu.='<p>Solde :<input type="text" value="'.$ligne->solde.'"readonly/></p>';
      $contenu.='<p>Découvert max :<input type="text" value="'.$ligne->decouvert_maxi.'"readonly/></p>';
      $contenu.='<hr>';
  }
  $contenu.='<input type="submit" value="retour" name="retour"/></p>';
  $contenu.="</fieldset>";
  $contenu.="</form>";
  $contenu.='<form id="vue compte client" action="site.php" method="post">';
  $contenu.="<fieldset>";
  $contenu.="<legend>Contrat</legend>";
  foreach($client2 as $ligne2){
      $contenu.='<hr>';
      $contenu.='<p>Nom :<input type="text" value="'.$ligne2->nom.'"readonly/></p>';
      $contenu.='<p>Date ouverture :<input type="text" value="'.$ligne2->date_ouverture.'"readonly/></p>';
      $contenu.='<p>Tarif mensuel :<input type="text" value="'.$ligne2->tarif_mensuel.'"readonly/></p>';
      $contenu.='<hr>';
  }
  $contenu.='<input type="submit" value="retour" name="retour"/></p>';
  $contenu.="</fieldset>";
  $contenu.="</form>";
  require_once('gabaritagent.php');
}
function afficherConseillersSelect($conseillers){
    $contenu='<fieldset><legend>Selectionnez un conseiller</legend>';
    $contenu.='<form method="post" action="site.php">';
    $contenu.='<select name="les_conseillers">';
    foreach($conseillers as $ligne){
      $contenu.='<option value="'.$ligne->id_conseiller.'">'.$ligne->id_conseiller.' '.$ligne->nom.' '.$ligne->prenom.'</option>';
    }
    $contenu.='</select>';
    $contenu.='<input type="submit" name="cons_valide" value="valider"/>';
    $contenu.='</form></fieldset>';
    require_once('gabaritconseil.php');
}
function afficherComptesSelectDec($comptes){
    $contenu='<fieldset><legend>Selectionnez un compte et le nouveau découvert</legend>';
    $contenu.='<form method="post" action="site.php">';
    $contenu.='<select name="les_comptes">';
    foreach($comptes as $ligne){
      $contenu.='<option value="'.$ligne->id_compte.'">'.$ligne->id_compte.' '.$ligne->nom.' id du client : '.$ligne->id_client.'</option>';
    }
    $contenu.='</select>';
    $contenu.='<input type="number" name="nouv_decouvert" min="0" maxlength="10"/>';
    $contenu.='<input type="submit" name="compte_valide" value="valider"/>';
    $contenu.='</form></fieldset>';
    require_once('gabaritconseil.php');
}
function afficherComptesSelect($comptes){

    $contenu='<fieldset><legend>Selectionnez un compte à supprimer</legend>';
    $contenu.='<form method="post" action="site.php">';
    $contenu.='<select name="les_comptes">';
    foreach($comptes as $ligne){
      $contenu.='<option value="'.$ligne->id_compte.'">'.$ligne->id_compte.' '.$ligne->nom.' id du client : '.$ligne->id_client.'</option>';
    }
    $contenu.='</select>';
    $contenu.='<input type="submit" name="compte_supp_valide" value="valider"/>';
    $contenu.='</form></fieldset>';
    require_once('gabaritconseil.php');
}
function afficherContratsSelect($contrats){
  $contenu='';
  $contenu.='<fieldset><legend>Selectionnez un contrat à supprimer</legend>';
  $contenu.='<form method="post" action="site.php">';
  $contenu.='<select name="les_contrats">';
  foreach($contrats as $ligne){
    $contenu.='<option value="'.$ligne->id_contrat.'">'.$ligne->id_contrat.' '.$ligne->nom.' id du client : '.$ligne->id_client.'</option>';
  }
  $contenu.='</select>';
  $contenu.='<input type="submit" name="contrat_supp_valide" value="valider"/>';
  $contenu.='</form></fieldset>';
  require_once('gabaritconseil.php');

}
function afficherSelectionDate(){
	$contenu='';
	$contenu.='<fieldset><legend>Selection date</legend>';
	$contenu.='<form method="post" action="site.php">';
	$contenu.='<input type="date" name="saisie_date" required/>';
	$contenu.='<input type="submit" name="date_valide" value="valider"/>';
	$contenu.='</form></fieldset>';
	require_once('gabaritconseil.php');
}
function inscription($conseillers){
  $contenu='<fieldset>';
  $contenu.='<legend>Inscrire un nouveau client à la banque</legend>';
  $contenu.='<form method="post" action="site.php">';
  $contenu.='<p><label for="nom">nom :</label><input type="text" id="nom" name="nouv_nom" maxlength="10" required/></p>';
  $contenu.='<p><label for="prenom">prenom :</label><input type="text" id="prenom" name="nouv_prenom" maxlength="10" required/></p>';
  $contenu.='<p><label for="date">Date de naissance :</label><input type="date" id="date" name="nouv_date" maxlength="10" required/></p>';
  $contenu.='<p><label for="adresse">Adresse :</label><input type="text" id="adresse" name="nouv_adresse" maxlength="10" required/></p>';
  $contenu.='<p><label for="telephone">Telephone :</label><input type="text" id="telephone" name="nouv_telephone" maxlength="10" required/></p>';
  $contenu.='<p><label for="mail">Email :</label><input type="text" id="mail" name="nouv_mail" maxlength="10" required/></p>';
  $contenu.='<p><label for="profession">Profession</label><input type="text" id="profession" name="nouv_profession" maxlength="10" required/></p>';
  $contenu.='<p><label for="situation">Situation :</label><input type="text" id="situation" name="nouv_situation" maxlength="10" required/></p>';
  $contenu.='<p><label for="conseiller">Conseiller :</label>';
  $contenu.='<select id="conseiller" name="nouv_cons">';
  foreach($conseillers as $ligne){
    $contenu.='<option value="'.$ligne->id_conseiller.'">ID:'.$ligne->id_conseiller.' '.$ligne->prenom.' '.$ligne->nom.'</option>';
  }
  $contenu.='</select>';
  $contenu.='<p><input type="submit" value="Valider" name="validation_nouv_client"/>';
  $contenu.='</form></fieldset>';
  require_once('gabaritconseil.php');
}

function afficherEDTConseiller($rdvs){
  $contenu='';
	$contenu.='<fieldset><legend>Voici l emploi du temps</legend>';
	foreach($rdvs as $ligne){
      $contenu.='objet :'.$ligne->objet.' |date : '.$ligne->date.' |debut : '.$ligne->debut.'h  |duree : '.$ligne->duree.'h<br/>';
    }
	$contenu.='</fieldset>';
	require_once('gabaritconseil.php');
}
function afficherEDTDate($dates){
  $contenu='';
  $contenu.='<fieldset><legend>Emploi du temps de la date selectionnee</legend>';
  foreach($dates as $ligne){
      $contenu.='objet :'.$ligne->objet.' date : '.$ligne->date.' debut : '.$ligne->debut.' duree : '.$ligne->duree.'<br/>';
    }
  $contenu.='</fieldset>';
  require_once('gabaritconseil.php');
}
function menuOuvertureCompte($clients,$types_compte){
  $contenu='<fieldset><legend>Ouvrir un compte : selectionner un client et un type de compte</legend>';
  $contenu.='<form method="post" action="site.php">';
  $contenu.='<select name="les_clients">';
  foreach($clients as $ligne){
    $contenu.='<option value="'.$ligne->id.'">'.$ligne->id.' '.$ligne->nom.' id du client : '.$ligne->prenom.'</option>';
  }
  $contenu.='</select>';
  $contenu.='<select name="les_types">';
  foreach($types_compte as $ligne){
    $contenu.='<option value="'.$ligne->id_type_compte.'">'.$ligne->id_type_compte.' '.$ligne->libelle.'</option>';
  }
  $contenu.='</select>';
  $contenu.='<input type="submit" name="ouverture_valide" value="valider"/>';
  $contenu.='</form></fieldset>';
  require_once('gabaritconseil.php');
}
function statcontrat($cmptcontrat){
    $contenu="<fieldset>";
    $contenu.='<legend class="statctr">stat contrat</legend>';
    $contenu.='<p>'.$cmptcontrat.'</p>';
    $contenu.="</fieldset>";
    require_once('gabaritdirec.php');
}
function affichageEDT($rdvs){
  $contenu='<form action="site.php" method="post">';
  $contenu.="<fieldset>";
  foreach($rdvs as $ligne){
      $contenu.='';
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
