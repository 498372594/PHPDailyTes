<?php
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1611d","root","root");
@$city=$_GET['city'];

$data=$pdo->query("select * from ditu where city='$city'")->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<input type="hidden" id="lng" value="<?php echo $data['lng'] ?>">
<input type="hidden" id="lat" value="<?php echo $data['lat'] ?>">
	<form action="add.php" >
		<table>
			<tr>
				<td><input type="text" name="city"></td></tr>
				<tr><td><script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=9mPQNpCeTmKvPVmMsHuco1STKlPZjWkN"></script>
				<div id="allmap" style="width:320px;height:120px"></div>
				<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
	//添加地图类型控件

	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
	var new_point = new BMap.Point(document.getElementById("lng").value,document.getElementById("lat").value);
			var marker = new BMap.Marker(new_point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
			map.panTo(new_point);      
</script><input type="submit"></td>
			
			
		</table>
	</form>
</body>

</html>