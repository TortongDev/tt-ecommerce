

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Swinging Animation</title>
    
    <style>
     body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

.swinging-bell {
    width: 100px;
    height: 100px;
    background-color: #ff5733;
    border-radius: 50%;
    position: relative;
    animation: swing 2s ease-in-out infinite;
}

.clapper {
    width: 10px;
    height: 40px;
    background-color: #3498db;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

@keyframes swing {
    0%, 100% {
        transform: rotate(0deg);
    }
    50% {
        transform: rotate(15deg);
    }
}


    </style>
</head>
<body>
    <div class="swinging-bell">
        <div class="clapper"></div>
    </div>
</body>
</html>
