<?php
$file=$_FILES['blob']['tmp_name'];
$num=$_POST['num'];
$count=$_POST['count'];
move_uploaded_file($file,"a-".$num);
if($num==$count){
	$str='';
	for($i=1;$i<=$count;$i++){
		$str.=file_get_contents("a-".$i);
	}
	 
	  file_put_contents("test.mp4",$str);
}
?>