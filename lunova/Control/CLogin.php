<?php
class CLogin{

    /**
     * Va a riconoscere il browser tramite il 'PHPSESSID'
     * @return bool
     */
    public static function isLogged(){
        $login = false;
        if (isset($_COOKIE['PHPSESSID'])){
            if (FSessione::status() == PHP_SESSION_NONE){
                FSessione::start();
            }
        }
        if(FSessione::getUtente()!=null) {
            $login = true;
        }
        return $login;
    }

    public static function login(){
        if(static::isLogged()){
            //TODO: mettere la view da utente loggato
        }else{
            //TODO: view login
        }
    }

    /**
     * Effettua il logout e chiude la sessione
     */
    public static function logout(){
        FSessione::start();
        FSessione::unset();
        FSessione::destroy();
        header('Location: /lunova/');
    }

     //TODO : funzione verifica login da fare dopo aver scritto il persistent manager

    //TODO : scegliere se unificare le tabelle di artista amministratore e artista per poter fare il login

}
