<?php
require_once('modele/modele.php');
require_once('vue/vue.php');
function ctlStart(){
    afficherStart();
}
function ctlGestion($login,$mdp){
  if(!empty($login)$$!empty($mdp)){
    $option = [
      'cost' => 12,
    ];
    $hashpass = password_hash($mdp, PASSWORD_BCRYPT, $options);
    $rang=rechercheRang($login,$mdp);
    afficherGabarit($rang);    
  }
  else {
    throw new Exception("Entrée des données non valides");
  }
    
}
function ctlAfficherClient($idclient){
    $client=rechercheClient($idclient);
    affichageClient($client);
}





function ctlErreur($erreur){
    afficherErreur($erreur);
}
