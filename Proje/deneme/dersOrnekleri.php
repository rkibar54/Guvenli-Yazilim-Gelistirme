<?php 

/*$dosyaismi="dosya.txt";
$okunan=file($dosyaismi);
print  "Okunan Veri : ".$okunan;

/**/
/*$dosya = fopen("dosya.txt","r");
 
if(!($dosya))
{
echo "dosya.txt bulunamadı.";
exit();
}
 
while(!feof($dosya))
{
$satir = fgets($dosya, 255);
echo("$satir[0] <br/>");
}
 
fclose($dosya);
?>

*/

    $server= "localhost";
    $username ="root";
    $password = "";
    $database_name ="alisveris";
    $connection = mysql_connect($server, $username, $password);    
   
    //veritabanı seçimi

    mysql_select_db($database_name,$connection);
mysql_query("SET NAMES UTF8");




$sorgu="select * from urunkategori";
$sorgu_Calistir=  mysql_query($sorgu);
$sorguyu_NesnelereAyir= mysql_fetch_array($sorgu_Calistir);
$Sorgu_Eleman_adeti=  mysql_num_rows($sorgu_Calistir);
echo $Sorgu_Eleman_adeti;


    
$row = mysql_fetch_array($sorgu_Calistir);
// Print out the contents of the entry 

echo "Name: ".$row['urunKategoriAdi'];
echo "Name: ".$row['urunKategoriAdi'];
//
//
//$sorgu_Ekle="insert into urunkategori(urunKategoriAdi) values('volkan')";
//
//$sorgu_Ekle_Calistir= mysql_query($sorgu_Ekle);


//$sorgu_sil="delete from urunkategori where urunKategoriAdi='volkan'";
//
//$sorgu_Sil_Calistir= mysql_query($sorgu_sil);
//$sorgu_guncelle="update  urunkategori set urunKategoriAdi='volkan' where urunKategoriAdi='erkek'";
//
//mysql_query($sorgu_guncelle);




  
 ?>

<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table >
        <tr>
            <th>ID</th>
            <th>Adi</th>
         </tr>
        <?php do{ ?>
        <tr>
            <td><?php echo $sorguyu_NesnelereAyir['ID']; ?></td>
            <td><?php echo $sorguyu_NesnelereAyir['urunKategoriAdi']; ?></td>
        </tr>
        <?php }while ($sorguyu_NesnelereAyir= mysql_fetch_array($sorgu_Calistir)); ?>
    </table>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--    
    <table> <tr>
                <th>Kategori Adı</th>
                <th>Ana Kategori</th>
                <th>Ayarlar</th>
            </tr>
            <?php do { ?>
           
            
            <tr>
                <td> <?= $row_rsKategoriler->urunKategoriAdi;?></td>
             
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->ID;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsKategoriler->ID;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
          <?php }while($row_rsKategoriler=mysql_fetch_object($rsKategoriler));?>
        
            
            
            
            
        </table>-->
</body>
</html>
