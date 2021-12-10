<?php
require_once('controleur/controleur.php');
try{
  if(){

  }
  else 
    ctlStart();
}
catch(Exception $e){
    $msg=$e->getMessage();
    ctlErreur($msg);
}
