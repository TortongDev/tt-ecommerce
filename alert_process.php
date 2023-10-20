<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งเตือน</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php 
        session_start();
        $STATUS_LOGIN = isset($_GET['STATUS_LOGIN']) ? htmlspecialchars($_GET['STATUS_LOGIN']) : '';
    ?>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            const STATUS_LOGIN = <?php echo $STATUS_LOGIN;?>;
            const SESSIONID = "<?php echo @$_SESSION['LOGIN_STATUS'];?>";
            console.log(SESSIONID);
            if(STATUS_LOGIN == 1 && SESSIONID != 1){
                Swal.fire({
                    title: 'เข้าสู่ระบบล้มเหลว',
                    text: "โปรดลองเข้าสู่ระบบอีกครั้ง!",
                    icon: 'warning',
                    // showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'กลับไปเข้าสู่ระบบ'
                }).then((result) => {
                if (result.isConfirmed) {
                   
                    location.href = "login.php";

                }
                })
                
            }else{

            }
           
        })
    </script>
</body>
</html>