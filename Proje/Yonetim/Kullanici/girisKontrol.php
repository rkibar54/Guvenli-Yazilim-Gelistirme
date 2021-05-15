<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
//session_start();
if($_SESSION['Giris'])
{
    NULL;
}  
else 
{
    $_SESSION['mesaj']="Önce Giriş yapmalısınız";
    header ("Location:../Kullanici/giris.php");    
}

