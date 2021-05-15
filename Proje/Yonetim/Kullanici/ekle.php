<?php // mysql sunucu bağlantısı bağlantısı
include("..//baglan.php");
   

    //Kategori ekleme kodları
    if(isset($_POST['kullaniciEkleSubmit']))
    {  
       
       $regex_lowercase = '/[a-z]/'; // küçük harf
       $regex_uppercase = '/[A-Z]/'; // büyük harf
       $regex_number = '/[0-9]/'; //sayı
       $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>~]/'; // özel karakter
       $npw=$_POST['Sifre'];
       if(!preg_match_all($regex_lowercase,$npw) || !preg_match_all($regex_uppercase,$npw) || !preg_match_all($regex_number,$npw) || !preg_match_all($regex_special,$npw)) 
       {
        if(strlen($npw)<7) 
        { 
            echo "şifre dandik";
        }
        else
        {
            echo "şifre güzel";
            echo "form gönderildi";      
       echo "<pre>";
       print_r($_POST);      
       echo "</pre>";         
       $kullaniciAdi = mysqli_real_escape_string($baglanti,$_POST['Adi']);
       $kullaniciSoyadi = mysqli_real_escape_string($baglanti,$_POST['Soyadi']);
       $kullaniciTelefon = mysqli_real_escape_string($baglanti,$_POST['Telefon']);
       $kullaniciEmail = mysqli_real_escape_string($baglanti,$_POST['Email']);
       $kullaniciAdres = mysqli_real_escape_string($baglanti,$_POST['Adres']);       
       $kullaniciSifre = mysqli_real_escape_string($baglanti,$_POST['Sifre']);
       $query_KullaniciEkle="insert into kullanicilar(Adi,Soyadi,Telefon,Email,Adres)" . " values('$kullaniciAdi','$kullaniciSoyadi','$kullaniciTelefon','$kullaniciEmail','$kullaniciAdres')";       
       $sonuc = mysqli_query($baglanti,$query_KullaniciEkle);
        
            if($sonuc)
            {
                $sonid = mysqli_fetch_array(mysqli_query($baglanti,"SELECT * FROM kullanicilar ORDER BY ID DESC LIMIT 1")); 
                $son = $sonid['ID']; 
                $md5_Sifre=  md5($kullaniciSifre);
                $md5_Sifre=  md5($md5_Sifre);
                $md5_Sifre=  md5($md5_Sifre);
                //$query_KullaniciParolaEkle="insert into kullaniciParola(KullaniciRefID,Sifre) values('$son','$kullaniciSifre')";
                $query_KullaniciParolaEkle="insert into kullaniciParola(KullaniciRefID,Sifre) values('$son','$md5_Sifre')";
                $sonuc= mysqli_query($baglanti,$query_KullaniciParolaEkle);
                    if($sonuc)
                    {
                        header ("Location:listele.php"); 
                    }
            }
        }
        }
        
       
    }
    
    ?>
    <head>
        <meta charset="UTF-8">
    <title></title>
    
    <link href="../giris.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="genel">
    <div class="baslik">Üye Kayıt Formu</div>
   <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Kullanıcı Ekle</legend>    
            <label for="Adi">Kullanıcı Adı</label>
           <input type="text" name="Adi" id="Adi" />
           <br/>
          
         <label for="Soyadi">Kullanıcı Soyadı</label> 
         <input type="text" name="Soyadi" id="Soyadi" />
          <br/>
         
           <label for="Telefon">Telefon No</label> 
         <input type="text" name="Telefon" id="Telefon" />
          <br/>
             
           <label for="Email">Email</label> 
         <input type="text" name="Email" id="Email" />
          <br/>
            <label for="Sifre">Şifre</label> 
         <input type="text" name="Sifre" id="Sifre" />
          <br/>
              
             <label for="Adres">Adres</label> 
             <textarea id="Adres" name="Adres"></textarea>
           <br/> <br/>
             <input type="submit" name="kullaniciEkleSubmit" class="buton" value="Kullanıcı Ekle" />
        </fieldset>
       <a href="giris.php">Giriş Sayfasına Git</a>   
        
    </form>
</div>
</body>
</html>
