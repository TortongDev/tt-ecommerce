<?php
require_once "./services/class/Connection.php";
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
   
</head>
<body>
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="container">
        <div class="tabbar">
            <h3 class="main-text">
                Home > shopping > Coffee
            </h3>
        </div>
        <?php 
            $checkAuthen->openConnection();
            $id = isset($_GET['product_id']) ? htmlspecialchars(trim($_GET['product_id'])) : '';
            $stmt_product = $checkAuthen->pdo->prepare("SELECT * FROM `kanji_products` WHERE ? AND product_id = ?");
            $stmt_product->execute(array('1=1',$checkAuthen->id_decrypt($id)));
            while($read =  $stmt_product->fetch(PDO::FETCH_ASSOC)):
        ?>
        <div class="container-shopping-product">
            
            <div class="col-shopping-1">
                <!-- <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div> -->
            </div>
            <div class="col-shopping-1">
                <div class="img-preview">
                    <img src="./backend_disc/bs-advance-admin/advance-admin/<?php echo $read['product_img'] ?>" alt="">
                </div>
            </div>
            <div class="col-shopping-1">
                <form action="./post_cart.php" method="POST">
                    <div class="shopping-detail">
                        <h2 class="main-text margin-block-0"><?php echo $read['product_name'] ?></h2>
                        <h3 class="sub-text">ประเภท :  <?php echo $read['product_type_name'] ?></h3>
                        <h3 class="main-text">รหัสสินค้า : <?php echo $read['product_member_id'] ?><?php echo $read['product_id'] ?></h3>
                        <h3 class="main-text">สถานะของสินค้า : <?php if($read['product_status'] === 1 ): echo "พร้อมส่ง"; else: echo "รอสินค้า"; endif; ?></h3>
                        <br><hr>

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

        <article class="shopping">
            <div class="tabbar-detail">
                <div class="grid-3"> 
                    <h3 class="sub-text"  @click="showDetail(1)">รายละเอียด</h3>
                    <h3 class="sub-text" style="width: 250px;"  @click="showDetail(2)">ขั้นตอนการจัดส่งของทางร้าน</h3>
                    <h3 class="sub-text"  @click="showDetail(3)">รีวิวจากผู้ซื้อ</h3>

                </div>
               
            </div>
            <section class="shopping-detail">
                <div class="sub-shopping-detail" v-show="detailStatus1">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde amet sint, fugit facere nihil inventore ex nesciunt consequuntur vel distinctio eius commodi ipsam ipsum, aliquam porro soluta ea possimus recusandae ipsa pariatur delectus! Exercitationem, pariatur omnis alias reprehenderit recusandae fugit cupiditate animi id! Repellendus quod praesentium, sunt quia, pariatur eum ratione consectetur recusandae odio sint, dicta error illum repudiandae hic sequi ipsam tenetur laudantium totam sit exercitationem? Ea, adipisci enim ipsam laborum praesentium hic repellat obcaecati quia quod deleniti maiores id rerum expedita harum soluta! Maxime magni incidunt explicabo temporibus ad quis natus voluptate libero, rem molestias adipisci laudantium architecto.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde amet sint, fugit facere nihil inventore ex nesciunt consequuntur vel distinctio eius commodi ipsam ipsum, aliquam porro soluta ea possimus recusandae ipsa pariatur delectus! Exercitationem, pariatur omnis alias reprehenderit recusandae fugit cupiditate animi id! Repellendus quod praesentium, sunt quia, pariatur eum ratione consectetur recusandae odio sint, dicta error illum repudiandae hic sequi ipsam tenetur laudantium totam sit exercitationem? Ea, adipisci enim ipsam laborum praesentium hic repellat obcaecati quia quod deleniti maiores id rerum expedita harum soluta! Maxime magni incidunt explicabo temporibus ad quis natus voluptate libero, rem molestias adipisci laudantium architecto.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde amet sint, fugit facere nihil inventore ex nesciunt consequuntur vel distinctio eius commodi ipsam ipsum, aliquam porro soluta ea possimus recusandae ipsa pariatur delectus! Exercitationem, pariatur omnis alias reprehenderit recusandae fugit cupiditate animi id! Repellendus quod praesentium, sunt quia, pariatur eum ratione consectetur recusandae odio sint, dicta error illum repudiandae hic sequi ipsam tenetur laudantium totam sit exercitationem? Ea, adipisci enim ipsam laborum praesentium hic repellat obcaecati quia quod deleniti maiores id rerum expedita harum soluta! Maxime magni incidunt explicabo temporibus ad quis natus voluptate libero, rem molestias adipisci laudantium architecto.
                </div>
                <div class="step-tranfer-shopping" v-show="detailStatus2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur voluptas porro nam sint ratione similique quos explicabo distinctio omnis, consectetur itaque ipsam quasi, facilis, aliquam ut consequuntur illum iste! Reprehenderit deleniti reiciendis a excepturi, voluptate veniam ab? Facere pariatur reprehenderit, iste eius unde nobis ea culpa, illo deleniti sequi rem aspernatur nostrum possimus. Earum quod aliquid non optio qui suscipit! Soluta fugit consequuntur, repellat saepe minus non assumenda, quasi rem officiis harum hic commodi? Aut nobis unde vel, quia distinctio ipsa, nulla enim explicabo perspiciatis qui mollitia autem tenetur magni consequuntur harum nisi quae obcaecati. Soluta deleniti eius voluptatem illum.
                </div>
                <div class="review" v-show="detailStatus3">
                    <textarea name="" class="form-control" style="" id="" cols="30" rows="10"></textarea>
                </div>
            </section>
        </article>
        <?php endwhile; ?>
    </div>
    <?php include ('./footer-template.php'); ?>
</div>
</body>
<script  src="./base_function.js"></script>
<script>
   document.addEventListener('DOMContentLoaded',()=>{
    const amount = document.querySelector('#product_amount')
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