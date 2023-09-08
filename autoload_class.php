<?php
spl_autoload_register('autoload');

function autoload($class){

    $pathAll = array (
        './services/class/',
        '../services/class/',
        '../../services/class/',
        '../../../services/class/',
        '../../../../services/class/',
        '../../../../../services/class/',
        '../../../../../../services/class/'
    );
    
    foreach ($pathAll as $key => $value) {
        if(file_exists($value)):
            require_once "$value/$class.php";
        endif;
    }

}

?>