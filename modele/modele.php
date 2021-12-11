<?php
require_once('connect.php');
function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}
function ajouterClient($nom,$prenom,$addresse,$telephone,$situation,$conseiller){
    $connexion=getConnect();
    $requete="INSERT INTO client VALUES(0,'$nom','$prenom','$addresse','$telephone','$situation','$conseiller')";
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
    $requete="SELECT rang from compte where login='$login' and mdp='$mdp'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $selection=$resultat->fetch();
    $resultat->closeCursor();
    return $selection->rang;
}
function rechercheClient($idclient){
    $connexion=getConnect();
    $requete="SELECT * from client where id='$idclient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchall();
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
  $requete="SELECT nom, prenom from conseiller";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $conseillers=$resultat->fetchall();
  $resultat->closeCursor();
  return $conseillers;
}
