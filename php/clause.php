<?php
    //编码
    header("Content-type: text/html; charset=utf-8");

    $id=$_GET['id'];

    //数据库实例
    $dbc = new MySQLi("127.0.0.1","root","root","lh_lulutong");
    //查询编码设置
    mysqli_query($dbc, "set names utf8");

    //查询语句
    $sql="select *from lh_card where cardnum='$id'";

    $result = $dbc->query($sql); 
    while($arr_tmp = $result->fetch_assoc()){
        $arr[] = $arr_tmp; //添加到数组$arr;
    }  
    $re = array(
        "state"=>true,
        "data" => $arr,
    );

        //转换为JSON输出
    $reJSONStr = json_encode($re);
    print_r( $reJSONStr);


?>