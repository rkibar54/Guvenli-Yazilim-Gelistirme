<?php include("yonetim/baglan.php");


   $query_makaleler = "SELECT * FROM makaleler limit 5";
   $rsMakaleler = mysqli_query($baglanti,$query_makaleler);
   $row_rsMakaleler = mysqli_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = mysqli_num_rows($rsMakaleler);      
    
   $query_Kategoriler = "SELECT * FROM kategoriler limit 6";
   $rsKategoriler = mysqli_query($baglanti,$query_Kategoriler);
   $row_rsKategoriler = mysqli_fetch_object($rsKategoriler);
   $num_row_rsKategoriler = mysqli_num_rows($rsKategoriler);
   
   
   
   
   
 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Anasayfa</title> 
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link href="stil.css" rel="stylesheet" type="text/css" />
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
          if(!empty($_SESSION["Rol"]))
          {          
            if($_SESSION["Rol"]=="Admin") 
            {
            echo "<a style='color:red' href='Yonetim/Kategori'>Yonetim Giriş</a>";
            }
          }
           /* if(!empty($_SESSION["Rol"]))
          {          
            if($_SESSION["Rol"]=="Editor") 
            {
            echo "<a style='color:white' href='/Editor'>Editör Giriş</a>";
            }
          }*/
          ?>
         </div>
         <div class="elemanMenu" style="width: 215px;"> 
          <?php 
          if(!empty($_SESSION['Giris']))
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
                      <li class='active'><a href='#'><span><?= $row_rsKategoriler->Adi;?></span></a></li>
                  <?php }while($row_rsKategoriler= mysqli_fetch_object($rsKategoriler));?></ul>
              </div>
              <div class="resimKutusu solaYasla">      
                <img height="300px" width="600px" src="yonetim/_upload/resimler/makaleResimler/bayrak.jpg"/>

              </div>
              <div class="sideBar solaYasla" id='cssmenu' style="border: solid 1px;">
                   <?php
                   
                  if(isset($_POST['yorumSubmit']))
                        {
                            //$yorum = $_POST['yorum'];
                            //<script>alert(1)</script>
                            $yorum = htmlspecialchars($_POST['yorum']);                           
                            echo $yorum;

                        } 
                    ?>
                 <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">             
                            <label for="yorum">Sitemizi Nasıl Buldunuz: </label>
                            <input type="text" name="yorum" id="yorum" />
                          <br/>                         
                          <input type="submit" name="yorumSubmit"  class="buton"value="Gönder"/>              
                </form>
                <?php 
                 if(!empty($_SESSION['Giris']))
                 echo "<a href='Yorum'>Makalelere Yorum Yapmak İçin Tıklayınız</a>";                            
                ?>  
                  
                  
                  
                  
                  
              </div>
          </div>

            <div class="Kutular">
            <?php do { ?>
              <div class="makaleKutusu solaYasla"> 
                  <div class="makaleKutusuBaslik">   
                      <p> <?= $row_rsMakaleler->Adi; ?></p>
                  </div>

                  <div class="makaleKutusuicerik">        
                      <div class="solaYasla"> 
                          <img height="100px" width="75px" src="yonetim/_upload/resimler/makaleResimler/<?= $row_rsMakaleler->Resim; ?>"/> 
                      </div>
                      <div class="makaleKutusuDetay">
                          <p> <?= substr($row_rsMakaleler->Detay, 0,450);?>
                          <a href="makaleDetay.php?id=<?=$row_rsMakaleler->ID;?>" style="color:orange;">yazının devamı</a></p>
                      </div>
                  </div>


              </div>

            <?php }while($row_rsMakaleler= mysqli_fetch_object($rsMakaleler));?>   


            </div>    
      </div>
    </div>
</body>
</html>
