<?php
/*
www.celalyurtcu.com
*/

$klasor_adi = "dosya";

if(file_exists($klasor_adi))
{
echo "Klas�r zaten var!";
exit();//��lemi durdur
}

$olustur = mkdir($klasor_adi, 0700);

if($olustur)
{
echo "Klas�r olu�turuldu.";
}
else
{
echo "Klas�r olu�turulamad�!";
}

?>
