<?php
/*
www.celalyurtcu.com
*/

$klasor_adi = "test";

if(!file_exists($klasor_adi))
{
echo "Silinecek klasör yok!";
exit();//Ýþlemi durdur
}

$klasor_sil = rmdir($klasor_adi);

if($klasor_sil)
{

echo "Klasör silindi.";

}
else
{

echo "Klasör silinemedi!";

}

?>
