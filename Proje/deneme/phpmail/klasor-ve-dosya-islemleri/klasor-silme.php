<?php
/*
www.celalyurtcu.com
*/

$klasor_adi = "test";

if(!file_exists($klasor_adi))
{
echo "Silinecek klas�r yok!";
exit();//��lemi durdur
}

$klasor_sil = rmdir($klasor_adi);

if($klasor_sil)
{

echo "Klas�r silindi.";

}
else
{

echo "Klas�r silinemedi!";

}

?>
