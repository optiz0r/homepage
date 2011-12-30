<?php

$main = Homepage_Main::instance();
$req  = $main->request();

$this->smarty->assign('requested_page', $req->request_string());


?>