<?php
//Veritabanı bağlantısını dosyaya dahil ettim.
include('./_db.php');

if (isset($_POST['submit'])) {
header("Location: membership.php");
exit();
}

if(isset($_POST['delete'])){
    $sqldelete="DELETE FROM bid WHERE bidId = ?";
    $deleteQuery=$conn->prepare($sqldelete);
}

//Kategorileri veritabanından almak için sorguyu yazdım.
$sql = "SELECT CategoryId , CategoryName FROM category";
$result = $conn->query($sql);

//Verilen ihaleleri göstermesi için sorgu yazdım.
$sql2 = "SELECT productName, receiverFactory, startDate, endDate, categoryName FROM bid ";
$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="tr">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <head>
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
        <meta charset="UTF-8">
        <title>sartenihale.com</title>
    </head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        h1{
            margin-bottom: 30px;
        }
        h2{
            color: white;
            margin-top: 50px;
            text-align: center;
        }
        body{
            background-color: #f4f4f4e6;
        }
        .right-side p{
            color: white;
            line-height: 40px;
            padding: 20px;
            padding-top: 50px;
        }

        .right-menu{
            float: right;
        }

        .right-menu i{
            margin: 10px;
        }
        .rights-security{
            background-color: aquamarine;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .first-section-box h3{
            margin-bottom: 15px;
        }
        .first-section-box{
            display: inline-block;
            width: 30%;
            margin: 0;
        }

        .second-section-box{
            display: inline-block;
            width:20%;
            text-align: center;
            left: 50px;
            margin: 0;
        }

        .third-section-box{
            display: inline-block;
            width: 15%;
            background-color: lawngreen;

        }
        .fourth-section-box{
            display: inline-block;
            width: 30px;
            background-color: palevioletred;
        }

        .tender-boxes{
            background-color: white;
            line-height: 30px;
            margin: 50px;
            height: 150px;
            width: 95%;
            display: flex;
            justify-content: space-between;
        }
        .boxes-lists{
            display: flex;
            width: 100%;
            justify-content: space-between;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .boxes-lists li{
            padding: 10px;
            box-sizing: border-box;
        }
        .tender-boxes h3{
            margin: auto;
            width: 90px;
            line-height: 30px
        }

        .box-first-section{
            width: 10%;
            color: #1A2433;
            margin: auto;
        }

        .box-second-section{
            width: 20%;
            margin: auto;
        }

        .box-third-section{
            width: 20%;
            margin: auto;
        }
 
        .box-fourth-section{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }   
        #offer-button{
            margin: auto;
            border-radius:3px;
            background-color: #800020;
            color: white;
            width: 100px;
            height: 35px;
        }
        #menu a{
            text-decoration: none;
            color: #1A2433;
        }

        #search{ 
            width: 500px;
            height:25px;
        }
        #box{
            position:absolute;
            right: 10%;
            top: 17%;
        }
        
        a:link{
            color: black;
        }

        a:visited{
            color: black;

        }
        .image{
            width: 100%;
            height:60vh;
        }
        #security{
            display: inline-block;
        }

        #security li{
            list-style: none;
            display:inline-block;
        }

        .social-media-section{
            margin: 0 auto;
            text-align: center;
            line-height: 30px;

        }

        .social-media i{
            width: 40px;
            color:#1A2433;
        }

        .social-media li{
            list-style: none;
            display: flex;
            margin: 20px;
            text-align: center;
            align-items: center;
            justify-content: center;
            float: right;
        }

        .bottom-infos{
            width: 100%;
            background-color:white;
            height:200px;
            position: relative;
        }

        .tender-title{
            display: inline-block;

        }

        .information-security a{
            color:black;
            text-decoration: none;
        }
        .information-security{
            padding-top: 50px;
            padding-bottom: 0;
        }
        .informations{
            position: relative;
            display: flex;
            background-color: white;
        }
        .right-side{
            background-color:#1A2433;
            margin: 20px;
            margin-right: 0;
            margin-top: 0;
            padding: 20px;
            position: absolute;
            right: 0;
            width: 30%;
            height: 77.5vh;
            display: inline-block,;
        }
        .left-bottom-side{
            background-color:#800020;
            margin-top: 0;
            width: 70%;
            height: 20vh;
            display: inline-block;
            justify-content: center; 
            align-items: center;
        }


        .left-top-side{
            background-color: white;
            display: inline-block;
            color: #1A2433;
            height: 45.2vh;
            width: 60%;
            text-align: center;
            margin-top: 2px;
            margin: 50px;
            line-height: 30px;
            font-style: italic;
        }

        .left-top-content{
            margin-top:30px;
            line-height:50px;
        }

        #tender-btn{
            background-color: #800020;
            color:white;
            height: 45px;
            width: 20%;
            margin-top: 30px;
            border-radius:5px;
        }

        .category-lists{
            font-family: 'Times New Roman', Times, serif;
            margin-top: 10px;
            margin-bottom: 20px;
            margin-right: auto;
            width: 50%;
            color: white;
            font-size: 30px;
        }
        .filter-container{
            margin-top:20px;
        }

        .filter-group{
            text-align: center;
            align-items: center;
        }

        .filter-group select{
            width: 300px;
            height: 40px;
            border: 2px solid #1A2433;
            border-radius: 2px;
            font-size: 16px;
            color: #1A2433;
            text-align: center;
        }
        .filter-group input[type="date"]{
            width: 143px;
            height: 30px;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        #filter-btn{
            background-color: white;
            border-radius: 5px;
            color: #1A2433;
            width: 15%;
            height: 40px;
            float: right;
            display:inline-block;
            margin-right: 150px;
        }

        .date{
            color:white;
        }
        .body-container{
            display: block;
        }

        .page-numbers{
            width: 100%;
            height: 40px;
            align-items: center;
            text-align: center;
            margin: 30px;
            color:black;
        }

        .page-numbers a{
            color: black;
            display: inline-block;
            text-decoration: none;
            margin: auto;
            list-style: none;
            background-color: white;
            width: 55px;
            right: 50%;
            padding: 5px;
            margin: 20px 20px;
        }
    </style>

    <body>
        <?php include('./_navbarAdmin.php') ?>

        <div class="body-container">
        <div class="background-container">
            <div class="img-container">
                <img class="image" src="./ihale-background.png">
            </div>
            <div class="informations">
                <div class="left-side">
                    <div class="left-top-side">
                      <div class="left-top-content">
                       <h1>İhaleler</h1>
                       <p><b>Sarten tarafından açılan ihalelerimize katılarak yeni alıcılara ulaşma imkanına sahip olabilirsiniz.İhalelerimize sadece Sarten'in tedarikçi havuzunda kayıtlı ve onaylı olan tedarikçilerimiz katılabilir.Henüz Sarten'in tedarikçisi değilseniz,lütfen başvurun.</b></p>
                       <form action="./membership.php" method="post"> 
                       <button type="submit" name="submit" class="btn btn-primary" id="tender-btn" >TEDARİKÇİMİZ OLUN</button>
                       </form>
                       </div>
                    </div>
                    <div class="left-bottom-side" >
                        <div class="filter-container">
                         <div class="filter-group">
                            <select id="category" class="category-lists">
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
                         </div>
                        </div>
                        <div class="filter-group">
                         <input type="date" id="startDate">
                         <input type="date" id="endDate">
                        </div>

                        <div class="filter-group">
                        <button class="btn btn-primary" id="filter-btn">FİLTRELE</button>
                    </div>
                    </div>  
                </div>
                <div class="right-side">
                    <h2><b>BİZ KİMİZ?</b></h2>
                    <p>Metal ambalaj üretimine 20 Mart 1972 yılında Çorlu fabrikasında başlayan SARTEN, yıllar içerisinde büyüyen Türkiye pazarında müşterilerinin ihtiyaçları karşılamak üzere yeni fabrikalar açmıştır. SARTEN, büyüme stratejisi paralelinde yaptığı yatırımlarla bugün Silivri, Gebze, Karacabey, Gemlik, Manisa, Ayvalık ve Adana yörelerinde toplam 15 fabrikaya sahiptir. Bu fabrika yatırımları, SARTEN’in müşteri odaklı stratejisi paralelinde müşterilerin fabrikalarının yoğun olarak kümelendiği bölgelerde yapılmıştır. SARTEN’in ürün portföyünde Metal Ambalajlar, Kavanoz Kapakları ve Plastik ürünler yer almaktadır.</p>
                </div>
            </div>
        </div>
        <form>
                <div id="tender-boxes-container">
                <?php
              if (mysqli_num_rows($result2) > 0) {
                while ($tender = mysqli_fetch_assoc($result2)) {
                echo '<div class="tender-boxes">';
                echo '<ul class="boxes-lists">';
                echo '<h3>' . htmlspecialchars($tender['productName']) . '</h3>';
                
                echo '<li class="box-first-section">';
                echo '<h4 class="tender-title">Alıcı Firma</h4>';
                echo '<p>' . htmlspecialchars($tender['receiverFactory']) . '</p>';
                echo '</li>';

                echo '<li class="box-second-section">';
                echo '<h4 class="tender-title">İhale Kategorisi</h4>';
                echo '<p>' . htmlspecialchars($tender['categoryName']) . '</p>';
                echo '</li>';

                echo '<li class="box-third-section">';
                echo '<h4 class="tender-title">İhale Süresi</h4>';
                echo '<p>' . htmlspecialchars($tender['startDate']) . '</p>';
                echo '<p>' . htmlspecialchars($tender['endDate']) . '</p>';
                echo '</li>';
                
                echo '<li class="box-fourth-section">';
                echo '<form method="POST">';
                echo '<button onclick="return confirm(\'Silinsin mi?\')" class="offer-button" id="offer-button" name="delete" >İHALEYİ KALDIR</button>';
                echo '</form>';
                echo '</li>';

                echo '</ul>';
                echo '</div>';
            }
        } else {
            echo 'İhale Bulunamadı';
        }

        mysqli_close($conn); //Veritabanı bağlantısını kapattık.
        ?>
                    </div> 
            <div class="page-numbers">
                <a href="#">Önceki</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Sonraki</a>
            </div>
        </form>
    </div> 
    </body>
    <?php include('./_footer.php') ?>
</html>
<?php
ob_end_flush();
?>
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