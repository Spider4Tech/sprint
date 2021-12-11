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
    elseif(isset($_POST['ajoutemployer'])){
        $login=$_POST['logincompte'];
        $mdp=$_POST['mdp'];
        $rang=$_POST['rang'];
        ctlAjouterEmployée($login,$mdp,$rang);
        ctlGabarit();
    }
    elseif (isset($_POST['rechercheNomClient'])){
        $nom=$_POST['nomclient'];
        $prenom=$_POST['prenomclient'];
        $birth=$_POST['birthclient'];
        ctlAfficherClientParNom($nom,$prenom,$birth);
    }
    elseif (isset($_POST['editclient'])){

    }
    else
        ctlStart();
}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
