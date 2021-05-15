    <?php // mysql sunucu bağlantısı bağlantısı
 include("..//kullanici/girisKontrol.php");
include("..//baglan.php");

//kategorileri select yüklemek için
    $query_Kategoriler = "SELECT * FROM kategoriler";
    $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
    $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);

       //Makale ekleme kodları
    if(isset($_POST['makaleEkleSubmit'])){
        
      echo "form gönderildi";
       
       /*echo "<pre>";
       print_r($_POST);
       print_r($_FILES);
       
       echo "</pre>"; */
        
       $kategoriRefID = mysqli_real_escape_string($baglanti,$_POST['KategoriRefID']);
       $makaleAdi = mysqli_real_escape_string($baglanti,$_POST['Adi']);
       $makaleDetay=  mysqli_real_escape_string($baglanti,$_POST['Detay']);
      
       $makaleYayinlayanKisi=1;
       $makaleYayinlanmaTarihi=date('Y-m-d H:i:s');
       
       $makaleResim= mysqli_real_escape_string($baglanti,$_FILES['Resim']['name']);

       /*
       //Security Misconfiguration
       $dosyaUzantisi = pathinfo($_FILES["Resim"]["name"], PATHINFO_EXTENSION);
        if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png") 
        { # Dosya uzantı kontrolü
            echo "Sadece jpg ve png uzantılı dosyalar yüklenebilir.";
        }
        
       */
        
       
       
       $query_MakaleEkle="insert into Makaleler(Adi,Detay,Resim,YayinlayanKisi,YayinlanmaTarihi,KategoriRefID) values('$makaleAdi','$makaleDetay','$makaleResim','$makaleYayinlayanKisi','$makaleYayinlanmaTarihi','$kategoriRefID')";
       
        $sonuc = mysqli_query($baglanti,$query_MakaleEkle);
       
        if($sonuc){
           $makaleResimTmp=$_FILES['Resim']['tmp_name'];
           $destination="../_upload/resimler/makaleResimler/".$makaleResim;
            move_uploaded_file($makaleResimTmp,$destination);
            echo 'makale Eklendi';
           
        }
    }
    
    
    
 
  ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Makale Ekle</title>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
    <script type="application/x-javascript">
tinymce.init({selector:'#TypeHere'});
</script>
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
   
   
</head>
<body>
    
    
 <div class="ortala">
    
    
    <div class="yasla solSide">
<?php include ('../solSide.php');?>
 
    
    </div>
    <div class="yasla icerik">    
     <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->ID;?>" >
                    <?= $row_rsKategoriler->Adi;?>
                </option>
                <?php }while($row_rsKategoriler= mysqli_fetch_object($rsKategoriler));?>
 
            </select>
            <br/>
              <br/>
            
          
            <label for="Adi">Makale Adı:</label> 
           <input type="text" name="Adi" id="Adi" />
              <br/>
              <br/>
           <label for="Detay">Detay :</label> 
           <textarea id="TypeHere" name="Detay"></textarea>
          <label for="Resim">Resim Seç:</label> 
          <input type="file" name="Resim" id="Resim" />
            
        </fieldset>
        <input type="submit" name="makaleEkleSubmit" value="Makale Ekle" />
    </form>
      

              
              
          </div>
      </div>
    
   
</body>
</html>
