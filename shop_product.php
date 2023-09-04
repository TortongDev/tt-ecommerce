<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT - E-Commerce</title>
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
        <div class="container-shopping-product">
            
            <div class="col-shopping-1">
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
                <div class="list-preview"></div>
            </div>
            <div class="col-shopping-1">
                <div class="img-preview">
                    <img src="https://f.ptcdn.info/923/033/000/1438186017-P1170303JP-o.jpg" alt="">
                </div>
            </div>
            <div class="col-shopping-1">
                <div class="shopping-detail">
                    <h2 class="main-text margin-block-0">ผักกาดขาว กรอบๆปลูกระบบ ไฮโดโปรนิกส์ จากดินภูเขา เขาใหญ่</h2>
                    <h3 class="sub-text">ประเภท : ผักไฮโดโปรนิกส์  </h3>
                    <h3 class="main-text">รหัสสินค้า : C10001</h3>
                    <h3 class="main-text">สถานะของสินค้า : สินค้าพร้อมส่ง</h3>
                    <br><hr>
                    <h1 class="main-text text-orange margin-block-0">100 THB</h1>
                    <br>
                    <label for="amount" class="sub-text">เลือกจำนวน</label>
                    <input type="number" name="product_amount" value="1" id="product_amount" class="form-control">
                    <div class="form-group">
                        <!-- <form action="./post_cart.php"> -->
                            <input type="hidden" name="product_id">
                            <input type="hidden" name="product_name">
                            <input type="hidden" name="product_type">
                            <input type="hidden" name="product_price">
                            <input type="hidden" name="user_id">
                            <button type="submit" class="btn btn-checkout">
                                <i class="fa-solid fa-cart-plus"></i> <a href="./checkout_cart.php">เพิ่มลงตะกร้า</a>
                            </button>
                        <!-- </form> -->
                        
                    </div>
                </div>
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
    
    const app = Vue.createApp({
        data() {
            return {
                detailStatus1: true,
                detailStatus2: false,
                detailStatus3: false
            }
        },methods: {
            showDetail(id) {
                
                if(id == 2){
                    this.detailStatus1 = false
                    this.detailStatus2 = true
                    this.detailStatus3 = false
                }else if(id == 3){
                    this.detailStatus1 = false
                    this.detailStatus2 = false
                    this.detailStatus3 = true
                }else{
                    this.detailStatus1 = true
                    this.detailStatus2 = false
                    this.detailStatus3 = false
                }
            }
        },
    })
    app.mount('#wrapper')
</script>
</html>