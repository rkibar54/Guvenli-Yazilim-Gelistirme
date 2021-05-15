  <?php
    // put your code here
include("..//baglan.php");
   $query_Makaleler = "SELECT * FROM makaleler";
   $rsMakaleler = mysqli_query($baglanti,$query_Makaleler);
   $row_rsMakaleler = mysqli_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = mysqli_num_rows($rsMakaleler);

   
   
   function getirAnaKategori($_id) {   
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
    <link href="../stil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="anasayfa">
    <div class="content">
         
    <a href="ekle.php">Makale ekle</a> 
    <table style="margin:auto;">
        <tr>
                <th>Makale Resim</th>
                <th>Makale Adı</th>
                <th>Kategori Adı</th>
                <th>Yayınlanma Tarihi Adı</th>
                <th>Ayarlar</th>
            </tr>
            <?php do { ?>
           
            
            <tr>
                <td> <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $row_rsMakaleler->Resim; ?>"/></td>
                <td> <?= $row_rsMakaleler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsMakaleler->KategoriRefID) ?></td>
                <td><?= $row_rsMakaleler->YayinlanmaTarihi; ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsMakaleler->ID;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsMakaleler->ID;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
          <?php }while($row_rsMakaleler= mysql_fetch_object($rsMakaleler));?>            
                                    
        </table>
    </div>   
    </div>
</body>
</html>
