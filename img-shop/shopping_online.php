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
    
    <link rel="icon" type="image/x-icon" href="./kanji_farm.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script  src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div id="wrapper">
   <?php include ('./header-template.php'); ?>
    <div class="container">
        <form action="#" method="get">
            <section class="shop-filter">
                <div class="form-group filter">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" name="produce_name" class="form-control" style="width: 90%">
                </div>
                <div class="form-group filter">
                    <label for="">ประเภทสินค้า</label>
                    <select  name="produce_type" class="form-control" style="width: 90%">
                        <option value="">-- กรุณาเลือก --</option>
                    </select>
                </div>
                <div class="form-group filter">
                    <label for="">สินค้าจากร้าน Partner</label>
                    <select name="produce_partner" class="form-control" style="width: 90%">
                        <option value="">-- กรุณาเลือก --</option>
                    </select>
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group filter">
                    <button type="submit" value="key-search" name="filter-search" class="btn btn-filter-skyblue float-right margin-right-60"> <i class="fa-solid fa-arrow-up-wide-short"></i> ค้นหา</button>
                    <!-- <button class="btn btn-filter-orange"> <i class="fa-solid fa-arrow-down-wide-short"></i> เก่าสุด</button> -->
                </div>
            </section>
        </form>
        <!-- แนะนำสินค้า -->
        <article class="product">
            <div class="center"><h1 class="main-text" style="margin-block-end: 0 !important;">สินค้าออนไลน์</h1></div>
            <div class="center"><h3 class="sub-text" style="margin-block-start: 0 !important;">สินค้าออนไลน์จากทาง Kanji Farm Online. </h3></div>
            <br>
          
            <section class="container-product-shop">
                <?php
               
                    $product_name   = isset($_GET['produce_name']) ? htmlspecialchars(trim($_GET['produce_name'])): '';
                    $produce_type   = isset($_GET['produce_type']) ? htmlspecialchars(trim($_GET['produce_type'])): '';
                    $produce_partner   = isset($_GET['produce_partner']) ? htmlspecialchars(trim($_GET['produce_partner'])): '';
                    $fillter_search = isset($_GET['filter-search']) ? htmlspecialchars(trim($_GET['filter-search'])): '';
                    $fillter = "";
                    if(empty($fillter_search)):
                        $fillter .= "1=1";
                    elseif(!empty($fillter_search) && !empty($product_name)):
                        $fillter .= "produce_name = $product_name"; 
                    elseif(!empty($fillter_search) && !empty($produce_type)):
                        $fillter .= "produce_name = $produce_type"; 
                    elseif(!empty($fillter_search) && !empty($produce_partner)):
                        $fillter .= "produce_name = $produce_partner"; 
                    elseif(!empty($fillter_search) && !empty($product_name) && !empty($produce_type)):
                        $fillter .= "produce_name = $product_name AND produce_type = $produce_type"; 
                    elseif(!empty($fillter_search) && !empty($produce_partner) && !empty($product_name) && !empty($produce_type)):
                        $fillter .= "produce_name = $produce_partner AND produce_name = $product_name AND produce_type = $produce_type"; 
                    elseif(!empty($fillter_search) && !empty($produce_partner) && !empty($product_name)):
                        $fillter .= "produce_name = $produce_partner AND produce_name = $product_name"; 
                    elseif(!empty($fillter_search) && !empty($produce_partner) && !empty($produce_type)):
                    $fillter .= "produce_name = $produce_partner AND produce_type = $produce_type"; 
                    else:

                    endif;
                    $checkAuthen->openConnection();
                    $stmt_product = $checkAuthen->pdo->prepare("SELECT * FROM `kanji_products` WHERE ? ");
                    $stmt_product->execute(array($fillter));
                    while($R_PRODUCT =  $stmt_product->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="box-product">
                    <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./backend_disc/bs-advance-admin/advance-admin/<?php echo $R_PRODUCT['product_img'] ?>" alt="">
                    </div>
                    <h3><a href="./shop_product.php?product_id=<?php echo $checkAuthen->id_encrypt($R_PRODUCT['product_id']); ?>"><?php echo $R_PRODUCT['product_name'] ?></a></h3>
                    <h4 class="sub-text short-text"><?php echo $R_PRODUCT['product_detail'] ?></h4>
                    <div class="detail-option">
                        <div class="stock">มีในสต๊อก 100 กรัม</div>
                        <div class="option-review">
                        <i class="fa-solid fa-star orange"></i>
                        <i class="fa-solid fa-star orange"></i>
                        <i class="fa-solid fa-star orange"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                    <h4 class="price">
                        <?php echo $R_PRODUCT['product_price']; ?><i class="fa-solid fa-baht-sign"></i>
                         / <?php echo '1 '.$R_PRODUCT['option_price'] ?>
                    
                    </h4>
                </div>
                <?php 
                    endwhile; 
                    $checkAuthen->closeConnection();    

                ?>
            </section>
        </article>
    </div>
    <div class="fillter-footer">
        <section><a href="./index.php"><i class="fa-solid fa-house"></i></a></section>
        <section class="main-navbar-footer" id="open-menu-filter-footer" ><i class="fa-solid fa-magnifying-glass"></i></section>
        <section><a href="./checkout_cart.php">
            <!-- <i class="fa-solid fa-cart-shopping"></i>  </a>  -->
            <a href="./checkout_cart.php"><i class="fa-solid fa-cart-shopping"></i> </a> 
                <span class="count-product-mobile">
                    <?php 
                        if(!empty($_SESSION['CART'])):
                            echo count($_SESSION['CART']);
                        else:
                        echo '0';
                        endif;
                    ?>
                </span>
        </section>
    </div>
    <?php include('./footer-template.php') ?>
    
</div>
</body>
<script>
      
    document.addEventListener('DOMContentLoaded', function(){
        const openMenuFilter = document.querySelector('#open-menu-filter-footer');
        const filter         = document.querySelectorAll('.filter');
        const shopFilter     = document.querySelector('.shop-filter');
        let click_icon_slide = false
        console.log(click_icon_slide);
        function open_slide (){
            openMenuFilter.addEventListener('click',()=>{  
                if(click_icon_slide == false){
                    filter.forEach(element => {
                    element.style.display = "block"
                    
                    element.style.padding = "10px"
                    shopFilter.style.display = "grid"
                    shopFilter.style.height = "450px"
                    shopFilter.style.gridTemplateColumns  = "1fr"
                    // openMenuFilter.style.transform = "rotate(178deg)"
                    openMenuFilter.style.transform = "scale(1.1,1.1)"
                    });
                    click_icon_slide = true
                }else{
                    filter.forEach(element => {
                        element.style.display = ""
                        shopFilter.style.display = ""
                        shopFilter.style.height = ""
                        shopFilter.style.gridTemplateColumns  = ""
                        openMenuFilter.style.transform = ""
                        click_icon_slide = false
                    });
                }
            })

        }   
        open_slide ()
        // function close_slide (){
        //     openMenuFilter.addEventListener('click',()=>{  
        //         filter.forEach(element => {
        //             element.style.display = ""
        //             shopFilter.style.display = ""
        //             shopFilter.style.height = ""
        //             shopFilter.style.gridTemplateColumns  = ""
        //             openMenuFilter.style.transform = ""
        //         });
        //     })

        // }   

    })

</script>
<!-- นำเข้าไฟล์ Base Controller -->
<script  src="./base_function.js"></script>

<script>
    const app = Vue.createApp(BaseControllers,{
        data() {
            return {
                showBox1: false,
                showBox2: false,
                showBox3: false,
                showBox4: false,
                showBox5: false,
                showBox6: false,
                menuSlide: 0
            }
        },methods: {

        },mounted() {
            
        },
    })
    app.mount('#wrapper')
</script>
</html>
<?php exit; ?>