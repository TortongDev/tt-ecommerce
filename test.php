<?php
    require_once "./autoload_class.php";
    $DB = new Connection(true);

    echo $DB->id_encrypt('12');
    echo "<br>";
    echo $DB->id_decrypt("HZAjxLaYlc7Df5sDL0fCKg==");
?>