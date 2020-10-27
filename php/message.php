
<?php

//编码
header("Content-type: text/html; charset=utf-8");

$id=$_GET['classid'];
$act=$_GET['act'];

//数据库实例
$dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");
//查询编码设置
mysqli_query($dbc, "set names utf8");

//判断
if($act=="staff"){
    $sql="select *from lh_staff where cardnum='$id'";
    $result = $dbc->query($sql);
    $arr = array();//定义数组
    while($arr_tmp = $result->fetch_assoc()){
        $arr[] = $arr_tmp; //添加到数组$arr;
    }
    $rows=$result->num_rows;
    if($rows){
    $re = array(
        "state"=>true,
        "code"=>1,
        "msg"=>'成功',
        "data" => $arr,
        // "total"=>$total
    );
    }
    else{
        $re = array(
            "state"=>false,
            "code"=>0,
            "msg"=>'请求失败',
            // "total"=>$total
        );
    }
}

else if($act=="stid"){

//拼接查询语句
$sql = "select *from lh_card where cardnum=$id"  ;
$sqlmore="select *from lh_actcard where cardnum=$id";
// .$classSQL.$readcountSQL." limit ".$startIndex.",".$pageSize
//调试SQL语句
// print_r($sql); exit();

//数据库实例
$dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");

//查询编码设置
mysqli_query($dbc, "set names utf8");

//执行查询语句 query函数
$result = $dbc->query($sql);
$restch=$dbc->query($sqlmore);

$arr = array();//定义数组
$arr1=array();

while($arr_tmp = $result->fetch_assoc()){

    $arr[] = $arr_tmp; //添加到数组$arr;

}
while($arr_tmp1 = $restch->fetch_assoc()){

    $arr1[] = $arr_tmp1; //添加到数组$arr;
}


$re = array(
    "state"=>true,
    "code"=>2,
    "msg"=>'成功',
    "data" => $arr,
    "datamore"=>$arr1,
    // "total"=>$total
);
}


//转为JSON字符串
$reJSONStr = json_encode($re);

print_r( $reJSONStr );

?>