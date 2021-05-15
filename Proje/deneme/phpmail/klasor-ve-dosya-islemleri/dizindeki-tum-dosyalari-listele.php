<?php
/*
www.celalyurtcu.com
*/

$dizin_adi = ".";

$dizin = opendir($dizin_adi);

while(gettype($ad=readdir($dizin))!=boolean)
{

echo "$dizin_adi/$ad<br>";

}

closedir($dizin);



