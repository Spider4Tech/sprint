<?php
try {
require_once('connect.php');
$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->query('SET NAMES UTF8');
$requete="select nom,prenom from auteur'' ;
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
         while( $ligne = $resultat->fetch() ) {
Echo   $ligne->nom .  '--' . $ligne->prenom .'</br>';
 }
         $resultat->closeCursor() ;
}
catch(PDOException $e) {
   $msg = 'ERREUR dans ' . $e->getFile() . ' Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
   exit($msg);
}
