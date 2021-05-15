<?php
include("..//kullanici/girisKontrol.php");
include_once 'dbMySql.php';
$con = new DB_con();
$res=$con->select("Kullanicilar");
$row_rsKullanicilar = mysqli_fetch_object($res);
$num_row_rsKullanicilar = mysqli_num_rows($res);
?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
         
         <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
        
</head>
<body>
    <div>
    <div class="ortala">
    
    
    <div class="yasla solSide">
       
 <?php include ('../solSide.php');?>
    
    </div>
    <div class="yasla icerik">
    <table id="tablom"> <tr>
                <th>Kullanıcı Adı</th>
                <th>Kullanıcı Soyadı</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Adres</th>
            </tr>
            <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr class="alt1">
                <td> <?= $row_rsKullanicilar->Adi; ?></td>
                <td> <?= $row_rsKullanicilar->Soyadi; ?></td>
                <td> <?= $row_rsKullanicilar->Telefon; ?></td>
                <td> <?= $row_rsKullanicilar->Email; ?></td>
                <td> <?= $row_rsKullanicilar->Adres; ?></td>
                </tr>
            <?php ;}    else{?>
                <tr class="alt2">
                <td> <?= $row_rsKullanicilar->Adi; ?></td>
                <td> <?= $row_rsKullanicilar->Soyadi; ?></td>
                <td> <?= $row_rsKullanicilar->Telefon; ?></td>
                <td> <?= $row_rsKullanicilar->Email; ?></td>
                <td> <?= $row_rsKullanicilar->Adres; ?></td>
                </tr>
                
           <?php } ?>
          <?php }while($row_rsKullanicilar= mysqli_fetch_object($res));?>
        
            
            
            </tbody>
            
        </table>
    </div></div>
    </div>
   
</body>
</html>