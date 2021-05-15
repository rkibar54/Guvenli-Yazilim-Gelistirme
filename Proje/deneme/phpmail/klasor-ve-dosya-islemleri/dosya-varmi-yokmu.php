<?php
/*
www.celalyurtcu.com
*/

$dosya_adi = "index.php";

if(file_exists($dosya_adi))
{
echo "Dosya var.";
}
else
{
echo "Dosya yok.";
}

?>