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

$utt1 = new EClient("Valentina","Scimia","via vale","3","L'Aquila","AQ","67100","1029384756","valentina@scimia.com",'passwd3!');
$utt2 = new EClient("Noemi","Barbaro","via noemi","2","L'Aquila","AQ","67100","0987654321","noemi@barbaro.com",'passwd2!');
$utt3 = new EClient("luigi","Bartolomeo","via marruvio","1","avezzano","AQ","67051","1234567890","l@l.com",'passwd1!');

$a=FCliente::store($utt1);
$a=FCliente::store($utt2);
$a=FCliente::store($utt3);


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

//$a = FPersistentManager::getInstance();
//$b = $a->prelevaOrdini('ut1');
//print_r($b);









