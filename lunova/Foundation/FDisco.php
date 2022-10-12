<?php

class FDisco {

    public static function exist($id) : bool {

        $pdo = FConnectionDB::connect();

        $query = "SELECT * FROM dischi WHERE ID = :id";
        $stmt= $pdo->prepare($query);
        $stmt->execute([":id" => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows)==0){
            return false;
        }
        else {
            return true;
        }
    }

    public static function store(EDisco $disco): void {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO dischi VALUES(:Iddisco,:titolo,:descrizione,:prezzo,:categoria,:artista,:quantita)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':Iddisco' => $disco->getID(),
            ':titolo' => $disco->getTitolo(),
            ':descrizione'  =>$disco->getDescrizione(),
            ':prezzo' =>$disco->getPrezzo(),
            ':categoria' =>$disco->getGenere(),
            ':artista' =>$disco->getAutore(),
            ':quantita' =>$disco->getQta()
        ));
    }

    public static function load(string $id) {
        $pdo=FConnectionDB::connect();

        try {
            $ifExist = self::exist($id);
            if($ifExist) {
                $query = "SELECT * FROM dischi WHERE ID= :id";
                $stmt = $pdo->prepare($query);
                $stmt->execute( [":id" => $id] );
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $IdDisco = $rows[0]['ID'];
                $titolo = $rows[0]['name'];
                $desc = $rows[0]['description'];
                $prez= $rows[0]['price'];
                $gen = $rows[0]['category_id'];
                $art = $rows[0]['artist_id'];
                $qta = $rows[0]['Qta'];


                $disco = new EDisco($titolo,$art,$prez,$desc,$gen,null,$qta);
                $disco->setID($IdDisco);
                return $disco;
            }
            else {return "Non ci sono clienti";}
        }
        catch (PDOException $exception) { print ("Errore".$exception->getMessage());}

    }


    public static function delete(string $ID_disco) {
        $pdo=FConnectionDB::connect();

        try {
            $ifExist = self::exist($ID_disco);
            if($ifExist) {
                $query = "DELETE FROM dischi WHERE ID= :id";
                $stmt = $pdo->prepare($query);
                $stmt->execute([":id" => $ID_disco]);
                return true;
            }
            else{ return print('File non trovato');}
        }
        catch(PDOException $exception) {print("Errore".$exception->getMessage());}

    }

}






















?>