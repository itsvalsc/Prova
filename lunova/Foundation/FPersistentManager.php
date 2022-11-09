<?php

class FPersistentManager{
	private static $instance;

	public static function getInstance() {
		if(!isset(self::$instance)){
			self::$instance = new FPersistentManager();
		}
		return self::$instance;
	}
    //TODO: dopo classi foundation aggiornare[da fare]
    public function exist(string $Fclass, $key1, $key2=null) : bool {
        $ris = $Fclass::exist($key1,$key2);
        return $ris;
    }

    public function load(string $Fclass, $key1) {
        $object = $Fclass::load($key1);
        return $object;
    }


    public function store(object $obj,$mailutente=null) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris = $Fclass::store($obj,$mailutente);
        return $ris;
    }


    public function delete(string $Fclass, $key1, $key2=null, $key3=null) : bool {
        $ris = $Fclass::delete($key1,$key2,$key3);
        return $ris;
    }


    public function update(object $obj) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris = $Fclass::update($obj);
        return $ris;
    }


	public function prelevaDischi() : array {
        return FDisco::prelevaDischi();
	}
    public function prelevaDischiperGen($genere):array {
        return FDisco::prelevaDischiperGenere($genere);
    }
    public function prelevaDischiperAutore($aut):array{
        return FDisco::prelevaDischiperAutore($aut);
    }
    public function prelevaDischiperTitolo($titolo):array{
        return FDisco::prelevaDischiperTitolo($titolo);
    }

    public function prelevaSondaggioInCorso(){
        $sondaggio = FSondaggio::load_incorso();
        return $sondaggio;
    }
    public function prelevaSondaggi(){
        $sondaggi = FSondaggio::prelevaSondaggi();
        return $sondaggi;
    }

    public function prelevaRichieste(){
        $richieste = FRichiesta::load_richieste();
        return $richieste;
    }


    public function prelevaOrdini($ut){
        $ordini = FOrdine::prelevaOrdini();
        return $ordini;
    }

    public function prelevaDischiSondaggio(ESondaggio $sondaggio): array {
        $disco1 = $sondaggio->getDisco1();
        $disco2 = $sondaggio->getDisco2();
        $disco3 = $sondaggio->getDisco3();
        $load_disco1 = $sondaggio->load("FDisco",$disco1);
        $load_disco2 = $sondaggio->load("FDisco",$disco2);
        $load_disco3 = $sondaggio->load("FDisco",$disco3);
        $dischi = array($load_disco1,$load_disco2,$load_disco3);
        return $dischi;
    }





}