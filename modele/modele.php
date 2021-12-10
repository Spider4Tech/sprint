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
function rechercheRang($login,$mdp){
    $connexion=getConnect();
    $requete="SELECT rang from compte where login='$login' and mdp='$mdp'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $rang=$resultat;
    $selection=$rang->fetch();
    $resultat->closeCursor();
    return $selection->rang;
}
