<?php
//防止乱码

header("Content-type: text/html; charset=utf-8");
//获取用户名和密码
$id=$_GET['id'];
$pwd=$_GET['pwd'];

//拼接查询语句
$sql = "select *from carddata where cardNum='$id' and cardPWd='$pwd' "  ;

//数据库实例
$dbc = new MySQLi("127.0.0.1","root","root","datacard");


//查询编码设置
mysqli_query($dbc, "set names utf8");

//执行查询语句 query函数
$result = $dbc->query($sql);
while($arr_tmp = $result->fetch_assoc()){

    $arr[] = $arr_tmp; //添加到数组$arr;

}
$rows=$result->num_rows;
if($rows){
    $re = array(
        "state"=>true,
        "code"=>1,
        "msg"=>'成功登录',
        "data" => $arr,
    );
}
else{
    $re = array(
        "state"=>false,
        "code"=>0,
        "msg"=>'用户名或密码错误',
    );
}
$reJSONStr = json_encode($re);
print_r( $reJSONStr);
?>