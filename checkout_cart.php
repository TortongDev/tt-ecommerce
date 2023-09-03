<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT - E-Commerce</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
 
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
<div id="wrapper">
    <header>
        <div class="container-header">
            <div class="header-title">
                <img src="https://www.ptgenergy.co.th/images/logo.png" width="120px" height="120px" alt="">
            </div>
            <div class="header-menu">
                <div class="menu-section1">
                    <ul class="user">
                        <li><span class="material-symbols-outlined">shield_person</span> admin </li>
                        <li><span class="material-symbols-outlined">list_alt</span>รายการสั่งซื้อสินค้า</li>
                        <li><span class="material-symbols-outlined">history_edu</span>ประวัติการสั่งซื้อสินค้า</li>
                        <li><span class="material-symbols-outlined">shopping_cart</span>ตะกร้าสินค้า</li>
                        <li><span class="material-symbols-outlined">logout </span>ออกจากระบบ</li>
                    </ul>
                </div>
                <div class="menu-section2">
                    <ul class="menu">
                        <li><a class="main-text" href="#intro">รู้จักกับร้าน</a></li>
                        <li><a href="#product">แนะนำสินค้า</a></li>
                        <li><a href="#partner">ร้านค้า Partner</a></li>
                        <li>รีวิวจากลูกค้า</li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <div class="tabbar-checkout">
        <h2 class="">ตะกร้าสินค้า</h2>
    </div>
    <div class="containers">
        <article class="container-checkout-cart">
            
            <section class="list-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 400px;">รายการสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $cart_count = 0;
                            ?>

                            <?php if($cart_count < 1):?>
                                <td colspan="5" class="bg-silver">
                                    <center>ยังไม่มีรายการในตะกร้า</center>
                                </td>
                            <?php else: ?>
                            <tr>
                                <td>1</td>
                                <td>ผักกาดขาว(ไฮโดรโปนิกส์)</td>
                                <td>50 THB/ชิ้น</td>
                                <td>2 (kg)</td>
                                <td>100 <i class="fa-solid fa-baht-sign"></i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>แครอท(ไฮโดรโปนิกส์)</td>
                                <td>50 THB/ชิ้น</td>
                                <td>2 (kg)</td>
                                <td>100 <i class="fa-solid fa-baht-sign"></i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ผักบุ้ง</td>
                                <td>50 THB/ชิ้น</td>
                                <td>2 (kg)</td>
                                <td>100 <i class="fa-solid fa-baht-sign"></i></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>เมล็ดผักกาด</td>
                                <td>50 THB/ชิ้น</td>
                                <td>1 (pcg)</td>
                                <td>50 <i class="fa-solid fa-baht-sign"></i></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>ผักกระหล่ำ</td>
                                <td>20 THB/ชิ้น</td>
                                <td>1 (kg)</td>
                                <td>20 <i class="fa-solid fa-baht-sign"></i></td>
                            </tr>

                            <?php endif; ?>
                        </tr>



                     
                    </tbody>
                </table>
            </section>
            <section class="checkout-form">
                <table class="table" style="">
                    <thead>
                      
                        <tr>
                            <th colspan="2">ประมาณราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( $cart_count < 1): ?>
                        <tr>
                            <td>รวมราคาสินค้า</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>ค่าจัดส่ง</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคาทั้งหมด</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td>รวมราคาสินค้า</td>
                            <td style="text-align: right;">370.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>ค่าจัดส่ง</td>
                            <td style="text-align: right;">40.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคาทั้งหมด</td>
                            <td style="text-align: right;">510.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="checkout-footer">
                    <button class="btn btn-back-shopping"><i class="fa-solid fa-plus"></i> เลือกสินค้าต่อ </button>
                    <button class="btn btn-clear-order"><i class="fa-solid fa-trash-can-arrow-up"></i> ล้างตะกร้าสินค้า</button>
                    <button class="btn btn-checkout"><i class="fa-solid fa-cart-shopping"></i> ชำระเงิน</button>

                </div>
            </section>
        </article>
    </div>
    <footer>
        <div class="container-footer">
            <h2 class="margin-block-0 main-text">Kaoyai Cafe</h2>
            <h4 class="margin-block-0 sub-text">Copyright © 2023 kaoyai cafe, Inc.</h4>
        </div>
    </footer>
</div>
</body>
<script>
    
    document.addEventListener('DOMContentloaded',function(){
        const amount = document.querySelector('#amount')
        alert(2)
    })
    amount.addEventListener('change',()=>{
        
        if(amount.value < 1){
            amount.value = 1
            alert('Not < 1');
    }
    })
    
</script>
</html>