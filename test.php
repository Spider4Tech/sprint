<?php
try {
require_once('connect.php');
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
