<?php
/*
www.celalyurtcu.com
*/

$dosya_veya_klasor_adi = "test";

if(is_file($dosya_veya_klasor_adi))
{
echo "Bu bir dosyadýr!";
}

if(is_dir($dosya_veya_klasor_adi))
{
echo "Bu bir klasördür!";
}

?>