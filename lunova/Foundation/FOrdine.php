<?php
class FOrdine{
    public static function exist($id) : bool {

        $pdo = FConnectionDB::connect();

        $query = "SELECT * FROM ordine WHERE IdOrdine = :id";
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

    public static function store(EOrdine $ordine): void {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO ordine VALUES(:IdOrdine,:CittaSped,:CAPSped,:IndirizzoSped,:ModPagamento,:Dischi,:TotOrdine,:IdCliente)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':IdOrdine' => $ordine->getIdOrdine(),
            ':CittaSped' => $ordine->getCittaSpe(),
            ':CAPSped'  =>$ordine->getCapSped(),
            ':IndirizzoSped' =>$ordine->getIndirizzoSped(),
            ':ModPagamento' =>$ordine->getModPagamento(),
            ':Dischi' =>$ordine->getDischi(),
            ':TotOrdine' =>$ordine->getTotOrdine(),
            ':IdCliente' =>$ordine->getIdCliente()
        ));
    }

    public static function load(string $idor) : EOrdine {
        $pdo=FConnectionDB::connect();

        $query = "SELECT * FROM ordine WHERE IdOrdine= :idor";
        $stmt = $pdo->prepare($query);
        $stmt->execute( [":idor" => $idor] );
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $IdOrdine = $rows[0]['IdOdine'];
        $CittàSpe = $rows[0]['CittaSpe'];
        $CAPSped = $rows[0]['CAPSped'];
        $IndirizzoSped = $rows[0]['IndirizzoSped'];
        $ModPagamento = $rows[0]['ModPagamento'];
        $Dischi = $rows[0]['Dischi'];
        $TotOrdine = $rows[0]['TotOrdine'];
        $IdCliente = $rows[0]['IdCliente'];

        $ordine = new EOrdine($IdCliente);
        /*
        $ordine->setIdOrdine($IdOrdine);
        $ordine->setCittaSpe($CittàSpe);
        $ordine->setCapSped($CAPSped);
        $ordine->setIndirizzoSped($IndirizzoSped);
        $ordine->setModPagamento($ModPagamento);
        $ordine->setTotOrdine($TotOrdine);
        */
        $ordine->Compile($IdOrdine, $CittàSpe, $CAPSped, $IndirizzoSped, $ModPagamento, $TotOrdine);

        return $ordine;
    }

    public static function delete(string $idor) {
        $pdo=FConnectionDB::connect();

        try {
            $ifExist = self::exist($idor);
            if($ifExist) {
                $query = "DELETE FROM ordine WHERE IdOrdine= :idor";
                $stmt = $pdo->prepare($query);
                $stmt->execute([":idor" => $idor]);
                return true;
            }
            else{ return false;}
        }
        catch(PDOException $exception) {print("Errore".$exception->getMessage());}

    }







}