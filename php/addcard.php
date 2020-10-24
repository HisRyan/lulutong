<?php
header("Content-type: text/html; charset=utf-8");
$dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");
mysqli_query($dbc, "set names utf8");
  $name=$_POST['name'];
  $type=$_POST['type'];
  $gender=$_POST['gender'];
  $data=$_POST['data'];
  $perid=$_POST['perid'];
  $email=$_POST['email'];
  $pho=$_POST['pho'];
  $address=$_POST['address'];
  $sql="insert into lh_actcard (tb_name,tb_type,tb_sex) values ('$name', '$type','$gender')";
  $result = $dbc->query($sql); 
?>