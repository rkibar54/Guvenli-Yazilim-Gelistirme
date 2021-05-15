<?php // mysql sunucu bağlantısı bağlantısı
include("..//baglan.php");
include("..//kullanici/girisKontrol.php");    
    $query_Kategoriler = "SELECT * FROM kategoriler";
    $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
    $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);
    //Kategori ekleme kodları
    if(isset($_POST['kategoriEkleSubmit']))
    {
       $kategoriRefID = mysqli_real_escape_string($baglanti,$_POST['KategoriRefID']);
       $kategoriAdi = mysqli_real_escape_string($baglanti,$_POST['Adi']);    
       $query_KategoriEkle="insert into Kategoriler(Adi,kategoriReferansID) values('$kategoriAdi','$kategoriRefID')";
       $sonuc = mysqli_query($baglanti,$query_KategoriEkle);       
        if($sonuc)
        {
            header ("Location:index.php");            
        }
    }
   
?>
<html>
    <head>
        <meta charset="UTF-8">
      
    <title>Kategori Ekle</title>
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>

</head>
<body>
      <div class="ortala">
    
    
    <div class="yasla solSide">
         <?php include ('../solSide.php');?>
 
    
    </div>
    <div class="yasla icerik">
   
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->ID;?>" >
                    <?= $row_rsKategoriler->Adi;?>
                </option>
                <?php }while($row_rsKategoriler=  mysqli_fetch_object($rsKategoriler));?>
 
            </select>
            
          
            <label for="Adi">Kategori Adı</label> 
         <input type="text" name="Adi" id="Adi" />
        
            
        </fieldset>
        <input type="submit" name="kategoriEkleSubmit" value="Kategori Ekle" />
    </form>
   
    </div>
    </div>
</body>
</html>
