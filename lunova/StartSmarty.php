<?php
require('Smarty/Smarty.class.php');

class StartSmarty{
    public static function configuration(){
        $smarty=new Smarty();
        $smarty->setTemplateDir('Smarty/templates/');
        $smarty->setCompileDir('Smarty/templates_c/');
        $smarty->setConfigDir('Smarty/configs/');
        $smarty->setCacheDir('Smarty/cache/');
        return $smarty;
    }
}
