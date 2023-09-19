<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            width: 900px;
            background-color: silver;
            padding: 10px;
        }
        nav ul {
            list-style: none;
        }
        nav ul li {
          
            display: inline;
            padding: 10px;
            
        }
        nav ul li a {
            padding: 10px;            
        }
        li#menu-sub  {
            position:  absolute;
            list-style:  none;
        }
        ul#sub-menu {
            position: relative;
            display: none;
        }
        ul#sub-menu li {
            display: block;
        }
        li#menu-sub:hover  ul#sub-menu{
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li>Menu1</li>
            <li>Menu2</li>
            <li>Menu3</li>
            <li>Menu4</li>
            <li id="menu-sub">
                <a href="">Menu 5</a>
                <ul id="sub-menu">
                    <li>sssssss</li>
                    <li>sssssss</li>
                    <li>sssssss</li>
                </ul>
            </li>
        </ul>
    </nav>

</body>
</html>