<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
<title>Giriş Formu</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="gonder.php" method="post">
			<h1>E-Mail Gönderme</h1>
			
			<table border="0" width="650">
	<tr>
		<td valign=middle>Adı Soyadı</td>
		<td>:</td>
		<td><input type="text" placeholder="Adınız Soyadınız" required="" name="ad" /></td>
	</tr>
	<tr>
		<td valign=middle>E-Posta Adresi</td>
		<td>:</td>
		<td><input type="text" placeholder="E-Posta Adresiniz" required="" name="email" /></td>
	</tr>
	<tr>
		<td valign=middle>Mesaj</td>
		<td>:</td>
		<td><textarea name="msg"  required="" cols="46" rows="7"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>		

			<div align="center">
				<input type="submit" value="Gonder" />
			</div>
		</form>
	</section>
</div>
</body>
</html>