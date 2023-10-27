<?php
    require_once __DIR__."/app/config/config_pach.php";
    require_once PATCH_CONNECTION;
    $checkAuthen = new Connection();
    $checkAuthen->authenPermission();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
    <link rel="icon" type="image/x-icon" href="./img-shop/icon/title.ico">
    <style>
        .star-color-over {
            color: orange !important;
        }
        .star {
            display: inline;
        }
        html,body {min-height:100vh;background-color: white !important}
        footer {margin-top: 136px !important;}
    </style>
</head>
<body>
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="container">
        <div class="tabbar">
            <!-- <h3 class="main-text">
                Home > shopping > Coffee
            </h3> -->
        </div>
        <?php 
            $checkAuthen->openConnection();
            $id = isset($_GET['product_id']) ? htmlspecialchars(trim($_GET['product_id'])) : '';
            $stmt_product = Connection::$pdo->prepare("SELECT * FROM `kanji_products` WHERE ? AND product_id = ?");
            $stmt_product->execute(array('1=1',$checkAuthen->id_decrypt($id)));
            while($read =  $stmt_product->fetch(PDO::FETCH_ASSOC)):
        ?>
        <div class="container-shopping-product">
            <div class="col-shopping-1">
                <div class="img-preview">
                    <img src="./app/views/<?php echo $read['product_img'] ?>" alt="">
                </div>
            </div>
            <div class="col-shopping-1">
                <form action="./post_cart.php" method="POST">
                    <div class="shopping-detail">
                        <h2 class="main-text margin-block-0"><?php echo $read['product_name'] ?></h2>
                        <h3 class="sub-text">ประเภท :  <?php echo $read['product_type_name'] ?></h3>
                        <h3 class="main-text">รหัสสินค้า : <?php echo $read['product_member_id'] ?><?php echo $read['product_id'] ?></h3>
                        <h3 class="main-text">สถานะของสินค้า : <?php if($read['product_status'] === 1 ): echo "พร้อมส่ง"; else: echo "รอสินค้า"; endif; ?></h3>
                        <br>
                        <hr>
                        <h1 class="main-text text-orange margin-block-0"> <?php echo $read['product_price'] ?> THB</h1>
                        <br>
                        <label for="amount" class="sub-text">เลือกจำนวน</label>
                        <input type="number" name="product_amount" value="1" id="product_amount" class="form-control">
                        <div class="form-group">
                    
                                <input type="hidden" name="product_id" value="<?php echo $read['product_id'] ?>">
                                <input type="hidden" name="product_member_id" value="<?php echo $read['product_member_id'].$read['product_id'] ?>">
                                <input type="hidden" name="product_name" value="<?php echo $read['product_name'] ?>">
                                <input type="hidden" name="product_type" value="<?php echo $read['product_type_name'] ?>">
                                <input type="hidden" name="product_price" value="<?php echo $read['product_price'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['AUTHEN_USER_ID'] ?>">
                        
                                <button type="submit" class="btn btn-checkout">
                                    <i class="fa-solid fa-cart-plus"></i> เพิ่มลงตะกร้า
                                </button>
                            
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php endwhile; ?> 
    </div>
    <?php include ('./footer-template.php'); ?>
</div>
</body>
<script  src="./base_function.js"></script>
<script>
   document.addEventListener('DOMContentLoaded',()=>{
        
        const stars = document.querySelectorAll('#star');
        stars.forEach((star, index) => {
           
            star.addEventListener('mouseover', () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].style.color = 'orange';
                }
            });
            
            star.addEventListener('mouseout', () => {
                stars.forEach((s, i) => {
                    console.log(i+'>'+index);
                    if (i > index) {
                        s.style.color = '';
                    }
                });
            });

        });
      
        let status_info = false
        const amount = document.querySelector('#product_amount')
        const info_show = document.querySelector('.info-show')
        const onShow = document.querySelector('#onShow')
        onShow.addEventListener('click',function(){
            if (status_info == false) {
                info_show.style.height = '100%' 
                status_info = true
            }else{
                info_show.style.height = ''
                status_info = false
            }
        })

        let status_review = false
        const review_show = document.querySelector('.review-show')
        const onShow_review = document.querySelector('#onShow_review')
        onShow_review.addEventListener('click',function(){
            if (status_review == false) {
                review_show.style.height = '100%' 
                status_review = true
            }else{
                review_show.style.height = ''
                status_review = false
            }

        })
    
   
        amount.addEventListener('change',()=>{
            if(amount.value < 1){
                amount.value = 1
                alert('ไม่สามารถเลือกจำนวนน้อยกว่า 1 ชิ้นได้');
        }
        })


   

   })
    const app = Vue.createApp(BaseControllers)
    app.mount('#wrapper')
</script>
</html>