<?php
header("Content-type: text/html; charset=utf-8");
$id=$_GET['id'];
$pwd=$_GET['pwd'];
$act=$_GET['act'];
$dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");
mysqli_query($dbc, "set names utf8");

$sql = "select *from lh_card where cardnum='$id' and password='$pwd' and state=0" ;

$sql1="insert into lh_actcard (tb_name) values ('$pwd')";
$sql2="update lh_card set state=1 where cardnum='$id' ";
// $sqlmore="slect *from lh_card where  state=0";
//执行查询语句 query函数
$result = $dbc->query($sql);
// $resultmore=$dbc->query($sqlmore);
//返回结果数量
$rows=$result->num_rows;
// $rowsmore=$result->num_rows;

if($rows){
    $re = array(
        "state"=>true,
        "msg"=>'成功登录',
    );
    $retval = mysqli_query( $dbc, $sql1 );
    $ret = mysqli_query( $dbc, $sql2 );
}
else{
    $re = array(
        "state"=>false,
        "msg"=>'卡号或者密码错误',
        "act"=>$act
    );
}
$reJSONStr = json_encode($re);
print_r( $reJSONStr);

?>