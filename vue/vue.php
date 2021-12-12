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
        $contenuselect="";
        $selectionDate="";
        $contenuEDT="";
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
    $contenu.='<p><input type="submit" value="solde" name="solde"/><input type="submit" value="retour" name="retour"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}

function affichageCompteBancaire($client){
    $contenu='<form id="vue compte client" action="site.php" method="post">';
    $contenu.="<fieldset>";
    $contenu.="<legend>Compte Bancaire</legend>";
    foreach($client as $ligne){
        $contenu.='<p>Nom :<input type="text" value="'.$ligne->nom.'"readonly/></p>';
        $contenu.='<p>Date ouverture :<input type="text" value="'.$ligne->date_ouverture.'"readonly/></p>';
        $contenu.='<p>Solde :<input type="text" value="'.$ligne->solde.'"readonly/></p>';
        $contenu.='<p>Découvert max :<input type="text" value="'.$ligne->decouvert_maxi.'"readonly/></p>';
    }
    $contenu.='<p><input type="submit" value="Changer" name="editclient"/></p>';
    $contenu.="</fieldset>";
    $contenu.="</form>";
    require_once('gabaritagent.php');
}

function afficherConseillersSelect($conseillers){
    $contenuselect='<select name="les conseillers">';
    foreach($conseillers as $ligne){
      $contenuselect.='<option>'.$ligne->nom.' '.$ligne->prenom.'</option>';
    }
    $contenuselect.='</select>';
    require_once('gabaritconseil.php');
}

function afficherErreur($erreur){
    $contenu="<fieldset>";
    $contenu.='<legend class="Erreur">Erreur</legend>';
    $contenu.='<p>'.$erreur.'</p><a href="site.php"/>Revenir au site </a></p>';
    $contenu.="</fieldset>";
    require_once('vue/gabarit.php');
}
