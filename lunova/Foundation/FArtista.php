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
     * @param EArtista $artista
     */
    public static function store(EArtista $artista): void {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO artista VALUES(:IdArtista,:Email,:Nome,:Cognome,:Via,:NCivico,:Provincia,:Citta,:CAP,:NTelefono,:Password,:Livello)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':IdArtista' => $artista->getIdArtista(),
            ':Email' => $artista->getEmail(),
            ':Nome'  =>$artista->getNome(),
            ':Cognome' =>$artista->getCognome(),
            ':Via' =>$artista->getVia(),
            ':NCivico' =>$artista->getNumeroCivico(),
            ':Provincia' =>$artista->getProvincia(),
            ':Citta' =>$artista->getCitta(),
            ':CAP' =>$artista->getCAP(),
            ':NTelefono' =>$artista->getTelefono(),
            ':Password' =>$artista->getPassword(),
            ':Livello' =>$artista->getLivello()
        ));
    }

    /**
     * Carica in RAM l'istanza di EArtista che possiede l' email fornita
     * @param EArtista $artista

    public static function load(string $email) : EArtista {
        $pdo=FConnectionDB::connect();

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
        $Livello = $rows[0]['Livello'];

        $utente = new EArtista($Nome,$Cognome,$Via,$NumeroCivico,$Provincia,$Citta,$CAP,$Telefono,$Email,$Password,null,$IdArtista);


        return $utente;
    }
    */


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

    public static function load(string $email) {
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

                $utente = new EArtista($Nome,$Cognome,$Via,$NumeroCivico,$Provincia,$Citta,$CAP,$Telefono,$Email,$Password,null,$IdArtista);
                return $utente;
                //TODO: aggiustare costruttore per artista e cliente, ad artista aggiungere e recupare l'IBAN
            }
            else {return "Non ci sono artisti";}
        }
        catch (PDOException $exception) { print ("Errore".$exception->getMessage());}
    }

    //TODO:finire update artista
    public static function update(EArtista $art) : bool{
        $pdo = FConnectionDB::connect();
        $query = "UPDATE cliente SET IdCliente = :id, Email = :email, Nome = :nome, Cognome = :cognome,Via = :via, NCivico = :ncivico, Provincia = :provincia, Citta = :citta, CAP = :cap,NTelefono = :ntelefono, Password = :password, Livello = :livello   WHERE Email = :email";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":id" => $cl->getIdClient(),
            ":email" => $cl->getEmail(),
            ":nome" => $cl->getNome(),
            ":cognome" => $cl->getCognome(),
            ":via" => $cl->getVia(),
            ":ncivico" => $cl->getNumeroCivico(),
            ":provincia" => $cl->getProvincia(),
            ":citta" => $cl->getCitta(),
            ":cap" => $cl->getCAP(),
            ":ntelefono" => $cl->getTelefono(),
            ":password" => $cl->getPassword(),
            ":livello" => $cl->getLivello()));

        return $ris;

    }




}