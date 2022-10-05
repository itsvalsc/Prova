<?php

class FPersistentManager{
	private static $instance;

	public static function getInstance() {
		if(!isset(self::$instance)){
			self::$instance = new FPersistentManager();
		}
		return self::$instance;
	}

	public function exist() : bool {

	}

	public function load() {

	}


	public function store() {

	}


	public function delete() {

	}


	public function update() {

	}


	public function prelevaProdotti() {

	}


	public function prelevaCarrello() {

	}




}