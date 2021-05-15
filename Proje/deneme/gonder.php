<?php ob_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
<title>Giri� Formu</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
$ad=$_POST['ad'];   
$email=$_POST['email'];
$msg= $_POST['msg'];

$mailtanim = "MIME-Version: 1.0\r\n"; // bu k�s�m tan�mlama k�sm�
$mailtanim .= "Content-type: text/plain; charset=iso-8859-9\r\n";
$mailtanim .= "From: $name <$ad>\r\n";
$mailtanim .= "Reply-To: $name <$email>\r\n"; 	

$mailsonuc = mail("ibrahimugur@outlook.com", "$email adresinden mesajınız var..!" ,stripslashes($msg), $mailtanim); 

if($mailsonuc) { 
	echo "<br><br><h2>E-Postanız başarıyla gönderildi.<br><br>Ana sayfaya yönlendiriliyorsunuz!</h2>";
	//header("Refresh:2 ; url=index.php");
}
else
	echo "Mail gönderilirken hata oluştu..!";

?>
		
	</section>
</div>
</body>
</html>