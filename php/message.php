
<?php

//编码
header("Content-type: text/html; charset=utf-8");

if(isset($_GET['classid'])){
    $classid = $_GET['classid'];
}

//拼接查询语句
$sql = "select * from carddata where cardNum=$classid"  ;
// .$classSQL.$readcountSQL." limit ".$startIndex.",".$pageSize
//调试SQL语句
// print_r($sql); exit();

//数据库实例
$dbc = new MySQLi("127.0.0.1","root","root","datacard");

//查询编码设置
mysqli_query($dbc, "set names utf8");

//执行查询语句 query函数
$result = $dbc->query($sql);

$arr = array();//定义数组


while($arr_tmp = $result->fetch_assoc()){

    $arr[] = $arr_tmp; //添加到数组$arr;

}


$re = array(
    "state"=>true,
    "code"=>1,
    "msg"=>'成功',
    "data" => $arr,
    // "total"=>$total
);

//转为JSON字符串
$reJSONStr = json_encode($re);

print_r( $reJSONStr );

?>