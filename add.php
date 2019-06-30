<?php
$appid="101353491";
session_start();
$appkey="df4e46ba7da52f787c6e3336d30526e4";

$url="http://www.iwebshop.com/index.php";
$urls=URLEncode($url);
	
	
	$code=$_GET['code'];
	//获取code值
	$token="https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$appid}&client_secret={$appkey}&code={$code}&redirect_uri={$url}";
	$tok=file_get_contents($token);
	//字符串转为数组
	$toke=explode("&",$tok);
	$to=explode("=",$toke[0]);
	//字符串转为数组
	$tokenn=$to[1];
	//获取openid
	$open="https://graph.qq.com/oauth2.0/me?access_token={$tokenn}";
	$openi=file_get_contents($open);
	//截取字符串
	 $openid=substr($openi,-38,32);
	 $info="https://graph.qq.com/user/get_user_info?access_token={$tokenn}&oauth_consumer_key={$appid}&openid={$openid}";
	 $userinfo=file_get_contents($info);
	 //转换为数组
	 $arrinfo=json_decode($userinfo,true);
	 $_SESSION['name']=$arrinfo['nickname'];

	 if(empty($arrinfo['nickname'])){
	 	
	 	echo "<a>登陆失败</a>";
	 }else{
	 	echo $_SESSION['name']."<a href='show.php'>登陆成功</a>";	
	 }
