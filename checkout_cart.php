<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
 
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="tabbar-checkout">
        <h2 class="">ตะกร้าสินค้า</h2>
    </div>
    <div class="containers">
        <article class="container-checkout-cart">
            
            <section class="list-cart" style="overflow: auto;">
                <table class="table">
                    <thead style="overflow: auto;">
                        <tr>
                            <th>#</th>
                            <th >รายการสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>รวม</th>
                        </tr>
                    </thead>
                    <tbody style="overflow: auto;">
                        <tr>
                            <?php
                                $cart_count = 1;
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
    <?php include ('./footer-template.php'); ?>
</div>
</body>
<script  src="./base_function.js"></script>

<script>

    
    const app = Vue.createApp(BaseControllers,{
        data() {
            return {
                
            }
        },

    })
    app.mount('#wrapper')
</script>
</html>