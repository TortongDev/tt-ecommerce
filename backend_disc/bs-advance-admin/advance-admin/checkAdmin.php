<?php
class checkAdmin {

    public function checkAdmin()
    {
        if(empty($_SESSION['AUTHEN_USER_ID'])):
            header("Location: authen.php");
            exit;
        else:

        endif;

    }
    public function checkLoginAdmin()
    {
        if(!empty($_SESSION['AUTHEN_USER_ID'])):
            header("Location: index.php");
            exit;
        else:

        endif;

    }
}

?>