<?php
/*
www.celalyurtcu.com
*/

$dosya_adi="dosya.txt";

if(!file_exists($dosya_adi))
{
echo "Silinecek dosya yok!";
exit();//Ýþlemi durdur
}

unlink($dosya_adi);
echo "Dosya silindi.";

?>
