<?php
require_once "Foundation/FCliente.php";
require_once "Entity/ECliente.php";
require_once "./Entity/EUtente.php";
require_once "Entity/ECarta.php";
require_once "Entity/EWallet.php";
require_once "Foundation/FConnectionDB.php";
require_once "inc/configdb.php";

$utt = new EClient("luigi","bart","via ciao","1","Vzzano","AQ","67051","1234567890","l@l.com","passwd",null);
$utt->setNome('mariuccio');
var_dump($utt);
