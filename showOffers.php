<?php
// Veritabanı bağlantısı
include('./_db.php');

$approvalMessage = ""; // Ekranda gösterilecek mesaj

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['offerId']) && isset($_POST['approvalStatus'])) {
        // Onay veya reddetme işlemi
        $offerId = $_POST['offerId'];
        $approvalStatus = $_POST['approvalStatus'];

        if ($approvalStatus == 'onayla') {
            $approvalStatus = 'Onaylandı';
        } elseif ($approvalStatus == 'reddet') {
            $approvalStatus = 'Reddedildi';
        }

        // Teklif durumunu güncelle
        $updateSql = "UPDATE offer_infos SET approvalStatus='$approvalStatus' WHERE offerId='$offerId'";
        if ($conn->query($updateSql) === TRUE) {
            $approvalMessage = "Teklif ID $offerId: $approvalStatus olarak güncellendi."; 
        } else {
            $approvalMessage = "Hata: " . $conn->error;
        }

        // Sayfayı yeniden yükle
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        $approvalMessage = "Onay veya reddetme işlemi için gerekli veriler eksik.";
    }
}

        // offer_infos tablosundaki verileri alıp ekranda gösterecek
        $sql = "SELECT offer_infos.offerId, offer_infos.CompanyName, offer_infos.offerPrice, offer_infos.offerText, offer_infos.approvalStatus, bid.productName, bid.receiverFactory 
        FROM offer_infos
        INNER JOIN bid ON offer_infos.bidId = bid.bidId";
        $result = $conn->query($sql);

        // Option kısmındaki seçenekleri veritabanından alacak
        $sql2 = "SELECT DistrictId,DistrictName FROM factory_district";
        $result2 = $conn->query($sql2);
        
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>ShowOffers</title>
        <style>
            *{
                margin: 0;
            }
            body{
                background-color: #f4f4f4e6;
            }
            h1{
                margin-top: 50px;
                text-align: center;
            }
            table{
                width: 90%;
                height: 10px;
                background-color: white;
                margin-bottom:10px;
                margin-left: auto;
                margin-right: auto;
                font-weight:10px;
            }
            td,th{
                padding:1px;
                padding-right: 10px;
                width:15%;
            }
            .form-select{
                width: 20%;
                border: 1.5px gray solid;
                display: block;
                margin: 0 auto;
                margin-top: 10px;
            }
            .first-table{
                background-color: #f4f4f4e6;
            }
            button{
                display:inline-block;
                margin-left:5px;
                margin-top:auto;
                margin-bottom:auto;
                width: 100px;
                height:20%;
                padding:3px;
            }

        </style>
    </head>
    <body>
    <?php include('./_navbar.php') ?>
        <h1>TEKLİFLER</h1>
          <!-- Onay / Red mesajı -->
          <?php if ($approvalMessage != ""): ?>
          <div class="message">
            <?php echo $approvalMessage; ?>
          </div>
          <?php endif; 
          ?>
        <form class="district">
        <select class="form-select" aria-label="Default select example">
            <?php
            if ($result2->num_rows > 0) {
                echo '<option selected>Şirket Seçiniz</option>';
                while($row = $result2->fetch_assoc()) {
                echo '<option value="' . $row['DistrictId'] . '">' . $row['DistrictName'].'</option>';
               }
               } else {
               echo '<option value="">Kategori bulunamadı</option>';
               }
               ?>
        </form>
            
          </select>
        <div class="box-container">
            <div class="boxes">
                <div class="box">
                    <table class="first-table">
                            <?php
                            //Veritabanından alınan her bir satır için tabloya satır eklendi.
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    echo "<table>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>ÜRÜN ADI</th>";
                                    echo "<th>ALICI FİRMA</th>";
                                    echo "<th>TEKLİF VEREN FİRMA</th>";
                                    echo "<th>TEKLİF VERİLEN FİYAT</th>";
                                    echo "<th>TEKLİF NOTU</th>";
                                    echo "<th>TEKLİF ONAYI</th>";
                                    echo "<th>

                                    <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                                    <input type='hidden' name='offerId' value='".$row['offerId']."'>
                                    <input type='hidden' name='approvalStatus' value='onayla'>
                                    <button type='submit' class='btn btn-success'>ONAYLA</button>
                                </form>
                                <form method='POST' action='".$_SERVER['PHP_SELF']."' style='margin-top: 5px;'>
                                    <input type='hidden' name='offerId' value='".$row['offerId']."'>
                                    <input type='hidden' name='approvalStatus' value='reddet'>
                                    <button type='submit' class='btn btn-danger'>REDDET</button>
                                </form>
                                </th>";

                                    echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$row['productName']."</td>";
                                    echo "<td>".$row['CompanyName']."</td>";
                                    echo "<td>".$row['receiverFactory']."</td>";
                                    echo "<td>".$row['offerPrice']."</td>";
                                    echo "<td>".$row['offerText']."</td>";
                                    echo "<td>".$row['approvalStatus']."</td>";
                                
                            echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='3'>Teklif bulunamadı !</td></tr>";
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <?php include('./_footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('districtSelect').addEventListener('change', function() {
    var selectedDistrict = this.value;

    $.ajax({
        url: 'filterDistricts.php', // Bunun için ayrı bir php dosyası oluşturdum.
        type: 'GET',
        data: { district: selectedDistrict },
        dataType: 'json',  // JSON formatında veri bekliyoruz
        success: function(data) {
            var resultsContainer = document.getElementById('form-select');
            resultsContainer.innerHTML = "";  // Mevcut sonuçları temizleyecek.

            if (data.length > 0) {
                data.forEach(function(row) {
                    var resultHtml = "<table class='table'>";
                    resultHtml += "<tr><th>Ürün Adı</th><td>" + row.productName + "</td></tr>";
                    resultHtml += "<tr><th>Alıcı Firma</th><td>" + row.receiverFactory + "</td></tr>";
                    resultHtml += "<tr><th>Teklif Veren Firma</th><td>" + row.CompanyName + "</td></tr>";
                    resultHtml += "<tr><th>Teklif Fiyatı</th><td>" + row.offerPrice + "</td></tr>";
                    resultHtml += "<tr><th>Teklif Notu</th><td>" + row.offerText + "</td></tr>";
                    resultHtml += "<tr><th>Teklif Onayı</th><td>" + row.approvalStatus + "</td></tr>";
                    resultHtml += "</table><hr>";
                    resultsContainer.innerHTML += resultHtml;
                });
            } else {
                resultsContainer.innerHTML = "Sonuç bulunamadı.";
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Hatası: " + status + " - " + error);
        }
    });
});
</script>
    <script>
         function accept(button) {
                if (confirm("Onaylamak istediğinize emin misiniz?")) {
                    // Kullanıcı confirm'e olumlu yanıt verirse Onaylandı yazısı çıkacak.
                    var row = button.parentNode.parentNode;
                    row.querySelector(".status").innerText = "Onaylandı";
                    
                    // Admin ONAYLA vey REDDET derse butonlar kaldırılır.
                    row.querySelector(".accept").style.display = "none";
                    row2.querySelector(".reject").style.display = "none";
                }
            }

            function reject(button){
                if(confirm("Teklifi Reddetmek İstediğinize Emin Misiniz?")){
                    //Kullanıcı confirm'e olumlu yanıt verirse Reddedildi yazısı çıkacak.
                    var row2=button.parentNode.parentNode;
                    row2.querySelector(".status").innerText="Reddedildi";

                    //Admin ONAYLA veya REDDET derse butonlar kaldırılır.
                    row.querySelector(".accept").style.display = "none";
                    row2.querySelector(".reject").style.display = "none";
                }
            }
    </script>
</html>