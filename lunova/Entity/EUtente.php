<?php

/**
 * OK
 * Class EUtente
 */

class EUtente{

    private string $Nome;

    private string $Cognome;

    private string $Via;

    private string $NumeroCivico;

    private string $Citta;

    private string $Provincia;

    private string $CAP;

    private string $Telefono;

    private string $Livello;

    private string $Email;

    private string $Password;

    private EImmagine $Profilo;

    /**
     * EUtente constructor.
     * @param string $n
     * @param string $c
     * @param string $v
     * @param string $nc
     * @param string $citta
     * @param string $prov
     * @param string $cap
     * @param string $telefono
     * @param string $email
     * @param string $pw
     */


    /*
    
    public function __construct($ut)
    {
        if (1 === func_num_args()){
            $this->id =0;
            $this->dischi = array();
            $this->totale = 0.0;
            $this->mail_utente=$ut;
            $this->pagato = 0;
        }
        elseif (4 === func_num_args()){
            $idcar=func_get_arg(0);
            $disco=func_get_arg(1);
            $quantita=func_get_arg(2);
            $utente=func_get_arg(3);
            $this->id=$idcar;
            $disco_new=new EDisco($disco);
            $this->dischi[$disco_new->getId()]=$quantita;
            $this->totale=$disco_new->getPrezzo()*$quantita;
            $this->mail_utente=$utente;
            $this->pagato=0;


        }

    }
    
    */

    public function __construct(string $n, string $c, string $v, string $nc, string $citta, string $prov, string $cap,string $telefono, string $email, string $pw)
    {
        $this->Nome = $n;
        $this->Cognome = $c;
        $this->Via = $v;
        $this->NumeroCivico = $nc;
        $this->Citta = $citta;
        $this->Provincia = $prov;
        $this->CAP = $cap;
        $this->Telefono = $telefono;
        $this->Email = $email;
        $this->Password = $pw;
    }

    /**
     * @param string $livello
     */

    public function setLivello(string $livello) 
    { $this->Livello = $livello; }

    public function setProfilo(EImmagine $p) 
    { $this->Profilo = $p; }    

    /**
     * @return string
     */
    public function getEmail(): string
    { return $this->Email; }

    /**
     * @return string
     */
    public function getNome(): string
    { return $this->Nome; }

    /**
     * @return string
     */
    public function getCognome(): string
    { return $this->Cognome; }

    /**
     * @return string
     */
    public function getVia(): string
    { return $this->Via; }

    /**
     * @return string
     */
    public function getNumeroCivico(): string
    { return $this->NumeroCivico; }

    /**
     * @return string
     */
    public function getCitta(): string
    { return $this->Citta; }

    public function getProfilo(): EImmagine
    { return $this->Profilo; }

    /**
     * @return string
     */
    public function getProvincia(): string
    { return $this->Provincia; }

    /**
     * @return string
     */
    public function getCAP(): string
    { return $this->CAP; }

    /**
     * @return string
     */
    public function getTelefono(): string
    { return $this->Telefono; }

    /**
     * @return string
     */
    public function getLivello(): string
    { return $this->Livello; }

    /**
     * @return string
     */
    public function getPassword(): string
    { return $this->Password; }
}

