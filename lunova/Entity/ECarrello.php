<?php

/**
 * Class ECarrello
 */

class ECarrello
{
    private $dischi = array();

    private string $id_utente;
    
    private int $id; 

    private bool $pagato;

    private float $totale;


    //TODO: fare un array associativo con dischi e quantità + metodi per modifica quantità

/**
     * @return bool|int
     */
    public function getPagato(): bool|int
    {
        return $this->pagato;
    }



    /**
     * @param bool|int $pagato
     */
    public function setPagato(bool|int $pagato): void
    {
        $this->pagato = $pagato;
    }

    /**
     * @param string $id
     * @param array $dischi
     *
     */
    public function __construct($ut)
    {
        if (1 === func_num_args()){
            $this->id = "F"  . random_int(0,100);
            $this->dischi = array();
            $this->totale = 0.0;
            $this->id_utente=$ut;
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
            $this->id_utente=$utente;
            $this->pagato=0;


        }

    }

    /**
     * @param string $mail_utente
     */
    public function setIdUtente(string $id_utente): void
    {
        $this->id_utente = $id_utente;
    }

    /**
     * @return string
     */
    public function getIdUtente(): string
    {
        return $this->id_utente;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }//

    /**
     * @param array $dischi
     */
    public function aggiungiDisco(EDisco $disco, int $QuantitaRichiesta): void
    {
        if($disco->getQuantita() >= $QuantitaRichiesta){
            $this->dischi[$disco->getId()] = $QuantitaRichiesta;
            $this->totale += $disco->getPrezzo() * $QuantitaRichiesta;
        }
        else print("Quantità non disponibile");

    }

    public function modificaQuantita(EDisco $disco, int $quantita): void
    {
        if ($disco->getQuantita() >= $quantita) {
            $differenzaPrezzo = ($this->dischi[$disco->getId()] - $quantita) * $disco->getPrezzo();
            $this->dischi[$disco->getId()] = $quantita;
            $this->totale += $differenzaPrezzo;
        }
    }

    /**
     * @param float $totale
     */
    public function setTotale(float $totale): void
    {
        $this->totale = $totale;
    }

    /**
     * @return float
     */
    public function getTotale(): float
    {
        return $this->totale;
    }
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getDischi(): array
    {
        return $this->dischi;
    }














}