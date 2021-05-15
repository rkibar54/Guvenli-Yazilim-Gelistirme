  <?php
include("..//kullanici/girisKontrol.php"); 
include("..//baglan.php");
   $query_Makaleler = "SELECT * FROM makaleler";
   $rsMakaleler = mysqli_query($baglanti,$query_Makaleler);
   $row_rsMakaleler = mysqli_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = mysqli_num_rows($rsMakaleler);

   
   
   function getirAnaKategori($_id) {
       include("..//kullanici/girisKontrol.php"); 
       include("..//baglan.php");
    $_Sorgu_Ana_KatagoriAdi="SELECT Adi FROM kategoriler Where ID=$_id limit 1";
   $_Ana_Kategori_Adi = mysqli_query($baglanti,$_Sorgu_Ana_KatagoriAdi);
   while($sutun= mysqli_fetch_array($_Ana_Kategori_Adi))
   {
     echo $sutun['Adi'];
    }
}
   
   
   
    ?>
<html>
    <head></div>
          <style>
            table tr,th,td {
                border: 1px solid;
            }
        </style>
                <script type="text/javascript">
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>
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
                <th>Makale Resim</th>
                <th>Makale Adı</th>
                <th>Kategori Adı</th>
                <th>Yayınlanma Tarihi</th>
                <th>Ayarlar</th>
            </tr>
             <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr class="alt1">
                <td> <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $row_rsMakaleler->Resim; ?>"/></td>
                <td> <?= $row_rsMakaleler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsMakaleler->KategoriRefID) ?></td>
                <td><?= $row_rsMakaleler->YayinlanmaTarihi; ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsMakaleler->ID;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsMakaleler->ID;?> onClick="return silOnayla();">Sil</a></td>
            </tr>
            
            
            <?php ;}    else{?>
            <tr class="alt2">
                <td> <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $row_rsMakaleler->Resim; ?>"/></td>
                <td> <?= $row_rsMakaleler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsMakaleler->KategoriRefID) ?></td>
                <td><?= $row_rsMakaleler->YayinlanmaTarihi; ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsMakaleler->ID;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsMakaleler->ID;?> onClick="return silOnayla();">Sil</a></td>
            </tr>
             <?php } ?>
          <?php }while($row_rsMakaleler= mysqli_fetch_object($rsMakaleler));?>            
                                    
        </table>
    </div>   
    </div>
   </div>
</body>
</html>
