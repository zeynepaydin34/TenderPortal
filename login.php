<!DOCTYPE html>
<html lang="tr">
    <header>
        <meta charset="UTF-8">
        <title>Giriş</title>
    </header>
    <head>
        <meta name="viewport" content="width:device-width,initial-scale=1">
    </head>

    <style>
        h1{
            color:#120a8f;
            margin-top: 100px;
            font-style: italic;
            font-size: 50px;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4e6;
        }
        
        a{
            text-decoration: none;
            color: #120a8f;
        }
        form{
            border: 5px solid #f1f1f1;
            box-shadow: 10px 10px;
        }
        #remember-me{
            margin-top: 10px;
            margin:auto
        }
        input[type=email],input[type=password]{
            width: 90%;
            align-items: center;
            padding: 12px 20px;
            margin: 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            display: block;
        }
        .button-container{
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .container-bottom{
            display: flex;
            justify-content: center;
            margin-top: 10px;
            width: 400px;
            height: 60px;
            border-radius: 10px;
            margin: auto;
            margin-top: 40px;
        }

        button{
            background-color: #120a8f;
            color:white;
            padding: 14px 20px;
            margin-top: 20px;
            margin-bottom: 30px;
            border: none;
            cursor: pointer;
            display: block;
        }

        .box-container{
            width: 400px;
            border-radius: 30px;
            background-color: white;
            box-shadow:20px 20px #f4f4f4e6;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            align-items: center;
        }
        .container{
            display: flex;
            flex-direction: column;
            align-items: center; /*Yatayda ortalar.*/
        }

        .input-container{
            width: 100%;
            max-width: 300px;
        }

        .input-container label,
        .input-container input{
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        button:hover{
            opacity: 0.8;
        }
        .image-container{
            text-align: center;
            margin: 30px 0 30px 0;
        }
        
        img.logo{
            width: 30%;
        }

        .membership{
            margin-top: 15px;
        }

        /* Span etkiketini çok küçük ekranlar için değiştirir.*/
        @media screen and(max-width:300px){
            span.psw{
                display: block;
                float: none;
            }
        }

    </style>

    <body>
        <h1 style="text-align: center;">Giriş</h1>
        <form action="user.php" method="POST" class="box-container">
            <div class="login-container">
            <div class="image-container">
                <img src="./sarten_logo.png" alt="sarten_log" class="logo">
            </div>

            <div class="container">
                <div class="input-container">
                <label for="email" class="email input"><b>E-posta</b></label>
                <input type="email" id="email" placeholder="E-posta giriniz" name="eposta" required>

                <label for="paswword" class="password  input "><b>Şifre</b></label>
                <input type="password" placeholder="Şifrenizi Giriniz" name="password" required>
                </div>

                <label>
                    <input type="checkbox" checked="checked" name="remember" id="remember-me">Beni Hatırla
                </label>

            <div class="button-container">
                <button type="submit">Giriş Yap</button>
            </div>
            </div>
        </form>
    </div>
    <div class="container-bottom" style="background-color: gainsboro;">
        <span class="membership">Henüz üye değilim <a href="./membership.php">Hemen Üye Ol </a></span>
    </div>
    </body>
</html>