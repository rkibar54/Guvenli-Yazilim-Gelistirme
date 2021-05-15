<?php // mysql sunucu bağlantısı bağlantısı
 
include("..//baglan.php");
include_once 'dbMySql.php';
session_start();

if(isset($_SESSION['mesaj']))
{
    echo $_SESSION['mesaj'];
    unset($_SESSION['mesaj']);
}

if(isset($_POST['girisSubmit']))
{
    /*
    //sql inc
    //anything' or 'x'='x
    $ad=$_POST['Email'];
    $sfr=$_POST['Sifre'];
    $sql1 = "SELECT * FROM kullanicilar Where Email='$ad' Limit 1";
    echo $sql1;
    
    $sonuc = mysqli_fetch_array(mysqli_query($baglanti, $sql1));
    echo "<br>";
    $ad_id=$sonuc['ID'];
    echo $ad_id;
    $sql2="SELECT * FROM kullaniciParola Where KullaniciRefID='$ad_id' && Sifre='$sfr'"; 
    echo "<br>";
    echo $sql2;
    $sonuc2= mysqli_fetch_array(mysqli_query($baglanti,$sql2));
    $sifre=$sonuc2['Sifre'];
    echo $sifre;
    echo "<br>";
    if($sonuc2){
        $res = mysqli_query($baglanti,"SELECT * FROM kullanicirol where KullaniciRefID='$ad_id' limit 1");
        $res_kullanici_Rol=mysqli_fetch_array($res);
        $res_Rol_ID=$res_kullanici_Rol['KullaniciRolID'];

        $res = mysqli_query($baglanti,"SELECT * FROM roller where ID='$res_Rol_ID' limit 1");
        $res_Rol=mysqli_fetch_array($res);
        $res_Rol_Adi=$res_Rol['Adi'];
        echo $res_Rol_Adi;
                     
        $_SESSION['Rol']=$res_Rol_Adi;
        $_SESSION['Giris']=true;
        //header ("Location:../../anasayfa.php"); 
    }
    else
    {
        echo 'Giriş Başarısız';
        $_SESSION['Giris']=false; 
    }
    */
    
    $kullaniciEmail = mysqli_real_escape_string($baglanti,$_POST['Email']);
    $kullaniciSifre = mysqli_real_escape_string($baglanti,$_POST['Sifre']);
    $kullaniciSorgu = mysqli_fetch_array(mysqli_query($baglanti,"SELECT * FROM kullanicilar Where Email='$kullaniciEmail' Limit 1")); 
    //echo $kullaniciEmail;
    $kul_ID = $kullaniciSorgu['ID']; 
    $kul_Adi=$kullaniciSorgu['Adi'];
    $md5_Sifre=  md5($kullaniciSifre);
    $md5_Sifre=  md5($md5_Sifre);
    $md5_Sifre=  md5($md5_Sifre);
    $sonuc = mysqli_fetch_array(mysqli_query($baglanti,"SELECT * FROM kullaniciParola Where KullaniciRefID='$kul_ID' && Sifre='$md5_Sifre'")); 

        if($sonuc)
        {
          
    
            $res = mysqli_query($baglanti,"SELECT * FROM kullanicirol where KullaniciRefID='$kul_ID' limit 1");
            $res_kullanici_Rol=mysqli_fetch_array($res);
            $res_Rol_ID=$res_kullanici_Rol['KullaniciRolID'];

            $res = mysqli_query($baglanti,"SELECT * FROM roller where ID='$res_Rol_ID' limit 1");
            $res_Rol=mysqli_fetch_array($res);
            $res_Rol_Adi=$res_Rol['Adi'];
            echo $res_Rol_Adi;
                     
            $_SESSION['Rol']=$res_Rol_Adi;
            $_SESSION['KullaniciAdi']=$kul_Adi;
            $_SESSION['KullaniciID']=$kul_ID;
            $_SESSION['Email']=$kullaniciEmail;
            $_SESSION['Giris']=true;
            header ("Location:../../anasayfa.php");    
        }
        else
        {
        echo 'Giriş Başarısız';
        $_SESSION['Giris']=false;    
        }
    
}
    
    
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../giris.css" rel="stylesheet" type="text/css"/>
    
</head>
<body>
    <div class="genel" >  

<div class="baslik" > Üye Paneli</div>
 <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
     <fieldset>
            <legend>Giriş</legend>    
            <label for="Email">Email </label>
             <input type="text" name="Email" id="Email" />
           <br/>
          
            <label for="Sifre">Şifre</label> 
           <input type="text" name="Sifre" id="Sifre" />
           <br/>  <br/>
            
           <input type="submit" name="girisSubmit"  class="buton"value="Giriş" />
        
     </fieldset>
      <a href="ekle.php"   >Kayıt Sayfasına Git </a>
 </form>
    </div>

</body>
</html>
