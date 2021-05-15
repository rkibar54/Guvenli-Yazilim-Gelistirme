<html>
<head>
	<meta http-equiv="Content-Language" content="tr">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
	<title>Örnek iletişim formu</title>
</head>
<body>
<fieldset style="width:400px;">
	<h3><a href="iletisim.php">İletişim Formu</a></h3>
	<form method="post" action="iletisim.php?islem">
	<p><input type="text" name="isim" size="20" /> <label for="isim"> <b>Adınız</b> </label></p>

	<p><input type="text" name="eposta" size="20" /> <label for="eposta"> <b>Eposta Adresiniz</b> </label></p>

	<p><input type="text" name="konu" size="20" /> <label for="konu"> <b>Konu</b> </label></p>
	<p><textarea rows="6" name="mesaj" cols="30"></textarea> <label for="mesaj"> <b>Mesajınız</b> </label></p>

	<p><input type="reset" value="Sıfırla" /> <input type="submit" value="Gönder" /></p> 
<?php

if (isset($_GET['islem'])) {
	
	if ($_POST['eposta']<>'' && $_POST['isim']<>'' && $_POST['konu']<>'' && $_POST['mesaj']<>'') {

	require_once("class.phpmailer.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "mail.alanadi.com ya da mail cikis ip si";
	$mail->SMTPAuth = true;
	$mail->Username = "E-posta Adresinizi Yazınız";
	$mail->Password = "E-posta Şifrenizi Yazınız";
	$mail->From = "E-posta Adresinizi Yazınız";
	$mail->Fromname = $_POST['isim'];
	$mail->AddAddress("E-posta Adresinizi Yazınız","Mail gönderimi");
	$mail->Subject = $_POST['konu'] . $_POST['eposta'];
	$mail->Body = $_POST['mesaj'];

	if(!$mail->Send())
	{
	   echo '<font color="#F62217"><b>Gönderim Hatası: ' . $mail->ErrorInfo . '</b></font>';
	   exit;
	}
	echo '<font color="#41A317"><b>Mesaj başarıyla gönderildi.</b></font>';
	} else {
		 echo '<font color="#F62217"><b>Tüm alanların doldurulması zorunludur.</b></font>';
	}
}
?>
	</form>
</fieldset>
</body>
</html>
