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
require_once "Entity/EOrdine.php";
require_once "Foundation/FOrdine.php";
require_once "Entity/ESondaggio.php";
require_once "Entity/ERichiesta.php";
require_once "Foundation/FSondaggio.php";
require_once "Foundation/FRichiesta.php";
require_once "Entity/EVotazione.php";
require_once "Foundation/FVotazione.php";
require_once "Foundation/FPersistentManager.php";

//$utt = new EClient("luigi","bart","via ciao","1","Vzzano","AQ","67051","1234567890","l@l.com","passwd",null);

//$a=FCliente::store($utt);

//$a=FCliente::load('l@l.com');

//$a=FCliente::prelevaCliente('pluto@gmail.com');

//$a = new EDisco('Cinquanta','2022',12,'1) Easy 2) BEER 3) girl','1',null,1500);

//$b = FDisco::prelevaDischiperGenere('0');

//print_r($b);

//$s = new EOrdine('34567');
//$s->Compile('34567','roma','00100','pizza', 'carta', '33');
//$s->setIdCliente('67890')
//$f = FOrdine::store($s);

//$b=new ERichiesta('dc4',"2022-10-10");

$a = FPersistentManager::getInstance();
$c = '1';
$b = $a->exist("FSondaggio",$c);
//$a = FSondaggio::load('1');
print_r($b);







