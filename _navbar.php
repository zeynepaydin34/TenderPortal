<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sartenihale.com</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #menu {
            height: 90px;
            background-color: white;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px; 
        }
        #menu ul {
            display: flex;
            align-items: center;
        }
        #menu li {
            list-style: none;
            margin: 0 20px;
        }
        #logo {
            height: 40px;
        }
        #menu a {
            text-decoration: none;
            color: #1A2433;
        }
        a:link {
            color: #120a8f;
        }
        a:visited {
            color: #120a8f;
        }
        .left-menu,
        .right-menu {
            display: flex;
            align-items: center;
        }
        .right-menu {
            margin-left: auto;
        }
        .right-menu li {
            margin: 0 20px;
        }
    </style>
</head>
<body>
    <div class="body-container">
        <div class="menu-container">
            <nav id="menu">
                <ul class="left-menu">
                    <li><img src="./sarten_logo.png" id="logo"></li>
                    <li><a href="./factory.php" target="_blank"><b>FABRİKALAR</b></a></li>
                    <li><a href="./aboutUs.php" target="_blank"><b>HAKKIMIZDA</b></a></li>
                </ul>
                <ul class="right-menu">
                    <li><a href="./contact.php" target="_blank"><b><i class="fa-solid fa-phone"></i>    İLETİŞİM</b></a></li>
                    <li><a href="./membership.php" target="_blank"><b><i class="fa-solid fa-truck-field"></i>  TEDARİKÇİ OL</b></a></li>
                    <li><a href="./login.php" target="_blank"><b><i class="fa-solid fa-user"></i>  GİRİŞ YAP</b></a></li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>

