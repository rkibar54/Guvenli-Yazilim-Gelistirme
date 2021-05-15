<?php
include("..//baglan.php");
class DB_con
{
    
 /*function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB_NAME, $conn);
 }*/
 
 public function select($tablo)
 {
  $baglanti = mysqli_connect("localhost","root","","gyg");
  $res=mysqli_query($baglanti,"SELECT * FROM $tablo");
  return $res;
 }

 public function delete($table,$id)
 {
  $res = mysqli_query($baglanti,"DELETE FROM $table WHERE user_id=".$id);
  return $res;
 }
 
 public function update($table,$id,$fname,$lname,$city)
 {

  $res = mysqli_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=".$id);
  return $res;
 }
 
  
 public function getirKullaniciRol($id)
 {          
   $res = mysqli_query($baglanti,"SELECT * FROM kullanicirol where KullaniciRefID='$id' limit 1");
   $res_kullanici_Rol=mysqli_fetch_array($res);
   $res_Rol_ID=$res_kullanici_Rol['KullaniciRolID'];
   
   
   $res = mysqli_query($baglanti,"SELECT * FROM roller where ID='$res_Rol_ID' limit 1");
   $res_Rol=mysqli_fetch_array($res);
   $res_Rol_Adi=$res_Rol['Adi'];
  return $res_Rol_Adi;

 }
 
 
 
}
