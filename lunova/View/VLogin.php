<?php
class VLogin{

    private $smarty;

    /**
     * VLogin constructor.
     */
    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * @param $template
     */
    public function setTemplate($template){
        $this->smarty->assign($template);
    }

    /**
     * @return mixed|string
     */
    public function getEmail(){
        if (isset($_POST['Email']))
            return $_POST['Email'];
        else{
            return "";
        }
    }

    /**
     * @return mixed|string
     */
    public function getPwd(){
        if (isset($_POST['Password']))
            return $_POST['Password'];
        else{
            return "";
        }
    }


}
