<?php

class FPersistentManager{
	private static $instance;

	public static function getInstance() {
		if(!isset(self::$instance)){
			self::$instance = new FPersistentManager();
		}
		return self::$instance;
	}
//TODO: dopo classi foundation aggiornare
    public function exist(string $Fclass, $key1) : bool {
        $ris = $Fclass::exist($key1);
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


	public function prelevaProdotti() {

	}


	public function prelevaCarrello() {

	}




}