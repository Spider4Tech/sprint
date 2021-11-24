<?php
require_once('controleur/controleur.php');
try{

}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
