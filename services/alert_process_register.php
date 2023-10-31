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
        $STATUS_REGISTER = isset($_GET['STATUS_REGISTER']) ? htmlspecialchars($_GET['STATUS_REGISTER']) : '';
    ?>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            const STATUS_REGISTER = <?php echo $STATUS_REGISTER;?>;
            const SESSIONID = "<?php echo @$_SESSION['LOGIN_STATUS'];?>";
            console.log(SESSIONID);
            if(STATUS_REGISTER == 1 && SESSIONID != 1){
                Swal.fire({
                    title: 'สมัครเรียบร้อย',
                    text: "สามารถนำข้อมูลของท่านไปเข้าสู่ระบบเพื่อซื้อสินค้าได้เลย",
                    icon: 'success',
                    // showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'กลับไปเข้าสู่ระบบ'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "../login.php";
                }
                })
                
            }else{

            }
           
        })
    </script>
</body>
</html>