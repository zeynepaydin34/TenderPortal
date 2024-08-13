<?php

include('./_db.php');

//Kategorileri veritabanından almak için sorguyu yazdım.
$sql3 = "SELECT CategoryId , CategoryName FROM category";
$result = $conn->query($sql3);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bidId= $_POST['bidId'];
    $productName = $_POST['productName'];
    $receiverFactory = $_POST['receiverFactory'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $categoryName=$_POST['categoryName'];

    //Girilen ihalenin veri tabanına eklenmesi için sorgu yazıldı.
    $sql4 = "INSERT INTO bid (bidId,productName,receiverFactory, startDate, endDate,categoryName) 
            VALUES ('$bidId','$productName','$receiverFactory','$startDate','$endDate','$categoryName')";

    if (mysqli_query($conn, $sql4)) {
        echo "İhale başarıyla eklendi !";
        exit();
        } else {
        echo "Hata: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html> 
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">

        <style>
            body {
                background-color: #f4f4f4e6;
            }

            h1 {
                text-align: center;
                font-family:serif;
            }

            .container {
                background-color: white;
                border-radius: 15px;
                width: 45%;
                padding: 50px;
                margin: 40px auto; /* Yatayda ve dikeyde ortalamak için */
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            form label,
            form input,
            form select,
            form button {
                display: block;
                width: 100%; /* Genişliği yüzde olarak ayarlamak */
                margin-bottom: 15px; 
            }

            form input[type="text"],
            form select,
            form input[type="date"] {
                height: 30px;
                padding: 5px;
                box-sizing: border-box;
                border-radius:15px solid;
            }

            form #product-info {
                height: 100px;
            }

            #submit-btn {
                background-color: rgba(47, 135, 47, 0.858);
                width: 30%;
                height: 40px;
                border-radius: 5px;
                margin: 25px auto; /* Yatayda ortalamak için */
                display: block; /* Yatayda ortalamak için */
                color: white;
                border: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>  
    <?php include('./_navbarAdmin.php') ?>
            <div class="container">
            <h1>İHALE EKLE</h1>

            <form method="POST">
            <label for="receiverFactory"><b>Şirket Adını Giriniz</b></label>
            <input type="text" id="receiverFactory" name="receiverFactory" nameplaceholder="Şirket Adını Giriniz">

            <label for="name"><b>Ürün Kategorisini Seçiniz</b></label>
            <select id="categoryName" name=categoryName class="input">
            <?php
            // Veritabanından gelen sonuçları döngüyle al ve seçenek olarak ekle
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['CategoryId'] . '">' . $row['CategoryName'] . '</option>';
            }
            } else {
            echo '<option value="">Kategori bulunamadı</option>';
            }
            ?>
            </select>

            <label for="productName"><b>Ürün Adını Giriniz</b></label>
            <input type="text" id="productName" name="productName" name="productName" placeholder="Ürün Adını Giriniz">

            <label for="bidId"><b>Sipariş Kodunu Giriniz</b></label>
            <input type="text" id="bidId" name="bidId" name="bidId" placeholder="Sipariş Kodunu Giriniz">

            <label for="startDate"><b>Başlangıç Tarihi</b></label>
            <input type="date" id="startDate" name="startDate">

            <label for="endDate"><b>Bitiş Tarihi</b></label>
            <input type="date" id="endDate" name="endDate">

            <button type="submit" id="submit-btn">Ekle</button>
            
        </div>
        </form>

    </body>
    <?php include('./_footer.php') ?>
    <script>
        /* Bugünün tarihini alıp input=date kısmında default olarak ilk o gözüksün istiyoruz.
       İlk önce bugünün tarihini yıl-ay-gün şeklinde alan bir fonksiyon yazdık. */

        function currentDate(){
        var today= new Date();
        const year=today.getFullYear();
        const month=String(today.getMonth() + 1).padStart(2, '0'); /*Ay 0'dan başlıyor bu yüzden 1 ekledik. */
        const day=String(today.getDate()).padStart(2,'0'); /* padStart metoduna göre,2 basamaklı olana kadar önüne 0 ekleyecek */
        return `${year}-${month}-${day}`;
        }

        /*Bugünün tarihi alındı */
        var transformedDate=currentDate();
    
        var startElement=document.getElementById('startDate');
        startElement.value=transformedDate;

        var endElement=document.getElementById('endDate');
        endElement.value=transformedDate;
    </script>
</html>