<?php
require_once('controleur/controleur.php');
try{
    if(isset($_POST['envoie'])){
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        ctlGestion($login,$mdp);
    }
    elseif(isset($_POST['rechid'])){
        $idclient=$_POST['idclient'];
        ctlAfficherClient($idclient);
    }
    elsif(isset($_POST['editclient'])){

    }
  else
        ctlStart();
}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
