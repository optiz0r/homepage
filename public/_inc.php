<?php

if (isset($_SERVER['HOMEPAGE_CONFIG']) && 
    file_exists($_SERVER['HOMEPAGE_CONFIG']) &&
    is_readable($_SERVER['HOMEPAGE_CONFIG'])) {
    require_once($_SERVER['HOMEPAGE_CONFIG']);
} else {
    require_once '/etc/homepage/config.php';
}

require_once SihnonFramework_Lib . 'SihnonFramework/Main.class.php';

SihnonFramework_Main::registerAutoloadClasses('SihnonFramework', SihnonFramework_Lib,
												'Homepage', Homepage_Lib);

?>
