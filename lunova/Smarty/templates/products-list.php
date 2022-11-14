<?php
require_once "C:\\xampp\\htdocs\\lunova\\inc\\init.php";
//$products = FDisco::prelevaDischi();
require_once "Foundation/FCliente.php";
require_once "Entity/ECliente.php";
require_once "./Entity/EUtente.php";
require_once "Entity/ECarta.php";
require_once "Entity/EWallet.php";
require_once "Foundation/FConnectionDB.php";
require_once "inc/configdb.php";
require_once "Foundation/FDisco.php";
require_once "Entity/EDisco.php";
require_once "Entity/EOrdine.php";
require_once "Foundation/FOrdine.php";
require_once "Entity/ESondaggio.php";
require_once "Entity/ERichiesta.php";
require_once "Foundation/FSondaggio.php";
require_once "Foundation/FRichiesta.php";
require_once "Entity/EVotazione.php";
require_once "Foundation/FVotazione.php";
require_once "Foundation/FPersistentManager.php";
require_once "Foundation/FArtista.php";
require_once "Entity/EArtista.php";
require_once "inc/init.php";
?>

<div class ='row'>
    <?php if(Products) : ?>
        <?php foreach(Products as $product): ?>

            <div class="card" style="width: 18rem;">
                <img src="https://media.istockphoto.com/photos/vinyl-record-picture-id134119615?k=20&m=134119615&s=612x612&w=0&h=zI6Fig1j8mbZp16CgvaDRMPHAzTaBNhhcBR0AldRXtw=" alt="prova">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->getTitolo() ?></h5>
                    <h6 class = "card-subtitle mb-2 text-muted"><?php echo $product->getPrezzo() ?> $</h6>
                    <p class="card-text"><?php echo $product->getDescrizione() ?></p>
                    <!--<button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="location.href='<?php //echo ROOT_URL . '?page=view-product&id=' . esc_html($product->getID()); ?>'">Vedi</button>-->
                    <button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="#">Vedi</button>
                    <form method="post">
                        <!--<input type="hidden" name="id" value="<?php// echo esc_html($product->getID()); ?>">-->
                        <input type="hidden" name="id" value="#"
                        <input name="add_to_cart" type="submit" class="btn btn-primary btn-sm btn-block rounded-0" value="Aggiungi al carrello">
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun Prodotto disponibile...</p>
    <?php endif;?>

</div>
