<?php
class checkAdmin {

    public function checkAdmin()
    {
        if(empty($_SESSION['AUTHEN_ADMIN_ID'] )):
            header("Location: authen.php");
            exit;
        else:
            

        endif;

    }
    public function checkLoginAdmin()
    {
        if(!empty($_SESSION['AUTHEN_ADMIN_ID'] )):
            header("Location: index.php");
            exit;
        else:
            // header("Location: authen.php");

        endif;

    }
}

?>