<?php
/*
www.celalyurtcu.com
*/

$klasor_adi = "dosya";

if(file_exists($klasor_adi))
{
echo "Klasör zaten var!";
exit();//Ýþlemi durdur
}

$olustur = mkdir($klasor_adi, 0700);

if($olustur)
{
echo "Klasör oluþturuldu.";
}
else
{
echo "Klasör oluþturulamadý!";
}

?>
