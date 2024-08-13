<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>İletişim</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            color: #818892;
            background-color: #f4f4f4e6;
            font-family: 'Times New Roman', Times, serif;
            
        }
        h1 {
            color: #484b51;
            margin-top: 100px;
            text-align: center;
        }
        h3 {
            text-align: center;
            color: #484b51;
            margin-bottom: 30px;
        }
       
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        #map {
            margin-top: 30px;
            height: 300px;
            width: 100%;
            max-width: 800px;
        }
        .contact-container {
            display: flex;
            justify-content: space-around;
            margin-top: 100px;
            width: 100%;
            flex-wrap: wrap;
        }
        .contact {
            flex: 1;
            min-width: 200px;
            text-align: center;
        }
        .contact i {
            font-size: 30px;
            color: #818892;
        }
        h2 {
            color: black;
        }
        li {
            list-style-type: none;
        }
        .directorates {
            margin: 60px;
            background-color: #e0e0e0;
            padding: 20px;
            width: 100%;
        }
        .regions {
            display: inline-block;
            align-items: center;
            width: 30%;
            margin: 20px;
            height: 100px;
            line-height: 25px;
        }
        .bottom-infos {
            width: 100%;
            background-color: white;
            height: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
 
    </style>
</head>
<body>
    <?php include('./_navbar.php') ?>
    <div class="container">
        <h1>BİZE ULAŞIN</h1>
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d751.9115599606793!2d29.012783007916866!3d41.07672480997048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab634a321f973%3A0x3796ddc42a877958!2sSarten%20Ambalaj%20Sanayi%20ve%20Ticaret%20A.%C5%9E.!5e0!3m2!1str!2str!4v1721716348695!5m2!1str!2str" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="contact-container">
            <div class="contact">
                <i class="fa-solid fa-location-dot"></i>
                <h3>ADRES</h3>
                <p><b>Adres</b>: Ferta Signature Büyükdere Cad. No:175/100 34394 Şişli İstanbul/Türkiye</p>
            </div>
            <div class="contact">
                <i class="fa-solid fa-phone"></i>
                <h3>TELEFON/FAX</h3>
                <ul>
                    <li><b>Telefon:</b></li>
                    <li>+90 850 755 77 86</li>
                    <li>+90 212 275 76 60</li>
                    <li><b>Fax:</b> +90 212 272 34 17</li>
                    <li><b>Satış Danışma Hattı:</b> +90 549 275 10 10</li>
                </ul>
            </div>
            <div class="contact">
                <i class="fa-solid fa-envelope"></i>
                <h3>ELEKTRONİK POSTA</h3>
                <p><b>sarten@sarten.com.tr</b></p>
            </div>
        </div>
        <div class="directorates">
            <h3>BÖLGE MÜDÜRLÜKLERİMİZ</h3>
            <div class="regions">
                <h4>Ege Bölge Müdürlüğü</h4>
                <ul>
                    <li>Adres: Organize Sanayi Bölgesi 2. Kısım 45030 Manisa / TÜRKİYE</li>
                    <li>Telefon: +90 236 233 40 80</li>
                    <li>Fax: +90 236 233 63 78</li>
                </ul>
            </div>
            <div class="regions">
                <h4>Akdeniz Bölge Müdürlüğü</h4>
                <ul>
                    <li>Adres: Hacı Sabancı O.S.B. Zübeyde Hnm. Cad. No: 6 Sarıçam / ADANA</li>
                    <li>Telefon: +90 322 385 28 80</li>
                    <li>Fax: +90 322 385 28 56</li>
                </ul>
            </div>
            <div class="regions">
                <h4>Marmara Bölge Müdürlüğü</h4>
                <ul>
                    <li>Adres: İzmir Yolu 1. Km. 16700 Karacabey / Bursa / TÜRKİYE</li>
                    <li>Telefon: +90 224 671 80 60</li>
                    <li>Fax: +90 224 671 81 02</li>
                </ul>
            </div>
        </div>
    </div>
    <?php include('./_footer.php') ?>
</body>
</html>
