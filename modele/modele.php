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
    return $selection;
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
function rechercherTousClients(){
    $connexion=getConnect();
    $requete="SELECT * from client";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchall();
    $resultat->closeCursor();
    return $client;
}
function rechercherTousTypesComptes(){
    $connexion=getConnect();
    $requete="SELECT * from type_compte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $types=$resultat->fetchall();
    $resultat->closeCursor();
    return $types;
}
function ajouterCreneau($objet,$date,$debut,$fin,$cons){
  $connexion=getConnect();
  $requete="INSERT INTO rdv VALUES(0,'$objet','$date','$debut','$fin','$cons')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();



}
function ajouterCompteBancaire($choix_du_client,$choix_du_type_de_compte,$datedujour){

  $connexion=getConnect();
  $requete="INSERT INTO compte_bancaire VALUES(0,'$choix_du_type_de_compte','$datedujour','0','0','$choix_du_client')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();

}
function rechercherTousContrats(){
  $connexion=getConnect();
  $requete="SELECT * from contrat";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $contrats=$resultat->fetchall();
  $resultat->closeCursor();
  return $contrats;
}
function rechercherNomContrat($id){
  $connexion=getConnect();
  $requete="SELECT type_contrat from type_contrat where id_type_contrat='$id'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $conseillers=$resultat->fetch();
  $resultat->closeCursor();
  return $conseillers;

}
function rechercherTousTypesContrats(){
  $connexion=getConnect();
  $requete="SELECT * from type_contrat";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $contrats=$resultat->fetchall();
  $resultat->closeCursor();
  return $contrats;
}
function rechercheConseiller($id_conseiller){
    $connexion=getConnect();
    $requete="SELECT nom,prenom,id_conseiller from conseiller where id_conseiller='$id_conseiller'";
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
function rechercherRDVSemaine($id_conseiller,$debut,$fin){
	$connexion=getConnect();
	$requete="SELECT * from rdv where id_conseiller='$id_conseiller' and date>='$debut' and date<='$fin'";
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
function supprimerUnContrat($entrée){
    $connexion=getConnect();
    $requete="DELETE FROM contrat where id_contrat='$entrée'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function supprimerUnCompte($entrée){
    $connexion=getConnect();
    $requete="DELETE FROM compte_bancaire where id_compte='$entrée'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
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

function ajouterUnContrat($client,$contrat,$tarif_mensuel,$date){
  $connexion=getConnect();
  $requete="INSERT INTO contrat VALUES(0,'$contrat','$date','$tarif_mensuel','$client')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();

}
function modificationDecouvert($nouv_decouvert,$lecompte){
    $connexion=getConnect();
    $requete="UPDATE compte_bancaire SET decouvert_maxi = '$nouv_decouvert' WHERE id_compte='$lecompte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function rechercherTousComptesBancaires(){
    $connexion=getConnect();
    $requete="SELECT * from compte_bancaire";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $cbs=$resultat->fetchall();
    $resultat->closeCursor();
    return $cbs;
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
function ajouterContratpiece($entrée1,$cpc){
    $connexion=getConnect();
    $requete="INSERT INTO piece_identité VALUES(0,'$entrée1','$cpc')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
 function editionContratpiece($entrée1,$modif2,$cpc){
     $connexion=getConnect();
     $requete="UPDATE piece_identité SET libellé='$modif2' WHERE libellé='$entrée1' and nom='$cpc'";
     $resultat=$connexion->query($requete);
     $resultat->closeCursor();
}
function supprimerContratpiece($entrée1){
    $connexion=getConnect();
    $requete="DELETE FROM piece_identité where libellé='$entrée1'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function recherchePiece($motif){
    $connexion=getConnect();
    $requete="SELECT libellé FROM piece_identité where nom='$motif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $piece=$resultat->fetchall();
    $resultat->closeCursor();
    return $piece;
}
function checkSolde($compte,$id){
  $connexion=getConnect();
  $requete="SELECT solde,decouvert_maxi from compte_bancaire where id_client='$id' and nom='$compte'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}
function statctr($date,$date2){
  $connexion=getConnect();
  $requete="SELECT count(nom) FROM contrat  WHERE date_ouverture BETWEEN 'date' AND 'date2' group by 'nom'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}
function rdv_select($date,$date2){
  $connexion=getConnect();
  $requete=" SELECT count(objet) FROM rdv WHERE date BETWEEN 'date1' AND 'date2'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}
function compteur_client($date,$date2){
  $connexion=getConnect();
  $requete="SELECT count(nom) FROM client  WHERE date == 'date1'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}

function solde_total($date,$date2){
  $connexion=getConnect();
  $requete="SELECT sum(solde) FROM compte_bancaire WHERE date == 'date1'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}
function chercherSemaine($semaine){
  $connexion=getConnect();
  $requete="SELECT * from semaine where Debut<='$semaine' and Fin>='$semaine'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $select=$resultat->fetch();
  $resultat->closeCursor();
  return $select;
}
function AjoutDateRDVClient($date,$debut,$fin,$id){
    $connexion=getConnect();
    $requete="INSERT INTO rdv Values (0,'null','$date','$debut','$fin','$id')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
    $requete2="SELECT id_rdv from rdv";
    $resultat=$connexion->query($requete2);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $select=$resultat->fetchall();
    foreach ($select as $key) {
      $id=$key->id_rdv;
    }
    return $id;
}
function modificationObjetREV($motif,$id){
    $connexion=getConnect();
    $requete="UPDATE rdv SET objet='$motif' where id_rdv='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
