<?php include("yonetim/baglan.php");

    $query_Kategoriler = "SELECT * FROM kategoriler limit 6";
    $rsKategoriler= mysqli_query($baglanti,$query_Kategoriler);
    $row_rsKategoriler= mysqli_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);
    
if(isset($_GET["id"]))
    {
    $_id=$_GET["id"];
    $sorgu=mysqli_query($baglanti,"select * from makaleler where ID='$_id'");
    $kayit=mysqli_fetch_array($sorgu);
    }

    ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Anasayfa</title>
    <style type="text/javascript">   
                .makaleKutusu{
                    with:800px;
                    border:solid 1px;
                }
</style>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

   
   <link href="stil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="AnaSayfa">

     <div class="menuler">
     <div class="elemanMenu">Anasayfa</div>
     <div class="elemanMenu">Hakkımızda</div>
     <div class="elemanMenu">Refaranslar</div>
     <div class="elemanMenu">Misyonumuz </div>
     <div class="elemanMenu">Vizyonumuz</div>
     <div class="elemanMenu" style="width: 215px;">
         <?php 
            session_start();
            if(isset($_SESSION["Rol"]))
            {
                if($_SESSION["Rol"]=="Admin") 
                {
                echo "<a href='Yonetim/Kategori'>Yonetim Giriş</a>";
                }
            }     
         ?>
     </div>
     
     <div class="elemanMenu" style="width: 215px;"> 
         <?php 
     
            if(isset($_SESSION['Giris']))
            {
               echo $_SESSION["Email"]."<a href='Yonetim/Kullanici/cikis.php'>Çıkış</a>";
            }
            else
            {
            echo "<a href='Yonetim/kullanici/giris.php'>Giriş</a>";
            }    
         ?> 
     </div>
     </div>
     
   
  <div class="content">

  
      <div class="OrtaKutuAlani">
          <div class="sideBar solaYasla" id='cssmenu'><b style="color:#FFF">KATEGORİLER</b> 
              <ul>
               <?php do { ?>
                  
                  <li class='active'><a href='#'><?= $row_rsKategoriler->Adi;?></a></li>
              <?php }while($row_rsKategoriler= mysqli_fetch_object($rsKategoriler)); ?></ul>
          </div>
          <div class="makaleKutusu solaYasla"> 
               <div class="makaleKutusuBaslik">   <p> <?php echo $kayit['Adi']; ?></p></div>
      
               <div class="makaleKutusuicerik">
                    <div class="solaYasla makaleKutusuResim"> <img width="150px" height="200px" src="yonetim/_upload/resimler/makaleResimler/<?php echo $kayit['Resim'];?>"/> </div>
                    <div class="makaleKutusuDetay"><span><p> <?php echo $kayit['Detay']; ?></p></span></div>
               </div>            
          </div>               
      </div>
  </div>
         
</body>
</html>
