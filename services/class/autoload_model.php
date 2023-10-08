<?php
spl_autoload_register('autoload_model');
function autoload_model($class){

    $pathAll = array (
        '../app/class',
        '../../app/class',
        '../../../app/class',
        '../../../app/class',
        '../../../../app/class',
        '../../../../../app/class',

    );
    
    foreach ($pathAll as $key => $value) {
        if(file_exists($value)):
            require_once "$value/$class.php";
        endif;
    }

}

?>