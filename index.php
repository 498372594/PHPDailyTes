<?php 
$code=$_GET['code'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<form action="add.php" >
		<table>
			<tr>
				<td>用户名</td>
				<td><input type="text"></td>
			</tr>
			<input type="hidden" value="<?php echo $code ?>" name="code">
			<tr>
				<td>密码</td>
				<td><input type="text"></td>
			</tr>

			<tr>
				<td><input type="submit"></td>
				<td><a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101353491&redirect_uri=http%3A%2F%2Fwww.iwebshop.com%2Findex.php&state=123"><img src="http://www.iwebshop.com/qq.png" alt="" width="30px" height="30"></a></td>
			</tr>
			</table>
		</form>
</body>
</html>