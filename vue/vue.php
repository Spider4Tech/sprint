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
        $contenu_les_comptes="";

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
        <option value="non préciser">non préciser</option>
        </select>
        Défaut : <input type="text" value="'.$client->situation.' "readonly/>
        </p>';
    $contenu.='<p><input type="submit" value="Changer" name="editclient"/><input type="submit" value="retour" name="retour"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}
function syntheseClient($client){
    $contenu='<form id="syntheseclient" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Synthese Client</legend>";
    $contenu.='<p><input type="hidden" value="'.$client->id.'" name="id"/></p>';
    $contenu.='<p>Nom :<input type="text" value="'.$client->nom.'"readonly/></p>';
    $contenu.='<p>Prenom :<input type="text" value="'.$client->prenom.'"readonly/></p>';
    $contenu.='<p>Date de naissance :<input type="text" value="'.$client->date_de_naissance.'"readonly/></p>';
    $contenu.='<p>Adresse :<input type="text" value="'.$client->adresse.'"readonly/></p>';
    $contenu.='<p>Telephone :<input type="text" value="'.$client->telephone.'"readonly/></p>';
    $contenu.='<p>Mail :<input type="text" value="'.$client->mail.'"readonly/></p>';
    $contenu.='<p>Profession :<input type="text" value="'.$client->profession.'"readonly/></p>';
    $contenu.='<p>Situation familiale :<input type="text" value="'.$client->situation.' "readonly/></p>';
    $contenu.='<p><input type="submit" value="CompteBancaire" name="CompteBancaire"/><input type="submit" value="retour" name="retour"/></p>';
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
function afficherComptesSelect($comptes){
    $contenu='<fieldset><legend>Selectionnez un compte</legend>';
    $contenu.='<form method="post" action="site.php">';
    $contenu.='<select name="les_comptes">';
    foreach($comptes as $ligne){
      $contenu.='<option ="'.$ligne->id_compte.'">'.$ligne->id_compte.' '.$ligne->nom.' id du client : '.$ligne->id_client.'</option>';
    }
    $contenu.='</select>';
    $contenu.='<input type="submit" name="cons_valide" value="valider"/>';
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
function afficherEDTConseiller($rdvs){
	$contenu='<fieldset><legend>Voici l emploi du temps</legend>';
	foreach($rdvs as $ligne){
      $contenu.='objet :'.$ligne->objet.' |date : '.$ligne->date.' |debut : '.$ligne->debut.'h  |duree : '.$ligne->duree.'h<br/>';
    }
	$contenu.='</fieldset>';
	require_once('gabaritconseil.php');
}
function afficherEDTDate($dates){
  $contenu='<fieldset><legend>Emploi du temps de la date selectionnee</legend>';
  foreach($dates as $ligne){
      $contenu.='objet :'.$ligne->objet.' date : '.$ligne->date.' debut : '.$ligne->debut.' duree : '.$ligne->duree.'<br/>';
    }
  $contenu.='</fieldset>';
  require_once('gabaritconseil.php');
}

function afficherErreur($erreur){
    $contenu="<fieldset>";
    $contenu.='<legend class="Erreur">Erreur</legend>';
    $contenu.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenu.="</fieldset>";
    require_once('vue/gabarit.php');
}
