<?php

//打开session
session_start();

//防止乱码
header("Content-type: text/html; charset=utf-8");
//获取前端传入的用户名,密码和验证码以及登录选择

$id=$_GET['id'];
$pwd=$_GET['pwd'];
$act=$_GET['act'];
$code=$_GET['code'];

//数据库实例
$dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");

//查询编码设置
mysqli_query($dbc, "set names utf8");

//判断验证码
    if($code!=$_SESSION['authnum_session']){
        $re = array(
            "state"=>false,
            "code"=>5,
            "msg"=>'验证码错误',
        );
        $reJSONStr = json_encode($re);
        print_r( $reJSONStr);
        exit();
}


    //登录查询情况判断
    if($act=="card"|| "staff"){
        $sql = "select *from lh_card where cardnum='$id' and password='$pwd'" ;
        $result = $dbc->query($sql); 
        while($arr_tmp = $result->fetch_assoc()){
            $arr[] = $arr_tmp; //添加到数组$arr;
        }  
        $rows=$result->num_rows;
        if($rows){
        $re = array(
            "state"=>true,
            "code"=>$arr[0]["state"],
            "data" => $arr,
        );
    }
    else{
    $re = array(
        "state"=>false,
        "code"=>4,
        "msg"=>'用户名或密码错误',
    );
        }
 }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
//激活情况

//转换为JSON输出
$reJSONStr = json_encode($re);
print_r( $reJSONStr);

?>