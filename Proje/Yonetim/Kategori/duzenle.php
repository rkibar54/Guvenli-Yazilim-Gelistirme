<?php
include("..//kullanici/girisKontrol.php");
include("..//baglan.php");
         $query_Kategoriler = "SELECT * FROM kategoriler";
         $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
         $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
         $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);
if(isset($_GET["id"]))
{
    $_id=$_GET["id"];
    $sorgu=mysqli_query($baglanti,"select * from kategoriler where id='$_id'");
    $kayit=mysqli_fetch_array($sorgu);
}    
if(isset($_POST['kategoriDuzenleSubmit']))
{    
    $kategoriRefID = mysqli_real_escape_string($baglanti,$_POST['KategoriRefID']);
    $kategoriAdi = mysqli_real_escape_string($baglanti,$_POST['Adi']);
    $kategoriID = mysqli_real_escape_string($baglanti,$_POST['ID']);
    $sorgu=mysqli_query($baglanti,"UPDATE kategoriler SET Adi='$kategoriAdi',kategoriReferansID='$kategoriRefID' where ID='$kategoriID'");
      if($sorgu)
      {
            header ("Location:index.php");            
      }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kategori Düzenle</title>
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
                <option value="<?= $row_rsKategoriler->ID;?>" <?php
                     if($row_rsKategoriler->ID==$kayit['kategoriReferansID'])
                         {  echo 'selected="selected"';
                                  }?>> <?= $row_rsKategoriler->Adi;?>
                  
                    
                </option>
                <?php }while($row_rsKategoriler=  mysqli_fetch_object($rsKategoriler));?>
 
            </select>
            
           
            <label for="Adi">Kategori Adı</label> 
         <input type="text" name="Adi" id="Adi" value="<?=$kayit['Adi'] ?>" />
         
         <input type="text" visible="false" name="ID" id="ID" value="<?=$kayit['ID'] ?>" />
        
            
        </fieldset>
        <input type="submit" name="kategoriDuzenleSubmit" value="Kaydet" />
    </form>
    </div></div>
</body>
</html>
