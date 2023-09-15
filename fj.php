

<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'setv';
$n = [
'cctv1'     => 370,       //CCTV-1
'cctv13'   => 371,     //CCTV-13
'zhpd'     =>  4,          //综合
'setv'      =>  5,          //东南
'ggpd'    =>  6,          //公共
'xwpd'    => 13 ,        //汉语综艺频道
'dsjpd'   =>  7,           //电视剧
'dspd'    =>  8,           //旅游
'jspd'     =>  9,           //经视
'typd'    => 10,           //文体
'sepd'    =>  2,           //少儿
'hxtv'     => 3,              //海峡
'yxxw'     => 369,              //尤溪新闻综合频道
'sxxw'     => 378,              //沙县新闻综合频道

];
$url = 'https://live.fjtv.net/m2o/channel/channel_info.php?channel_id='.$n[$id];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_REFERER,'https://live.fjtv.net/');
$res = curl_exec($ch);       
curl_close($ch);
//var_dump ($res);

$m3u8 = json_decode($res)[0]->channel_stream[0]->m3u8;
//var_dump ($m3u8);

header('Location:'.$m3u8);
?>

