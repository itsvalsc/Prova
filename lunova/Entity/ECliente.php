<?php
/**
 * ok
 * Class ECliente
 * @package Entity
 */
require "EUtente.php";
class EClient extends EUtente{

    private String $IdClient;

    private $Wallet;

    public function __construct(string $n, string $c, string $v, string $nc, string $citta, string $prov, string $cap, string $telefono, string $email, string $pw, $wallet){

        parent::__construct($n, $c, $email, $pw,'c');
        parent::setLivello("C");
        $this->IdClient = "C"  . random_int(0,100);
        $this->Wallet = $wallet;
    }



    //metodi get

    public function getIdClient(): string 
    { return $this->IdClient; }

    public function getWallet()
    { return $this->Wallet; }



    //metodi set

    public function setIdClient(string $id)
    { return $this->IdClient = $id; }
    
}


?>