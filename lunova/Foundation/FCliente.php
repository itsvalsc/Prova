<?php

class FCliente
{


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









}