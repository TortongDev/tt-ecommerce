
<header>

<div class="container-header">
    <div class="header-title">
        <img class="img-title" src="./kanji_farm.jpg" alt="">
    </div>

    <div class="header-menu">
        <div class="menu-section1">
            <ul class="user">
                <li>
                    <i class="fa-solid fa-user"></i> <?php echo @$_SESSION['AUTHEN_USERNAME'].'AS'.@$_SESSION['AUTHEN_USER_ID']; ?>
                    <ul class="ul-list" >
                        <li>แก้ไขข้อมูลส่วนตัว</li>
                        <li>ข้อความส่วนตัว</li>
                    </ul>
                </li>
                <li><i class="fa-regular fa-rectangle-list"></i> รายการสั่งซื้อสินค้า</li>
                <li><i class="fa-solid fa-bag-shopping"></i> ประวัติการสั่งซื้อสินค้า</li>
                <li><i class="fa-solid fa-cart-shopping"></i> ตะกร้าสินค้า</li>
                <li><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</li>
            </ul>
        </div>
        <div class="menu-section2">
           <?php if(@$_SERVER['REQUEST_URI']=== '/shopping1/tt-ecommerce/index.php' || @$_SERVER['REQUEST_URI']=== '/shopping1/tt-ecommerce/'): ?>
            <ul class="menu">
                <li><a class="main-text" href="./index.php">หน้าแรก</a></li>
                <li><a class="main-text" href="#intro">รู้จักกับร้าน</a></li>
                <li><a href="#product">แนะนำสินค้า</a></li>
                <li><a href="#partner">ร้านค้า Partner</a></li>
                <li>รีวิวจากลูกค้า</li>
            </ul>
            <?php else: ?>
                <ul class="menu">
                    <li><a class="main-text" href="./index.php">หน้าแรก</a></li>
                    <li><a class="main-text" href="index.php#intro">รู้จักกับร้าน</a></li>
                    <li><a href="index.php#product">แนะนำสินค้า</a></li>
                    <li><a href="index.php#partner">ร้านค้า Partner</a></li>
                    <li>รีวิวจากลูกค้า</li>
                </ul>
            <?php endif; ?>
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
            <li><a href=""><a class="main-text" href="#intro">รู้จักกับร้าน</a></a></li>
            <li><a href=""><a href="#product">แนะนำสินค้า</a></a></li>
            <li><a href=""><a href="#partner">ร้านค้า Partner</a></a></li>
            <li><a href="">รีวิวจากลูกค้า</a></li>
        </ul>
    </div>


</div>

</header>