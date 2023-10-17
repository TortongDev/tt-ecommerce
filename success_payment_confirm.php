<?php

$COUNT = '250';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>การสั่งสื้อสำเร็จ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
  
    <style>
        html,body {
            height: 50%;
            background-color: silver;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container-shopping-success {
            background-color: silver;
            padding: 30px;
            border-radius: 5px;
            background-color: white;
        }
        .bar-load {
            width: 1000px;
            height: 20px;
            background-color: gray;
            display: block;
        }
        .bar-load::before {
            content:  '';
            position: absolute;
            width: <?php echo $COUNT;?>px;
            height: 20px;
            background-color: rgb(150, 208, 41);
        }
     
        .lor {
            position: relative;
            width: 200px;
            text-align: right;
        }
        .grid-5 {
            display: grid;
            grid-template-columns: repeat(4,1fr);
            width: 100%;
            height: 20px;
            text-align: center;
        }
        #step1 {
            color: green;
        }
        
        #step2 {
            color: gray;
        }
        
        #step3 {
            color: gray;
        }
        
        #step4 {
            color: gray;
        }
        
        #step5 {
            color: gray;
        }
    </style>
</head>
<body>
    <?php
    $STATUS_TITLE = 's';
    if($COUNT == '250'):
        $STATUS_TITLE = 'สั่งซ้ำสำเร็จ';
    elseif($COUNT == '500'):
        $STATUS_TITLE = 'กำลังนำส่งพัสดุ';
    elseif($COUNT == '750'):
        $STATUS_TITLE = 'ทางขนส่งรับพัสดุ';
    elseif($COUNT == '1000'):
        $STATUS_TITLE = 'รอสินค้าไม่เกิน 3-5 วัน';
    endif;

    
    ?>
    <div class="container-shopping-success"> <!-- <== START DIV (1) -->
        <center><h2><?php echo $STATUS_TITLE; ?></h2></center>
        <div class="grid-5"> <!-- <== START DIV (2) -->
            <font>
                <center>
                    <i id="step1" class="fa-regular fa-face-smile"></i><br>
                    สั่งซ้ำสำเร็จ
                </center>
            </font>
            <font>
                <center>
                    <i id="step2" class="fa-regular fa-face-smile"></i><br>
                    กำลังนำส่งพัสดุ
                </center>
            </font>
            <font>
                <center>
                    <i id="step3" class="fa-regular fa-face-smile"></i><br>
                    ทางขนส่งรับพัสดุ
                </center>
            </font>
            <font>
                <center>
                    <i id="step4" class="fa-regular fa-face-smile"></i><br>
                    รอสินค้าไม่เกิน 3-5 วัน
                </center>
            </font>
        </div><br><br>  <!-- <== END DIV (1) -->
        <div class="bar-load"></div>

    </div> <!-- <== END DIV (1) -->
    <br>
    <center><a href="./index.php" class="btn">กลับไปที่หน้าหลัก</a></center>
</body>
</html>