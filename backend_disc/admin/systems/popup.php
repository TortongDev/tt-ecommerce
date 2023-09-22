<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งข่าวสาร</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    
        $statusPost = isset($_GET['status_post']) ? htmlspecialchars($_GET['status_post'])  : '';
        $status = isset($_GET['status']) ? htmlspecialchars($_GET['status'])  : '';
        $pagename = isset($_GET['pagename']) ? htmlspecialchars($_GET['pagename'])  : '';
        $message = "";
        if($status == 'post'){
            $message = "บันทึกเสร็จเรียบร้อยครับ";
        }
        if($status == 'delete'){
            $message = "ลบข้อมูลเรียบร้อยครับ";
        }
    ?>
    <script>
         let statusPost = '<?php echo $statusPost; ?>';
         let message = '<?php echo $message; ?>';
         let pagename = '<?php echo $pagename; ?>';
        post(statusPost,message,pagename)
        function post(status,message,pagename){
           
            if(statusPost =='success'){
                Swal.fire({
                    title: 'Success!',
                    text: message,
                    icon: 'success',
                    confirmButtonText: 'Cool'
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // if(Swal.fire('Saved!', '', 'success')){
                        location.href = pagename+'.php'
                    // }
                    
                } 
                })
                
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })

            }
        }
        document.addEventListener('DOMContentLoaded',()=>{
            
            
           
        })
    </script>
    
</body>
</html>