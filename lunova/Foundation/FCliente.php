<?php

class FCliente
{

    private static $class = "Cliente";
    private static $table = "cliente";


    public static function bind($statement, ECliente $cliente)
    {
        $statement->bindValue(':IdCliente', $cliente->getIdCliente(), PDO::PARAM_STR);
        $statement->bindValue(':Email', $cliente->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(':Nome', $cliente->getNome(), PDO::PARAM_STR);
        $statement->bindValue(':Cognome', $cliente->getCognome(), PDO::PARAM_STR);
        $statement->bindValue(':Via', $cliente->getVia(), PDO::PARAM_STR);
        $statement->bindValue(':NCivico', $cliente->getNumeroCivico(), PDO::PARAM_STR);
        $statement->bindValue(':Provincia', $cliente->getProvincia(), PDO::PARAM_STR);
        $statement->bindValue(':Citta', $cliente->getCitta(), PDO::PARAM_STR);
        $statement->bindValue(':CAP', $cliente->getCAP(), PDO::PARAM_STR);
        $statement->bindValue(':NTelefono', $cliente->getTelefono(), PDO::PARAM_STR);
        $statement->bindValue(':Password', password_hash($cliente->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
        $statement->bindValue(':Livello', $cliente->getLivello(), PDO::PARAM_STR);
    }
    public static function exist($email) : bool {

	    $pdo = FConnectionDB::connect();

	    $query = "SELECT * FROM cliente WHERE Email = :email";
	    $stmt= $pdo->prepare($query);
	    $stmt->execute([":email" => $email]);
	    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    if (count($rows)==0){
		    return false;
	    }
	    else {
		    return true;
	    }
    }

    public static function store($cliente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO cliente VALUES(:IdCliente,:Nome,:Cognome,:Via,:NCivico,:Provincia,:Citta,:CAP,:NTelefono,:Password,:Livello)";
        $stmt = $pdo->prepare($query);
        FCliente::bind($query,$cliente);
        $stmt->execute();
        return $stmt;


        }










}