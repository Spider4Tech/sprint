<?php
require_once('connect.php');
function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}
function ajouterClient($nom,$prenom,$date,$adresse,$telephone,$mail,$profession,$situation,$cons){
  $connexion=getConnect();
  $requete="INSERT INTO client VALUES(0,'$nom','$prenom','$date','$adresse','$telephone','$mail','$profession','$situation','$cons')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}
// function rechercheRang($login,$mdp){
//     $connexion=getConnect();
//     echo "<p>Mot de passe :".$mdp."</p>";
//     $option = [
//       'cost' => 12,
//     ];
//     $hashpass = password_hash($mdp, PASSWORD_BCRYPT, $option);
//     echo "<p>hash : ".$hashpass."</p>";
//     $requete="SELECT login,rang,mdp from compte where login='$login'";
//     $resultat=$connexion->query($requete);
//     $resultat->setFetchMode(PDO::FETCH_OBJ);
//     $selection=$resultat->fetch();
//     echo $selection->rang;
//     if (password_verify($mdp,$hashpass)){
//         $resultat->closeCursor();
//         echo "<p>fcontionne ?</p>";
//         echo hash('ripemd160', 'Le rapide goupil brun sauta par dessus le chien paresseux.');
//         //return $selection->rang;
//     }else {
//       echo "<p>fcontionne pas</p>";
//     }
// }
function rechercheRang($login,$mdp){
    $connexion=getConnect();
    $requete="SELECT rang from compte where login=:login and mdp=:mdp";
    $prepare=$connexion->prepare($requete);
    $prepare->bindValue(':login', $login, PDO::PARAM_STR);
    $prepare->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $prepare->execute();
    $prepare->setFetchMode(PDO::FETCH_OBJ);
    $selection=$prepare->fetch();
    $prepare->closeCursor();
    return $selection->rang;
}
function rechercheClient($idclient){
    $connexion=getConnect();
    $requete="SELECT * from client where id='$idclient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetch();
    $resultat->closeCursor();
    return $client;
}
function ajouterEmployée($login,$mdp,$rang){
    $connexion=getConnect();
    $requete="INSERT INTO compte VALUES(0,'$login','$mdp','$rang')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

// function ajouterEmployée($login,$mdp,$rang){
//     $connexion=getConnect();
//     $option = [
//       'cost' => 12,
//     ];
//     $hashpass = password_hash($mdp, PASSWORD_BCRYPT, $option);
//     $requete="INSERT INTO compte VALUES(0,'$login','$hashpass','$rang')";
//     $resultat=$connexion->query($requete);
//     $resultat->closeCursor();
// }
function rechercherTousConseillers(){
    $connexion=getConnect();
    $requete="SELECT * from conseiller";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $conseillers=$resultat->fetchall();
    $resultat->closeCursor();
    return $conseillers;
}
function rechercheConseiller($id_conseiller){
    $connexion=getConnect();
    $requete="SELECT nom, prenom from conseiller where id_conseiller='$id_conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $conseillers=$resultat->fetch();
    $resultat->closeCursor();
    return $conseillers;
}
function rechercherTousRDV($id_conseiller){
	$connexion=getConnect();
	$requete="SELECT * from rdv natural join conseiller where id_conseiller='$id_conseiller'";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$rdvs=$resultat->fetchall();
	$resultat->closeCursor();
	return $rdvs;
}
function rechercheEDTDate($date){
  $connexion=getConnect();
	$requete="SELECT * from rdv where date='$date'";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$dates=$resultat->fetchall();
	$resultat->closeCursor();
	return $dates;


}

function rechercheClientNom($nom,$prenom,$birth){
    $connexion=getConnect();
    $requete="SELECT id,adresse,telephone,situation,mail,profession from client where nom='$nom' and prenom='$prenom' and date_de_naissance='$birth'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetch();
    $resultat->closeCursor();
    return $client;
}
function rechercheEmployée($login,$mdp){
    $connexion=getConnect();
    $requete="SELECT idcompte from compte where login='$login' and mdp='$mdp'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $selection=$resultat->fetch();
    $resultat->closeCursor();
    return $selection->idcompte;
}
function editionEmployée($id,$login,$mdp){
    $connexion=getConnect();
    $requete="UPDATE compte SET login='$login',mdp='$mdp' WHERE idcompte='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function editionClient($id,$tele,$adrr,$situ,$prof,$mail){
    $connexion=getConnect();
    $requete="UPDATE client SET adresse='$adrr',telephone='$tele',mail='$mail',profession='$prof',situation='$situ' WHERE id='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
    return $id;
}
function rechercheCompteBancaire($id){
    $connexion=getConnect();
    $requete="SELECT * from compte_bancaire where id_client='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchall();
    $resultat->closeCursor();
    return $client;
}
function rechercheContrat($id){
  $connexion=getConnect();
  $requete="SELECT * from contrat where id_client='$id'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetchall();
  $resultat->closeCursor();
  return $client;
}

function ajouterContrat($entrée){
    $connexion=getConnect();
    $requete="INSERT INTO type_contrat VALUES(0,'$entrée')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
 function editionContrat($entrée, $modif){
     $connexion=getConnect();
     $requete="UPDATE type_contrat SET nom='$modif' WHERE nom='$entrée'";
     $resultat=$connexion->query($requete);
     $resultat->closeCursor();
}
function supprimerContrat($entrée){
    $connexion=getConnect();
    $requete="DELETE FROM type_contrat where nom='$entrée'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function modificationSolde($compte,$solde,$id){
    $connexion=getConnect();
    $requete="UPDATE compte_bancaire SET solde=solde+'$solde' where id_client='$id' and nom='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function checkSolde($compte,$solde,$id){
  $connexion=getConnect();
  $requete="SELECT solde+'$solde',decouvert_maxi from compte_bancaire where id_client='$id' and nom='$compte'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetch();
  $resultat->closeCursor();
  return $client;
}
