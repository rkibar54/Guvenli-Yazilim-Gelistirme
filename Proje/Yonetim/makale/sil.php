  <?php
    // put your code here
  include("..//kullanici/girisKontrol.php");
include("..//baglan.php");
//silme işlem, tamamlanacak
$id=$_GET['id'];
$sorgu_Sil="DELETE FROM makaleler
WHERE ID=$id;";
        $_sonuc=mysqli_query($baglanti,$sorgu_Sil);
        if ($_sonuc) {
            echo 'Silindi';
             header ("Location:index.php"); 
            
    
}
 else {
    echo 'Silme işlemi başarısız';}
        

?>
