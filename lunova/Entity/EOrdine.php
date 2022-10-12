<?php
/**
 * ok
 * @package Entity
 */
class EOrdine {
    private string $IdOrdine;

    private string $CittaSped;

    private string $CAPSped;

    private string $IndirizzoSped;

    private string $ModPagamento;

    private $Dischi = array();

    private float $TotOrdine;

    private string $IdCliente;


    public function __construct(String $Idcl){
        $this->IdOrdine = random_int(0,1000);
        $this->TotOrdine = 0.0;
        $this->IdCliente = $Idcl;
    }

       


    //metodi get

    public function getCittaSpe(): string 
    { return $this->CittaSped; }

    public function getIdOrdine(): string 
    { return $this->IdOrdine; }

    public function getCapSped(): string 
    { return $this->CAPSped; }

    public function getIndirizzoSped(): string 
    { return $this->IndirizzoSped; }

    public function getModPagamento(): string 
    {return $this->ModPagamento; }

    public function getDischi(): array 
    { return $this->Dischi; }

    public function getTotOrdine(): float 
    {return $this->TotOrdine;}

    public function getIdCliente(): string 
    { return $this->IdCliente;}



    //metodi set

    public function setCittaSpe(string $cittaspe): void 
    { $this->CittaSped = $cittaspe; }

    public function setIdOrdine($IdOrdine): void 
    { $this->IdOrdine = $IdOrdine ; }

    public function setCapSped(string $cap): void {
     $this->CAPSped = $cap; }

    public function setIndirizzoSped( string $ind): void 
    { $this->IndirizzoSped = $ind ; }

    public function setModPagamento(string $mod): void 
    { $this->ModPagamento = $mod ; }

    public function setDischi(array $dischi): void 
    { $this->Dischi = $dischi ; }

    public function setTotOrdine( float $tot): void
    { $this->TotOrdine = $tot ;}

    public function setIdCliente(string $IdCli): void
    { $this->IdCliente = $IdCli;}


    // _METHODS_
    
    public function addDisco(EOrdineItem $orditem){
        array_push($this->Dischi, $orditem);
    }

    public function NumericTotal(){
        foreach($this->Dischi as $disco){
            $this->TotOrdine += $disco->getTotPrice();
        }
    }

    public function Compile($IdOrdine, $CittàSpe, $CAPSped, $IndirizzoSped, $ModPagamento, $TotOrdine): void
    {
        $this->setIdOrdine($IdOrdine);
        $this->setCittaSpe($CittàSpe);
        $this->setCapSped($CAPSped);
        $this->setIndirizzoSped($IndirizzoSped);
        $this->setModPagamento($ModPagamento);
        $this->setTotOrdine($TotOrdine);
    }







































}

?>