<header>
<div class="container-header">
    <div class="header-title">
        <img class="img-title" src="./kanji_farm.jpg" alt="">
        <div class="action-icon">
          
        </div>
    </div>

    <div class="header-menu">
        <div class="menu-section1">
            <ul class="user">
                <li id="users">
                   <i class="fa-solid fa-user"></i> <?php echo @$_SESSION['AUTHEN_USERNAME'].'AS'.@$_SESSION['AUTHEN_USER_ID']; ?>
                    <ul class="ul-list" >
                        <li id="ul-list">แก้ไขข้อมูลส่วนตัว</li>
                        <li id="ul-list">ข้อความส่วนตัว</li>
                    </ul>
                </li>
                <li><a class="main-text" href="./index.php"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                <li><a class="main-text" href="#intro"><i class="fa-solid fa-circle-info"></i> รู้จักกับร้าน</a></li>
                <li><a href="#product"><i class="fa-brands fa-product-hunt"></i> แนะนำสินค้า</a></li>
                <li><a href="./shopping_online.php"><i class="fa-solid fa-shop"></i> ร้านค้า</a></li>
                <li><a href="#partner"><i class="fa-regular fa-handshake"></i> ร้าน Partner</a></li>
                <li><a href=""><i class="fa-regular fa-rectangle-list"></i> รายการสั่งซื้อสินค้า</a></li>
                <li><a href=""><i class="fa-solid fa-bag-shopping"></i> ประวัติการสั่งซื้อสินค้า</a></li>
                <li><a href="./checkout_cart.php"><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า </a> <span class="count-product">
                    <?php 
                        if(!empty($_SESSION['CART'])):
                            echo count($_SESSION['CART']);
                        else:
                        echo '0';
                        endif;
                    ?>
                </span></li>
                <li><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
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
            <li><a href=""><i class="fa-regular fa-rectangle-list"></i> รายการสั่งซื้อสินค้า</a></li>
            <li><a href=""><i class="fa-solid fa-bag-shopping"></i> ประวัติการสั่งซื้อสินค้า</a></li>
            <li><a href=""><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า</a></li>
            <li><a href=""><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
            <li>เมนูทั่วไป</li>
            <li><a href=""><a class="main-text" href="#intro">รู้จักกับร้าน</a></li>
            <li><a href=""><a href="#product">แนะนำสินค้า</a></a></li>
            <li><a href="./shopping_online.php">ร้านค้า</a></li>
            <li><a href=""><a href="#partner">ร้านค้า Partner</a></a></li>
            <li><a href="">รีวิวจากลูกค้า</a></li>
        </ul>
    </div>


</div>

</header>
