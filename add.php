<?php
$city=$_GET['city'];





$url="http://api.map.baidu.com/geocoder/v2/?address={$city}&output=json&ak=r4gLPfHgd4GaddyF1f6oIappbHX6qriA";
$urls=file_get_contents($url);
$json=json_decode($urls,true);
$lng=$json['result']['location']['lng'];
$lat=$json['result']['location']['lat'];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1611d","root","root");
if($pdo->query("select * from ditu where city='$city'")->fetch()){
	$pdo->query("select * from ditu where city='$city'")->fetch();
}else if($city!=''){
	$pdo->exec("insert into ditu(city,lng,lat)values('$city','$lng','$lat')");
}




?><a href="index.php?city=<?php echo $city ?>">添加成功</a>;