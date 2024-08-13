<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale1.0">
        <title>Üyelik Formu</title>
    </head>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        h1{
            color:#120a8f;
            margin-top: 40px;
            margin-bottom: 80px;
            font-style: italic;
            font-size: 50px;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4e6;
        }
        
        body{
            background-color: #f4f4f4e6;
        }
        .container{
            display: flex;
            justify-content: space-between;
        }
        .membership-infos{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 500px;
            height: 800px;
            background-color: white;
            text-align: center;
            margin: auto;
            border-radius: 15px;
            border: 5px solid #f1f1f1;
            box-shadow: 20px 20px #f4f4f4e6;
        }
        .sarten-intro{
            background-color: aliceblue;
        }
        .input{
            margin: 15px;
            width: 350px;
            height: 30px;
        }
        .button-container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #submit-btn{
            margin: 40px;
            background-color: #120a8f;
            color:white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            display: block;
        }
    </style>
    <body>
        <!--<div class="container">-->
        <div class="membership-infos">
            <div class="form-container">
        <h1>Üyelik Formu</h1>
        <form action="">
            <div class="form-sections">
            <label for="text"><b>Şirket Adı</b></label><br>
            <input type="text" id="company-name" name="company-name" class="input" placeholder="Şirket Adı">
            </div>

            <div class="form-sections">
            <label for="email"><b>E-posta</b></label><br>
            <input type="email" id="email" name="email" class="input" placeholder="E-posta ">
            </div>

            <div class="form-sections">
                <label for="phone"><b>İletişim Numarası</b></label><br>
                <input type="phone" id="phone" name="phone" class="input" placeholder="İletişim Numarası">
            </div>

            <div class="filter-group form-sectiosn">
                <h4>Faaliyet Gösterdiğiniz Alanı Seçiniz</h4>
                <select id="field-category" class="input">
                <option value="" selected disabled>Kategori Seç</option>
                <option value="">Bilgi Teknolojileri</option>
                <option value="">Elektronik</option>
                <option value="">Kimya</option>
                <option value="">Perakende</option>
                <option value="">Taşımacılık ve Lojistik</option>
                <option value="">Diğer</option>
            </select><br>
            <input type="checkbox" id="privacy-check" >
            <label for="privacy-check"><a href="./privacyPolicy.php">Gizlilik ve Kullanım Koşullarını Okudum,Kabul Ediyorum</a></label><br>
            <div class="button-container">
            <button type="submit" id="submit-btn">Gönder</button>
        </div>
        </div>
    </div>
</form>
    </body>
</html>