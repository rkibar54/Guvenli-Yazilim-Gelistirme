<?php
/*
www.celalyurtcu.com
*/

$dosya = "dosya.txt";

$dosya=fopen($dosya,"a");

$veri_yazdir="deneme123 ";

fwrite($dosya, $veri_yazdir);

echo "veri yazdırıldı.";

fclose($dosya);

