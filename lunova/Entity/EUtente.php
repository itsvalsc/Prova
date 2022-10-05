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


    
    
    public function __construct($ut)
    {
        if (5 === func_num_args()){
            $this->Nome = func_get_arg(0);
            $this->Cognome = func_get_arg(1);
            $this->Email = func_get_arg(2);
            $this->Password = func_get_arg(3);
            $this->Livello = func_get_arg(4);    //scelta multipla per il livello di iscrizione
            $this->Via = "";
            $this->NumeroCivico = "";
            $this->Citta = "";
            $this->Provincia = "";
            $this->CAP = "";
            $this->Telefono = "";
            $this->Profilo = null;
        }
        elseif (12 === func_num_args()){
            $this->Nome = func_get_arg(0);
            $this->Cognome = func_get_arg(1);
            $this->Email = func_get_arg(2);
            $this->Password = func_get_arg(3);
            $this->Livello = func_get_arg(4);    //scelta multipla per il livello di iscrizione
            $this->Via = func_get_arg(5);
            $this->NumeroCivico = func_get_arg(6);
            $this->Citta = func_get_arg(7);
            $this->Provincia = func_get_arg(8);
            $this->CAP = func_get_arg(9);
            $this->Telefono = func_get_arg(10);
            $this->Profilo = func_get_arg(11);

        }

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

