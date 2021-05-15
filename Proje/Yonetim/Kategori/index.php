<?php
include("..//kullanici/girisKontrol.php"); 
include("..//baglan.php");
   $query_Kategoriler = "SELECT * FROM kategoriler";
   $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
   $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
   $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);

   
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
    <head>
        
                <script type="text/javascript">
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>
        <meta charset="UTF-8">
    <title>Kategoriler</title>

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
                <th>Kategori Adı</th>
                <th>Ana Kategori</th>
                <th>Ayarlar</th>
            </tr>
            <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr class="alt1">
                <td> <?= $row_rsKategoriler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsKategoriler->kategoriReferansID) ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->ID;?>>Düzenle</a>    <a href=sil.php?id=<?=$row_rsKategoriler->ID;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
              <?php ;}    else{?>
            <tr class="alt2">
                <td> <?= $row_rsKategoriler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsKategoriler->kategoriReferansID) ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->ID;?>>Düzenle</a>     <a href=sil.php?id=<?=$row_rsKategoriler->ID;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
            
             <?php } ?>
          <?php }while($row_rsKategoriler= mysqli_fetch_object($rsKategoriler));?>
        
            
            
            
            
        </table>
    </div>
      </div>   
    </div>


</body>
</html>
