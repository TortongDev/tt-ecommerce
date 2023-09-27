<?php

    require_once "./autoload_class.php";
    $db     = new Connection(true);
    $banner = new Banner(Connection::$pdo);






    $banner = Banner::selectFind('123',' wwww',' sddddd ');


?>