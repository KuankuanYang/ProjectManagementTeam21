<?php

function redirect($url,$l2=0,$msg=''){
    // URL, 停留时间, 显示消息
    //多行URL地址支持
    $url = str_replace(array("\n", "\r"), '', $url);
    $msg = $msg ? $msg : '页面跳转中....';   //定义变量$msg为空和不为空情况下的跳转说明
    $js  = "<script language='javascript' type='text/javascript'>location.href='$url';</script>";
	echo $js;

}

?>