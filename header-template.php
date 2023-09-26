
<header>
<div class="container-header">
    <div class="header-title">
        <a href="./index.php"> <img class="img-title" src="./img-shop/KaNji_8.png" alt=""></a>
        <div class="action-icon">
          
        </div>
    </div>

    <div class="header-menu">
        <div class="menu-section1">
            <ul class="user">
            <?php 
                require_once "./autoload_class.php";
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
                    <li id="menu-users" style="border-left: 1px solid silver">
                    <i class="fa-solid fa-user"></i> <?php echo @$_SESSION['AUTHEN_USERNAME'].'AS'.@$_SESSION['AUTHEN_USER_ID']; ?>
                        <ul class="ul-list" >
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href=""><i class="fa-solid fa-angles-right"></i> ข้อความส่วนตัว</a></li>
                        </ul>
                    </li>
                    <li><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                <?php else: ?>
                    <li><a class="main-text" href="./index.php"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                    <li><a class="main-text" href="#intro"><i class="fa-solid fa-circle-info"></i> รู้จักกับร้าน</a></li>
                    <li><a href="#product"><i class="fa-brands fa-product-hunt"></i> แนะนำสินค้า</a></li>
                    <li><a href="#partner"><i class="fa-regular fa-handshake"></i> ร้าน Partner</a></li>
                    <li  style="border-left: 1px solid silver"><a href="./login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> เข้าสู่ระบบ</a></li>
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
            <li>เมนูคำสั่งซื้อ</li>
            <li><a href="./list_cart.php"><i class="fa-solid fa-bag-shopping"></i> ประวัติการสั่งซื้อสินค้า</a></li>
            <li><a href="./checkout_cart.php"><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า</a></li>
            <li><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
        </ul>
    </div>


</div>

</header>
