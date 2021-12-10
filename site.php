<?php
require_once('controleur/controleur.php');
try{
  if(isset($_POST['envoie'])){
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    ctlGestion($login,$mdp);
  }
  else
    ctlStart();
}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
