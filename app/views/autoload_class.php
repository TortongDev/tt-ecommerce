<?php
spl_autoload_register('autoload_class');
function autoload_class($class){

    $pathAll = array (
        './class',
        '../class',
        '../../class',
        '../../../class',
        '../../../../class',
        '../../../../../class'
    );
    
    foreach ($pathAll as $key => $value) {
        if(file_exists($value)):
            require_once "$value/$class.php";
        endif;
    }

}

?>