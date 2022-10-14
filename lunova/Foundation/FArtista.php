<?php
class FArtista{
    public static function exist($email) : bool {

        $pdo = FConnectionDB::connect();

        $query = "SELECT * FROM artista WHERE Email = :email";
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

    /**
     * Memorizza un'istanza di EArtista sul database
     * @param EArtista $cliente
     */
    public static function store(EArtista $cliente): void {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO artista VALUES(:IdArtista,:Email,:Nome,:Cognome,:Via,:NCivico,:Provincia,:Citta,:CAP,:NTelefono,:Password,:Livello)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':IdArtista' => $cliente->getIdArtista(),
            ':Email' => $cliente->getEmail(),
            ':Nome'  =>$cliente->getNome(),
            ':Cognome' =>$cliente->getCognome(),
            ':Via' =>$cliente->getVia(),
            ':NCivico' =>$cliente->getNumeroCivico(),
            ':Provincia' =>$cliente->getProvincia(),
            ':Citta' =>$cliente->getCitta(),
            ':CAP' =>$cliente->getCAP(),
            ':NTelefono' =>$cliente->getTelefono(),
            ':Password' =>$cliente->getPassword(),
            ':Livello' =>$cliente->getLivello()
        ));
    }

    /**
     * Carica in RAM l'istanza di EArtista che possiede l' email fornita
     * @param EArtista $artista
     */
    public static function load(string $email) : EArtista {
        $pdo=FConnectionDB::connect();

        $query = "SELECT * FROM artista WHERE Email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute( [":email" => $email] );
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $Idcliente = $rows[0]['IdArtista'];
        $Email = $rows[0]['Email'];
        $Nome = $rows[0]['Nome'];
        $Cognome = $rows[0]['Cognome'];
        $Via = $rows[0]['Via'];
        $NumeroCivico = $rows[0]['NCivico'];
        $Provincia = $rows[0]['Provincia'];
        $Citta = $rows[0]['Citta'];
        $CAP = $rows[0]['CAP'];
        $Telefono = $rows[0]['NTelefono'];
        $Password = $rows[0]['Password'];
        $Livello = $rows[0]['Livello'];

        $utente = new EClient($Nome,$Cognome,$Via,$NumeroCivico,$Provincia,$Citta,$CAP,$Telefono,$Email,$Password,null,$Idcliente);


        return $utente;
    }



    public static function delete(string $email) {
        $pdo=FConnectionDB::connect();

        try {
            $ifExist = self::exist($email);
            if($ifExist) {
                $query = "DELETE FROM artista WHERE Email= :email";
                $stmt = $pdo->prepare($query);
                $stmt->execute([":email" => $email]);
                return true;
            }
            else{ return false;}
        }
        catch(PDOException $exception) {print("Errore".$exception->getMessage());}

    }



    public static function prelevaArtista(string $email) {
        $pdo=FConnectionDB::connect();

        try {
            $ifExist = self::exist($email);
            if($ifExist) {
                $query = "SELECT * FROM artista WHERE Email= :email";
                $stmt = $pdo->prepare($query);
                $stmt->execute( [":email" => $email] );
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $IdArtista = $rows[0]['IdArtista'];
                $Email = $rows[0]['Email'];
                $Nome = $rows[0]['Nome'];
                $Cognome = $rows[0]['Cognome'];
                $Via = $rows[0]['Via'];
                $NumeroCivico = $rows[0]['NCivico'];
                $Provincia = $rows[0]['Provincia'];
                $Citta = $rows[0]['Citta'];
                $CAP = $rows[0]['CAP'];
                $Telefono = $rows[0]['NTelefono'];
                $Password = $rows[0]['Password'];
                // $Livello = $rows[0]['Livello'];

                $utente = new EClient($Nome,$Cognome,$Via,$NumeroCivico,$Provincia,$Citta,$CAP,$Telefono,$Email,$Password,null,$IdArtista);
                return $utente;
            }
            else {return "Non ci sono clienti";}
        }
        catch (PDOException $exception) { print ("Errore".$exception->getMessage());}

    }





}