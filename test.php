<?php
require_once "./autoload_class.php";
$obj = new ProductController;
$obj->selectProduct();
?>

<?php exit; // backup code detail product ?>
        <article class="shopping">
            <div class="tabbar-detail">
               
                <div class="grid-3"> 
                    <h3 class="sub-text"  @click="showDetail(1)">รายละเอียด</h3>
                    <h3 class="sub-text" style="width: 250px;"  @click="showDetail(2)">ขั้นตอนการจัดส่งของทางร้าน</h3>
                    <h3 class="sub-text"  @click="showDetail(3)">รีวิวจากผู้ซื้อ</h3>

                </div>
            </div>
            <!-- รายละเอียด desktop -->
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
                    <form action="" method="post">
                        <textarea name="post_review" class="form-control" style="" id="post_review" cols="100" rows="3"></textarea>
                        
                        <p><button type="submit" class="btn">ส่งความคิดเห็น</button></p>
                    </form>
                    <table class="table" style="width:900px">
                        <thead>
                            <tr>
                                <th style="text-align: left;">ความคิดเห็น</th>
                                <th style="width: 100px;">ผู้ใช้งาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>สะดวกดี</td>
                                <td><i class="fa fa-user-o" aria-hidden="true"></i> tortong</td>
                            </tr>
                            <tr>
                                <td>สินค้าสดใหม่</td>
                                <td><i class="fa fa-user-o" aria-hidden="true"></i> amiler</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
           
        </article>
         <!-- รายละเอียด mobile -->
         <div class="info-show">
                <section>
                    <h3 class="main-text">รายละเอียดสินค้า</h3>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit repellat, architecto asperiores fugit blanditiis eum. Sed, numquam! Non, vero laborum. Dignissimos quidem adipisci pariatur mollitia. Cumque optio illo labore harum distinctio repudiandae in minus eos dolorem. Debitis ea rerum sint, unde ipsum obcaecati accusamus voluptate corporis tenetur, eligendi molestiae soluta aliquid ipsa atque tempora odio delectus perferendis quibusdam necessitatibus dignissimos deleniti aut quam. Corporis, itaque tempora distinctio deleniti praesentium facere unde temporibus! Magni laboriosam repudiandae aut fugiat sequi! Voluptates, delectus labore pariatur blanditiis eum natus sit eveniet sint error porro, animi illo, veniam aperiam illum corporis. Doloremque natus provident voluptatem unde nam?
                </section>
        </div>
        <!-- รีวิว mobile -->
        <div class="review-show">
        <br><br><br>
        <center><h3 class="main-text">รีวิวสินค้า</h3></center>
        <section class="grid-5">
                <div id="star" data-value="1">
                     <i class="fa-solid fa-star"   id="mouseStar_1"></i>
                </div>
                <div id="star" data-value="2">
                     <i class="fa-solid fa-star"   id="mouseStar_2"></i>
                </div>
                <div id="star" data-value="3">
                     <i class="fa-solid fa-star"   id="mouseStar_3"></i>
                </div>
                <div id="star" data-value="4">
                     <i class="fa-solid fa-star"   id="mouseStar_4"></i>
                </div>
                <div id="star" data-value="5">
                     <i class="fa-solid fa-star"   id="mouseStar_5"></i>
                </div>
        </section>
        <br>
        <center><button class="btn btn-back-shopping" id="send_star">Submit</button></center>
        </div>
        <article class="shopping-mobile">
            <section><a href="./index.php"><i class="fa-solid fa-house"></i>&nbsp;หน้าแรก</a></section>    
            <section id="onShow"><i class="fa-regular fa-file-lines"></i>&nbsp; รายละเอียด</section>
            <section id="onShow_review"><i class="fa-solid fa-circle-info"></i> &nbsp;รีวิว</section>
        </article>
        <?php endwhile; ?>