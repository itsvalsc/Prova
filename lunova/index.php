<?php
require_once 'Utility/autoload.php';
require_once 'StartSmarty.php';
require_once 'Smarty/smarty-dir/templates/index.php';

$controller = new CFrontController();
$controller->run($_SERVER['REQUEST_URI']);
//header('Location: templates/index.php');
//header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
//exit;
