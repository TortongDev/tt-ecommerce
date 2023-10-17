
<header>
<div class="container-header">
    <div class="header-title">
        <a href="./index.php"> <img class="img-title" src="./img-shop/Kanji_Farm.png" alt=""></a>
        <div class="action-icon"></div>
        <div class="action-icon-pin"></div>
    </div>

    <div class="header-menu">
        <div class="menu-section1">
            <ul class="user">
            <?php 
                require_once __DIR__."/app/config/config_pach.php";
                require_once PATCH_CONNECTION;
                $checkAuthen = new Connection;
            ?>
                <?php  if($checkAuthen->authenMenu() === 1): ?>
                    <li><a class="main-text" href="./index.php"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                    <li><a class="main-text" href="#intro"><i class="fa-solid fa-circle-info"></i> รู้จักกับร้าน</a></li>
                    <li><a href="#product"><i class="fa-brands fa-product-hunt"></i> แนะนำสินค้า</a></li>
                    <li><a href="#partner"><i class="fa-regular fa-handshake"></i> ร้าน Partner</a></li>
                    <li id="menu-shop">
                        <i  class="fa-solid fa-shop"></i> ร้านค้า
                        <ul id="menu-shop-sub" >
                            <li><a href="./shopping_online.php"><i class="fa-solid fa-angles-right"></i> ไปที่ร้านค้า</a></li>
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> รายการสั่งซื้อสินค้า</a></li>
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> ประวัติการสั่งซื้อสินค้า</a></li>
                        </ul>
                    </li>
                    <li><a href="./checkout_cart.php"><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า </a> <span class="count-product">
                        <?php 
                            if(!empty($_SESSION['CART'])):
                                echo count($_SESSION['CART']);
                            else:
                            echo '0';
                            endif;
                        ?>
                    </span></li>
               
                    <li id="menu-users" style="border-left: 1px solid silver;border-left: 1px solid silver;background-color: #97CF8A; border-radius: 7px;margin-right: 10px;">
                    <i class="fa-solid fa-user"></i> <?php echo @$_SESSION['AUTHEN_USERNAME'].'AS'.@$_SESSION['AUTHEN_USER_ID']; ?>
                        <ul class="ul-list" >
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> แจ้งโอน</a></li>
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                        </ul>
                    </li>
                    <li style="border-left: 1px solid silver;background-color: #97CF8A; border-radius: 7px;"><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                <?php else: ?>
                    <li><a class="main-text" href="./index.php"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                    <li><a class="main-text" href="#intro"><i class="fa-solid fa-circle-info"></i> รู้จักกับร้าน</a></li>
                    <li><a href="#product"><i class="fa-brands fa-product-hunt"></i> แนะนำสินค้า</a></li>
                    <li><a href="#partner"><i class="fa-regular fa-handshake"></i> ร้าน Partner</a></li>
                    <li  style="border-left: 1px solid silver;background-color: #97CF8A; border-radius: 7px;"><a href="./login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> เข้าสู่ระบบ</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="header-menu-responsive">
        <ul>
            <li><i class="fa-solid fa-bars" id="btnSlide" @click="btnSlide"></i></li>
        </ul>
    </div>
    <div class="menu-slide" >
        <ul class="sub-menu-slide">
        <?php  if($checkAuthen->authenMenu() === 1): ?>
            <li>เมนูคำสั่งซื้อ</li>
            <li><a href="./list_cart.php"><i class="fa-solid fa-bag-shopping"></i> ประวัติการสั่งซื้อสินค้า</a></li>
            <li><a href="./checkout_cart.php"><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า</a></li>
            <li><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
        <?php endif; ?>
        <?php  if($checkAuthen->authenMenu() !== 1): ?>
            <li>เมนู</li>
            <li><a href="./login.php"><i class="fa-solid fa-bag-shopping"></i> เข้าสู่ระบบ</a></li>
            <li><a href="./shopping_online.php"><i class="fa-solid fa-cart-shopping"></i> ไปยังร้านค้า</a></li>
        <?php endif; ?>
        </ul>
    </div>


</div>

</header>
