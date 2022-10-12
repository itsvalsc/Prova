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

}






















?>