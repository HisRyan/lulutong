<?php
header("Content-type: text/html; charset=utf-8");
session_start();

   $tb_cardnum=$_GET['id'];
   $tb_name =$_GET['tb_name'];
   $tb_type =$_GET['tb_type'];
   $tb_gender=$_GET['tb_gender'];
   $tb_date =$_GET['tb_date'];
   $tb_perid =$_GET['tb_perid'];
   $tb_email =$_GET['tb_email'];
   $tb_pho =$_GET['tb_pho'];
   $tb_address=$_GET['tb_address'];

   $bb_name =$_GET['bb_name'];
   $bb_type =$_GET['bb_type'];
   $bb_gender= $_GET['bb_gender'];
   $bb_date = $_GET['bb_date'];
   $bb_perid = $_GET['bb_perid'];
   $bb_email = $_GET['bb_email'];
   $bb_pho = $_GET['bb_pho'];
   $bb_address= $_GET['bb_address'];
   $tbtime= $_GET['tbtime'];
   
    //数据库实例
    $dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");

    //查询编码设置
    mysqli_query($dbc, "set names utf8");
     
    $sql3 = "select *from lh_actcard where cardnum='$tb_cardnum'" ;
    $resth= $dbc->query($sql3); 
   
    $rows=$resth->num_rows;
    if($rows){
        $re = array(
            "state"=>0,
            "msg"=>'已经激活,请勿重复操作',
        );
        //转换为JSON输出
        $reJSONStr = json_encode($re);
        print_r( $reJSONStr);
        exit();
    }




    $sql = "insert into lh_actcard (cardnum,tb_name,tb_type,tb_card,tb_phone,tb_sex,tb_email,tb_address,tb_birthday,bb_name,bb_type,bb_card,bb_phone,bb_sex,bb_email,bb_address,bb_birthday,effecttime) values 
    
    ('$tb_cardnum','$tb_name','$tb_type','$tb_perid','$tb_pho','$tb_gender','$tb_email','$tb_address','$tb_date','$bb_name','$bb_type','$bb_perid','$bb_pho','$bb_gender','$bb_email','$bb_address','$bb_date','$tbtime')" ;
    $result = $dbc->query($sql); 
    
    $sql2="update lh_card set state=1,statech='激活未生效' where cardnum='$tb_cardnum'";
    $retch = $dbc->query($sql2); 
    $re = array(
        "code"=>1,
        "msg"=>'激活',
    );
    //转换为JSON输出
    $reJSONStr = json_encode($re);
    print_r( $reJSONStr);
?> 