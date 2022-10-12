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

$a = new EDisco('Cinquanta','2022',12,'1) Easy 2) BEER 3) girl','1',null,1500);

$b = FDisco::prelevaDischiperGenere('0');

print_r($b);

