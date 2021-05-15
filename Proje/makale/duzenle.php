  <?php
    // put your code here
include("..//baglan.php");
         $query_Kategoriler = "SELECT * FROM kategoriler";
         $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
         $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
         $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);
         
if(isset($_GET["id"])){
    $_id=$_GET["id"];
 
    $sorgu=mysqli_query($baglanti,"select * from makaleler where ID='$_id'");
    $kayit=mysqli_fetch_array($sorgu);

}




if(isset($_POST['makaleDuzenleSubmit'])){
    
     $kategoriRefID = mysqli_real_escape_string($baglanti,$_POST['KategoriRefID']);
     $makaleAdi = mysqli_real_escape_string($baglanti,$_POST['Adi']);
     $makaleDetay = mysqli_real_escape_string($baglanti,$_POST['Detay']);
     $makaleResim= mysqli_real_escape_string($baglanti,$_FILES['Resim']['name']);
     $makaleID = mysqli_real_escape_string($baglanti,$_POST['ID']);
     $makaleYayinlayanKisi=1;
     $makaleYayinlanmaTarihi=date('Y-m-d H:i:s');
     $sorgu=mysqli_query($baglanti,"UPDATE makaleler
    SET Adi='$makaleAdi',KategoriRefID='$kategoriRefID',Detay='$makaleDetay',YayinlayanKisi='$makaleYayinlayanKisi',YayinlanmaTarihi='$makaleYayinlanmaTarihi',Resim='$makaleResim'
   where ID='$makaleID'");
      if($sorgu){
           $makaleResimTmp=$_FILES['Resim']['tmp_name'];
           $destination="../_upload/resimler/makaleResimler/".$makaleResim;
            move_uploaded_file($makaleResimTmp,$destination);
        
            header ("Location:index.php"); 
           
        }
}


   ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
      <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
    <script type="application/x-javascript">
tinymce.init({selector:'#Detay'});
</script>
  <link href="../styles.css" rel="stylesheet" type="text/css"/>
    <link href="../stil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="AnaSayfa">  

     
     
    <div class="yonetimPaneli">     
       <a href="index.php">Kategoriler</a>
       <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">    
        <input type="hidden" name="ID" id="ID" value="<?=$kayit['ID'] ?>" />
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->ID;?>" <?php
                     if($row_rsKategoriler->ID==$kayit['KategoriRefID'])
                         {  echo 'selected="selected"';
                                  }?>> <?= $row_rsKategoriler->Adi;?>
                  
                    
                </option>
                <?php }while($row_rsKategoriler=  mysql_fetch_object($rsKategoriler));?>
 
            </select> <br/>           
          
            <label for="Adi">Makale Adı</label> 
           <input type="text" name="Adi" id="Adi" value="<?=$kayit['Adi'] ?>" />     
   <br/>
           <label for="Detay">Detay :</label> 
           <textarea name="Detay" id="Detay"><?=$kayit['Detay'] ?></textarea>
           <br/>
          <label for="Resim">Resim Seç:</label> 
          <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $kayit['Resim']; ?>"/>
          <input type="file" name="Resim" id="Resim" />
        
         
        </fieldset>
        <input type="submit" name="makaleDuzenleSubmit" value="Kaydet" />
           
    </form>
       
         
          
   
          
  </div> 
              
              
          </div>
      
</body>
</html>
