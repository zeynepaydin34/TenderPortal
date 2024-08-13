<?php
// Veritabanı bağlantısı
include('./_db.php');

$sql="SELECT supplier.CompanyName, servicetype.ServiceName, supplier_email.supplierEmail, supplier_contact_phone.supplierContactNumber
FROM supplier
INNER JOIN servicetype ON supplier.ServiceId = servicetype.ServiceId
INNER JOIN supplier_email ON supplier.supplierId = supplier_email.supplierId
INNER JOIN supplier_contact_phone ON supplier.supplierId = supplier_contact_phone.supplierId
LIMIT 0, 25";


$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>ViewMembers</title>
        <style>
            *{
                margin: 0;
                padding:0;
            }
            body{
                background-color: #f4f4f4e6;
            }
             table{
                width: 90%;
                background-color: white;
                margin-bottom:10px;
                margin-left: auto;
                margin-right: auto;
                font-weight:10px;
                text-align:center;
            }
            td,th{
                padding:1px;
                padding-right: 10px;
                width:15%;
                margin-bottom:10px;
            }

            button{
                height:40px;
                width: 50%;
            }

        </style>
        </head>
        <body>
        <?php include('./_navbar.php') ?>
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
                                    echo "<th>ŞİRKET ADI</th>";
                                    echo "<th>HİZMET TÜRÜ</th>";
                                    echo "<th>EMAİL</th>";
                                    echo "<th>İLETİŞİM NUMARASI</th>";
                                    echo "<th>

                                    <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                                    <input type='hidden' name='remove' value='remove'>
                                    <button type='submit' class='btn btn-danger'>TEDARİKÇİYİ SİL</button>
                                </form>
                                </th>";

                                    echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$row['CompanyName']."</td>";
                                    echo "<td>".$row['ServiceName']."</td>";
                                    echo "<td>".$row['supplierEmail']."</td>";
                                    echo "<td>".$row['supplierContactNumber']."</td>";
                                
                            echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='3'>Tedarikçi Bulunamadı!</td></tr>";
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
        </body>
        <?php include('./_footer.php') ?>
    </html>