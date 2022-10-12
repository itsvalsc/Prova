<?php
require_once "Foundation/FCliente.php";
require_once "Entity/ECliente.php";
require_once "./Entity/EUtente.php";
require_once "Entity/ECarta.php";
require_once "Entity/EWallet.php";
require_once "Foundation/FConnectionDB.php";
require_once "inc/configdb.php";
require_once "Foundation/FDisco.php";
require_once "Entity/EDisco.php";

//$utt = new EClient("luigi","bart","via ciao","1","Vzzano","AQ","67051","1234567890","l@l.com","passwd",null);

//$a=FCliente::store($utt);

//$a=FCliente::load('l@l.com');

//$a=FCliente::prelevaCliente('pluto@gmail.com');

$a = new EDisco('Trenta','adele',12,'1) Easy on me 2) Wine \n 3)Girls in on fire','0',null,1000);

$b = FDisco::load('D94');

print_r($b);

