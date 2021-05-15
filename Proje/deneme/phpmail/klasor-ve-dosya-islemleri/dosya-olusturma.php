<?php
/*
www.celalyurtcu.com
*/

$dosya_adi="dosya.txt";

if (file_exists($dosya_adi))
{
echo "Dosya zaten var!";
}

else

{
touch($dosya_adi);
echo "Dosya oluþturuldu.";
}

?> 

