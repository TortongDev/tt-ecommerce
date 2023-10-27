<?php
    require_once __DIR__."/app/config/config_pach.php";
    require_once PATCH_CONNECTION;
    $checkAuthen = new Connection();
    $checkAuthen->authenPermission();


    $product_name   = isset($_GET['product_name']) ? htmlspecialchars(trim($_GET['product_name'])): '';
    $product_type   = isset($_GET['product_type']) ? htmlspecialchars(trim($_GET['product_type'])): '';
    $product_partner   = isset($_GET['product_partner']) ? htmlspecialchars(trim($_GET['product_partner'])): '';
    $fillter_search =  isset($_GET['filter_search']) ? htmlspecialchars(trim($_GET['filter_search'])):'';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="icon" type="image/x-icon" href="./img-shop/icon/title.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script  src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./style.css">
    
    <style>
        .right {
            float: right;
            margin-inline-end: 80px;
        }
        .form-group {
            margin-right: 0;
            margin-block-start: 23px;
          
        }
        .grid-2 {
            grid-template-columns: 1fr 1fr !important;
            grid-gap: 0px !important;
        }
       
    </style>

</head>
<body>
<div id="wrapper">
   <?php include ('./header-template.php'); ?>
    <div class="container">
        <form action="#" method="get">
            <section class="shop-filter">
                <div class="form-group filter w3-container">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" name="product_name" value="<?php echo $product_name; ?>" class="w3-input" style="width: 90%">
                </div>
                <div class="form-group filter w3-container">
                    <label for="">ประเภทสินค้า</label>
                    <select  name="product_type" class="w3-input" style="width: 90%">
                        <option value="">-- กรุณาเลือก --</option>
                        <?php
                            $session_search_type_name   = isset($_GET['product_type']) ? htmlspecialchars(trim($_GET['product_type'])) : '';
                        ?>
                        <?php 
                            $checkAuthen->openConnection();
                            $stmt_type_product = Connection::$pdo->prepare("SELECT `product_type_id`,`product_type_name` FROM `kanji_product_type` WHERE ?");
                            $stmt_type_product->execute(array("1=1"));
                            while($T_PRODUCT =  $stmt_type_product->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option value="<?php echo $T_PRODUCT['product_type_name'];?>" <?php echo ($T_PRODUCT['product_type_name']==$session_search_type_name)? 'selected':'' ?>><?php echo $T_PRODUCT['product_type_name']; ?></option>
                        <?php 
                            endwhile;
                            $checkAuthen->closeConnection();
                        ?>
                    </select>
                </div>
                <div class="form-group filter w3-container">
                    <label for="">สินค้าจากร้าน Partner</label>
                    <select name="product_partner" class="w3-input" style="width: 90%">
                        <?php
                            $session_search_partner   = isset($_GET['product_partner']) ? htmlspecialchars(trim($_GET['product_partner'])) : '';
                        ?>
                        <option value="">-- กรุณาเลือก --</option>
                        <?php 
                            $checkAuthen->openConnection();
                            $stmt_partner =  Connection::$pdo->prepare("SELECT `partner_id`,`partner_member_id`,`partner_name` FROM `kanji_partners` WHERE ? ");
                            $stmt_partner->execute(array("1=1"));
                            while($P_PARTNER =  $stmt_partner->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option value="<?php echo $P_PARTNER['partner_name']; ?>" <?php echo ($P_PARTNER['partner_name'] == $session_search_partner)? 'selected' : ''; ?>><?php echo $P_PARTNER['partner_name']; ?></option>
                        <?php 
                            endwhile;
                            $checkAuthen->closeConnection();
                        ?>
                    </select>
                </div>
                <div class="form-group desktop"></div>
                <div class="form-group desktop"></div>
                <div class="form-group filter grid-2">
                    <button type="submit" value="key_search" name="filter_search" class="w3-btn  w3-teal btn-block"><i class="fa-solid fa-arrow-up-wide-short"></i> ค้นหา</button>
                    <button type="reset" value="key_search" name="filter_search" class="w3-btn  w3-red btn-block"><i class="fa-solid fa-arrow-up-wide-short"></i> ล้างแบบฟอร์ม</button>
                    <!-- <button class="btn btn-filter-orange"> <i class="fa-solid fa-arrow-down-wide-short"></i> เก่าสุด</button> -->
                </div>
            </section>
        </form>
        <!-- แนะนำสินค้า -->
        <article class="product">
            <div class="center"><h3 id="main-text" style="margin-block-end: 0 !important;">สินค้าออนไลน์</h3></div>
            <div class="center"><h4 id="sub-text" style="margin-block-start: 0 !important;">สินค้าออนไลน์จากทาง Kanji Farm Online. </h4></div>
            <br>
          
            <section class="container-product-shop">
                <?php
                    $checkAuthen->openConnection();
                    $fillter = "SELECT * FROM `kanji_products` WHERE 1=1 ";
                    $value = array();

                    if($fillter_search == 'key_search'):
                        if(!empty($product_name)):
                            $fillter .= " AND product_name LIKE ? ";
                            $value[] = '%'.$product_name.'%';
                        endif;
                        if(!empty($product_type)):
                            $fillter .= " AND product_type_name = ?";
                            $value[] = $product_type;
                        endif;
                        if(!empty($product_partner)):
                            $fillter .= " AND product_shop_name = ?";
                            $value[] = $product_partner;
                        endif;
                    else:
                    endif;
                    $stmt_product =  Connection::$pdo->prepare($fillter);
                    $stmt_product->execute($value);
                    while($R_PRODUCT =  $stmt_product->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="box-product">
                    <!-- <div class="shadow-box"></div> -->
                    
                    <?php 
                        if($R_PRODUCT['STATUS_SELLER'] == 1 ):
                            echo '<img src="./img-shop/best-tag.7581d996.png" class="tag-best-seller" alt="">';
                            elseif($R_PRODUCT['STATUS_SELLER'] == 2 ):
                                echo '<img src="./img-shop/439464980_1_orig.gif" class="tag-best-seller" alt="">';
                            else:

                            endif;
                        
                     ?>
                    <div class="img-profile-shop">
                        <img class="img-action" src="./app/views/<?php echo $R_PRODUCT['product_img'] ?>" alt="">
                    </div><br>
                    <h3 class="main-short-text"><a href="./shop_product.php?product_id=<?php echo $checkAuthen->id_encrypt($R_PRODUCT['product_id']); ?>"><?php echo $R_PRODUCT['product_name'] ?></a></h3>
                    <h4 class="sub-text short-text"><?php echo $R_PRODUCT['product_detail'] ?></h4>
                    <div class="detail-option">
                        <!-- <div class="stock w3-btn w3-block">มีในสต๊อก 100 กรัม</div> -->
                        <div class="option-review">
                               <!-- <i class="fa-solid fa-star orange"></i> -->
                        <!-- <i class="fa-solid fa-star orange"></i> -->
                        <!-- <i class="fa-solid fa-star orange"></i> -->
                        <!-- <i class="fa-regular fa-star"></i> -->
                        <!-- <i class="fa-regular fa-star"></i> -->
                        <?php
                            $OPTION_STAR = '';
                            switch ($R_PRODUCT['product_star']) {
                                case '1':
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                break;
                                case '2':
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                break;
                                case '3':
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                break;
                                case '4':
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-regular fa-star"></i>';
                                break;
                                case '5':
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                    $OPTION_STAR .= '<i class="fa-solid fa-star orange"></i>';
                                break;
                                                                        
                            default:
                            break;
                            }
                        echo $OPTION_STAR;
                        ?>
                     
                        </div>
                    </div>
                    <h3 class="price" id="price">
                        <?php echo $R_PRODUCT['product_price']; ?> <i class="fa-solid fa-baht-sign"></i>
                         / <?php echo '1 '.$R_PRODUCT['option_price'] ?>
                    
                    </h3>
                    <h4><a class="w3-btn w3-white  w3-block w3-border w3-border-red"  href="./shop_product.php?product_id=<?php echo $checkAuthen->id_encrypt($R_PRODUCT['product_id']); ?>"><i class="fa-solid fa-cart-shopping"></i> เพิ่มลงตะกร้า</a></h4>
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
    <br>
    <br>
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
                    shopFilter.style.height = " 490px "
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