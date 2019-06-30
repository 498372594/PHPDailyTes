<?php
namespace app\index\controller;

use think\facade\Request;
use think\cache\driver\Redis;

class Index
{
	public function index1(){
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);
		$redis->set('tp51','515151');
		echo $redis->get('tp51');
	}
	
    public function index()
    {
    	new \Redis();
    	$redis = new \Redis();
    	$redis->connect('127.0.0.1', 6379);
    	$redis->set('tp51','515151');
    	echo $redis->get('tp51');
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    public function hello()
    {
    	redis()->set('05a','优秀');
    	echo redis()->get('05a');
    }
    
    //第一天算法
    //统计字符串中出现的字符的出现次数
    public function strNum(){
    	//接受参数
    	$str = input('param.str');
    	//定义空数组
    	$arr = [];
    	//循环所有的字符串里的字符
    	for($i=0;$i<strlen($str);$i++){
    		//判断是否存在
    		if(isset($arr[$str[$i]])){
    			//存在次数+1
    			$arr[$str[$i]] += 1;
    		}else{
    			//不存在次数=1
    			$arr[$str[$i]] = 1;
    		}
    	}
    	//输出
    	print_r($arr);
    }
    
    public function strnum2(){
    	$str = input('param.str');
    	//
    	$str_list = str_split($str,1);
    	
    	$arr = array_count_values($str_list);
    	
    	print_r($arr);
    }
    
    //第二日算法
    //找出范围内 所有位数一样的 数字
    public function day2(){
    	//传入的参数
    	$num = 10000;
    	//存储符合要求的数组
    	$arr = [];
    	//循环数据
    	for($i=10;$i<=$num;$i++){
    		self::$ws = [];
    		$this->weishu($i);
    		$count = array_count_values(self::$ws);
    		if(sizeof($count) == 1){
    			$arr[] = $i;
    		}
    	}

    	print_r($arr);
    }
    public function shuixianhua(){
    	//输入的参数
    	$n = 153;
    	
    	//分割个十百位数
    	$this->weishu($n);
    	
    	//水仙花数判断
    	$gewei = self::$ws[0] * self::$ws[0] * self::$ws[0];
    	$shiwei = self::$ws[1]*self::$ws[1]*self::$ws[1];
    	$baiwei = self::$ws[2]*self::$ws[2]*self::$ws[2]; 
    	$num = $gewei + $shiwei + $baiwei;
    	if($num == $n){
    		return $n.'是水仙花数！';
    	}else{
    		return $n.'不是水仙花数！';
    	}
    }
    static $ws = [];
    //计算输入的数值的每位数字
    public function weishu($n){
    	if($n > 9){
    		self::$ws[] = $n % 10;
    		$this->weishu(intval($n/10));
    	}else{
    		self::$ws[] = $n;
    	}
    }
    
    //个位+百位=十位 的判断方法
    public function panduan(){
    	$num = 456;
    	
    	$gewei = $num % 10;
    	$shiwei = intval($num / 10) % 10;
    	$baiwei = intval($num / 100);
    	
    	if($gewei+$baiwei == $shiwei){
    		echo '验证成功';
    	}else{
    		echo '验证失败';
    	}
    }
    
    //第三日算法
    //等差数列求和
    public function dengcha(){
    	$s = 1;
    	$n = 100;
    	$d = 5;
    	
//     	for($i=1;$i<=$n;$i++){
//     		$s += $d;
//     	}
    	
//     	return $s;
		//递归算法
		$num = $this->dc($s, $n, $d);
		return $num;
    }
    //等差数列递归
    private function dc($s,$n,$d){
    	$num;
    	if($n <= 1){
    		$num = $s + $d;
    	}else{
    		$num = $this->dc($s+$d, $n-1, $d);
    	}
    	return $num;
    }
    function fbnq1($n){
    	if($n <= 0){
    		return 0;
    	}
    	$array[1] = $array[2] = 1; //设第一个值和第二个值为1
    	for($i=3;$i<=$n;$i++){ //从第三个值开始
    		$array[$i] = $array[$i-1] + $array[$i-2];
    		//后面的值都是当前值的前一个值加上前两个值的和
    	}
    	return $array[$n];
    }
    function fbnq2($n){
    	if($n <= 0) return 0;
    	if($n == 1 || $n == 2) return 1;
    	return $this->fbnq2($n - 1) + $this->fbnq2($n - 2);
    }
    
    //第四天日考联系
    //1,6,16,31,51 根据数列计算N项是什么
    public function shulie(){
    	$s = 1;
    	$n = 5;
    	$d = 5;
    	 
//     	for($i=1;$i<$n;$i++){
//     	    $s += ($i*$d);
//     	}

    	$s = $this->shuiliedigui($n);
    	 
    	echo $s;
    }
    
    public function shuiliedigui($n){
    	if($n == 1){
    		return 1;
    	}else{
    		return $this->shuiliedigui($n-1)+5*($n-1);
    	}
    	
    }
    
    //第六天日考
    public function day6(){
    	$n = 100;
    	$m = 200;
    	$num = 0;
    	$list = [];
    	for($n;$n<=$m;$n++){
    		$arr = str_split($n,1);
    		$a = array_count_values($arr);
//     		print_r($a);exit;
			if(isset($a['1'])){
				$num = $num + $a['1'];
				$list[] = $n;
			}
//     		foreach($arr as $k => $v){
//     			if($v == 1){
//     				$num++;
//     				$list[] = $n;
//     			}
//     		}
    	}
    	print_r($list);
    	echo $num;
    }
    
    //第七天日考
    public function day7($index){

    	while($index % 2 == 0){
    		$index /= 2;
    	}
    	while($index % 3 == 0){
    		$index /= 3;
    	}
    	while($index % 5 ==0){
    		$index /=5;
    	}
    	if($index == 1)
    		return true;
    	else
    		return false;
    }
    
    public function chou(){
    	$max = 20;
    	$n = 0;
    	for($i=1;;$i++){
    		if($this->day7($i)){
    			$n++;
    			if($n == $max){
    				echo '第'.$n.'位的丑数是'.$i;
    				break;
    			}
    		}
    	} 
    }
    
    //换瓶子的算法
    //2元一瓶 2瓶换一瓶 4盖换一瓶 
    public function yinliao(){
    	$m = 20;
    	//数组 0代表有多少钱 1代表有多有空瓶 2代表有多少瓶盖
    	$arr = [20,0,0];
    	//记录总瓶数
    	$count = 0;
    	
    	while (1){
    		
    		$m_c = intval($arr[0]/2);
    		$arr[0] = $arr[0]%2;
    		$arr[1] += $m_c;
    		$arr[2] += $m_c;
    		
    		$p_c = intval($arr[1]/2);
    		$arr[1] = $arr[1]%2;
    		$arr[1] += $p_c;
    		$arr[2] += $p_c;
    		
    		$g_c = intval($arr[2]/4);
    		$arr[2] = $arr[2]%4;
    		$arr[1] += $g_c;
    		$arr[2] += $g_c;
    		
    		//记录总数
    		$count = $count + $m_c + $p_c + $g_c;
    		
    		//判断 钱不够2元 空瓶不够2个 瓶盖不够4个 退出循环
    		if($arr[0]<2 && $arr[1]<2 && $arr[2]<4){
    			break;
    		}
    		
    	}
    	
    	echo $count;
    	
    }
    
    public function jiu(){
    	$m = 20;//钱
    	$g = 0;//盖
    	$p = 0;//瓶
    	$num = 0;//总数
    	
    	while ($m >= 3 || $p >= 2 || $g >= 4){
	    	//用钱买酒
	    	$n = intval($m / 3);
	    	//把买的酒数 加到 瓶 和 盖 上
	    	$m = $m - $n * 3;
	    	$g = $g + $n;
	    	$p = $p + $n;
	    	$num = $num + $n;
	    	
	    	//用瓶换酒
	    	$n = intval($p / 2);
	    	//把换的酒 加到 盖 和 瓶 上
	    	$g = $g + $n;
	    	$p = $p + $n - $n*2;
	    	$num = $num + $n;
	    	
	    	//用盖换酒
	    	$n = intval($g / 4);
	    	//把换的酒 加到 盖 和 瓶 上
	    	$g = $g + $n - $n*4;
	    	$p = $p + $n;
	    	$num = $num + $n;
    	}
    	
    	echo $num;
    }
    
    public function jiu2(){
    	$m = 20;//手里有多少钱
    	$count = 0;//喝了多少酒
    	
    	while ($m > 3){//手里的钱大于3
			//钱能买多少酒
    		$n = intval($m / 4);
    		//计算还剩多少钱 公式 原金额 - 花费 + 盖 + 瓶
    		$m = $m - $n*4 + $n*1 + $n*2;
    		//累加 喝了多少酒
    		$count = $count + $n;
    		
    	}
    	
    	echo $count;
    }
    
    //第八天日考
    public function day8(){
    	$n = 10;//有多少个人
    	$m = 5;//循环多少次
    	$arr = [];//个数 序列化为 数组
    	$arr2 = [];//记录出局顺序
    	$x = -1;
    	
//     	$arr = range(0, $n);
//     	print_r($arr);exit;
    	
    	for ($i=0;$i<$n;$i++){
			$arr[] = $i;    		
    	}
    	
    	while (count($arr) != 0){
    		for($i=0;$i<$m;$i++){
				$x++;
				if($x >= $n){
					$x = 0;
				}
    		}
    		$arr2[] = $arr[$x];
    		unset($arr[$x]);
    		$arr = array_values($arr);
    		$n--;$x--;
    	}
    	
    	print_r($arr2);
    	echo $arr2[count($arr2)-1];
    }
    
    //第八日考，递归
    public function huan($data,$m,$x=-1){
    	if(count($data)==1){
    		return $data[0];
    	}
    	
    	for($i=0;$i<$m;$i++){
    		$x++;
    		if($x >= count($data)){
    			$x=0;
    		}
    	}
    	unset($data[$x]);
    	$data = array_values($data);
    	return $this->huan($data,$m,$x-1);
    }
    public function huan_main(){
//     	$data = [0,1,2,3,4,5,6,7,8,9];
//     	$m = 13;
//     	$res = $this->huan($data, $m);
//     	echo $res;
		print_r($this->LastRemaining_Solution(10, 5));
    }
    
    public function LastRemaining_Solution($n,$m){
    	for($i = 0;$i < $n;$i++){
    		$arr[] = $i;
    	}
    	$start = 0;
    	while(true){
    		if(count($arr) == 1){
    			return $arr;
    		}
    		foreach($arr as $key =>$v){
    			if($start == $m-1){
    				echo $arr[$key];
    				echo '<br>';
    				unset($arr[$key]);
    				$start = 0;
    			}else{
    				$start++;
    			}
    		}
    	}
    }
    
    //第9天日考题 
    function day9(){
	    $array = array(321, 3, 34);
	    $len = count($array);
	    for ($i = 1; $i < $len; $i++) {
	    	for ($k = 0; $k < $len - $i; $k++) {
	    		if ($this->compare($array[$k], $array[$k + 1])) {
	    			$tmp = $array[$k + 1];
	    			$array[$k + 1] = $array[$k];
	    			$array[$k] = $tmp;
	    		}
	    	}
	    }
	    $str = "";
	    print_r($array);
	    foreach($array as $value){
	    	$str .= $value;
	    }
	    echo $str;
    }
    //排序方法
    function compare($num1, $num2){
    	$num1 = (string)$num1;
    	$num2 = (string)$num2;
    	$maxLenth = strlen($num1) > strlen($num2) ? strlen($num1) : strlen($num2);
    	for ($index = 0; $index < $maxLenth; $index ++) {
    		if (empty($num2{$index})) {
    			return $num1{$index} > $num1{0} ? 1 : 0;
    		}
    		if (empty($num1{$index})) {
    			return $num2{$index} > $num2{0} ? 0 : 1;
    		}
    		if ($num1{$index} != $num2{$index}) {
    			return $num1{$index} > $num2{$index} ? 1 : 0;
    		}
    	}
    }
    function day9_2(){
    	$res = array('321','32','3');
		$a1 = $a2 = $a3 = array();
		$zh1 = $zh2 = $zh3 = array();
		for($i=0;$i<count($res);$i++)
		{
			$a1 = array(strval($res[$i]));
			array_push($zh1, $a1);//每循环一次，压入一个组合
			for($j=0;$j<count($res);$j++)
			{
				if($i == $j){
					continue;
				}
				$a2 = empty($a2)?array_pop($zh1):$a2;
				$tmp2 = $a2;
				array_push($a2, strval($res[$j]));
				array_push($zh2, $a2);
				$a2 = $tmp2;
				unset($tmp2);
				for($k=0;$k<count($res);$k++)
				{
					if($i == $k || $j == $k){
						continue;
					}
					$a3 = empty($a3)?array_pop($zh2):$a3;
					$tmp3 = $a3;
					array_push($a3, strval($res[$k]));
					array_push($zh3, $a3);
					$a3 = $tmp3;
					unset($tmp3);
				}
				$a3 = array();//清空a3值，进入下一次组合循环
			}
			$a2 = array();//清空a2值，进入下一次组合循环
		}
		$zh = $zh3;
// 		print_r($zh3);exit;
		$str_list=[];
		foreach ($zh as $v){
			$str_list[] = implode('', $v);
		}
		sort($str_list);
		echo array_pop($str_list);
    }
    //测试array_pop函数 执行后原数组的值 和 返回值
    public function text2(){
    	$arr = [1,2,3];
    	
    	$r = array_pop($arr);
    	
    	print_r($arr);
    	print_r($r);
    }
    
    //第二周 模拟周考题
    //1分 2分 5分 组合为一毛 有多少个组合
    public function yimao(){
    	for($one=0;$one<=10;$one++){
    		for($two=0;$two<=5;$two++){
    			for($three=0;$three<=2;$three++){
    				if(($one*1 + $two*2 + $three*5)==10){
    					echo "{$one}个1 - {$two}个2 - {$three}个5<br>";
    				}
    			}
    		}
    	}
    }
    
    public function zhou2_1(){
    	//初始化数据
    	$arr = [1,2,3,4];

    	//调用排列组合
    	$arr = $this->arrangement($arr, 2);
    	//输出结果
    	print_r($arr);
    	
    }
    
    // 排列
	function arrangement($a, $m) {
		//定义结果数组
		$r = array();
	 	
		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}
	 
		for ($i=0; $i<$n; $i++) {
			$b = $a;
			$t = array_splice($b, $i, 1);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$c = $this->arrangement($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}
	 
		return $r;
	}
	 
	// 组合
	function combination($a, $m) {
		$r = array();
	 
		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}
	 
		for ($i=0; $i<$n; $i++) {
			$t = array($a[$i]);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$b = array_slice($a, $i+1);
				$c = $this->combination($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}
	 
		return $r;
	}
	
	function my_dir($dir){
		
	}

    
    //第12单元 日考
    public function day12(){
    	echo $this->leijia(5);
    }
    function leijia($n){
//     	if($n > 1){
//     		return $n + $this->leijia($n-1);
//     	}else{
//     		return 1;
//     	}
		$num = ($n > 1 ? $n + $this->leijia($n-1) : 1);
		return $num;
    }
    
    public function day13_2(){
    	$n = 3;
    	$m = 5;
    	$a = '';
    	for ($i=0;$i<$n;$i++){
    		$a .= 'a'; 
    	}
    	for ($i=0;$i<$m;$i++){
    		$a .= 'a';
    	}
    	
    	echo $a;
    	echo strlen($a);
    }
    
    //第13单元日考
    public function day13(){
		echo $this->cplus(11, 13);
    }
    /*
     * 
     *  13 的二进制      1 1 0 1                     -----a        13
		11 的二进制      1 0 1 1                      -----b        11 
                        
                   
 		(a&b) <<1  ->   1 0 0 1 0             -----d         18
        a^b  ->           0 1 1 0             -----e          6

 		(d&e) <<1  ->   0 0 1 0 0             ------f        4
        d^e  ->  1 0 1 0 0                    -----g        20

 		(f&g) <<1  ->   0 1 0 0 0             ------h        8
        f^g  ->  1 0 0 0 0                    ------i        16

 		(h&i) <<1  ->   0 0 0 0 0             ------h        0       ---- --------退出循环
        h^i  ->  1 1 0 0 0                    ------i        24
     */
    function cplus($num1, $num2) {
    	if ($num2 == 0) {
    		return $num1;
    	}
    		
    	$sum = $num1 ^ $num2;
    	$carry = ($num1 & $num2) << 1;	
    	return $this->cplus($sum, $carry);
	}
    
	//第14日考
	public function day14(){
		$arr = [];
		for ($i=1;$i<=100;$i++){
			$arr[] = $i;
		}
		$res = $this->FindNumbersWithSum($arr, 50);
		print_r($res);
	}
	function FindNumbersWithSum($array, $sum){
		$data = [];
		for ($x=0;$x<count($array);$x++){
			for($y=0;$y<$x;$y++){
				if(($array[$x] + $array[$y])==$sum){
					$data[] = [$array[$x],$array[$y],($array[$x]*$array[$y])];
				}
			}
		}
		foreach ($data as $k=>$v){
			$a[] = $v[2];
		}
		array_multisort($a,SORT_ASC,$data);
		return $data;
	}
	
	//第15日考
	public function day15(){
		$str = 'axabbccdxdeeffggX';
		echo $this->FirstNotRepeatingChar($str);
	}
	function FirstNotRepeatingChar($str){
		$res = -1;
		$arr = str_split($str);
		foreach ($arr as $k=>$v){
			$end = strrpos($str,$v);
			$begin = strpos($str,$v);
			if($end == $begin){
				$res = $k;
				break;
			}
		}
		return $res;
	}
	public function day15_2(){
		$str = 'aabbccydYdeexffgghhii';
		
		$arr = str_split($str);
		foreach ($arr as $k=>$v){
			if(substr_count($str,$v)==1){
				return $k;
			}
		}
	}
	public function day15_3(){
		$str = 'aabbccydYdeexffgghhii';
		$arr = str_split($str);
		$list = array_count_values($arr);
		
		foreach ($list as $k=>$v){
			if($v==1){
				echo $k;
				break;
			}
		}
		
		print_r($list);
	}
	
	//第16日考
	public function day16(){
		$target = 7;
		$array=[[1,2,8,9],[2,4,9,12],[4,7,10,13],[6,8,11,15]];
		
		if($this->Find($target, $array)){
			echo '存在';
		}else{
			echo '不存在';
		}
	}
	function Find($target, $array){
		foreach ($array as $k=>$v){
			foreach ($v as $kk=>$vv){
				//echo 1;
				if($vv == $target){
					return 'aaa';
				}
			}	
		}
		return false;
	}
	function Find2($target, $array){
		$column = count($array);
		$row = count($array[0]);
		
		$r = 0; $c = $column-1;
		while ($r<$row && $c>=0){
			//echo 2;
			if($array[$r][$c] == $target){
				return true;
			}elseif($array[$r][$c] > $target){
				$c--;
			}else{
				$r++;
			}
		}
		return false;
	}
	
	//分苹果的算法 正算
	public function pingguo(){
		$n = 0;
		for ($i = 1; ; $i++)
		{
		    if ($i%5 == 1) 
		    {//第一天
		        
		        $t = $i - round($i/5) - 1;      
		        if($t % 5 == 1)
		        {//第二天
		            
		            $r = $t - round($t/5) - 1;      
		            if($r % 5 == 1)
		            {//第三天
		                
		                $s = $r - round($r/5) - 1;              
		                if($s % 5 == 1)
		                {//第四天
		                    $x = $s - round($s/5) - 1;
		                    if($x % 5 == 1)
		                    {//第五天
		                        $y = $x - round($x/5) - 1;                      
		                        if ($y % 5 == 1) 
		                        {//5人分
		                            echo $i.'<br />';
		                            $n++;
		                            if($n > 3){
		                            break;
		                            }
	                        	}
		                    }
		                }
		            }
		        }
		    }
		}
	}
	
	public function pingguo2(){
		for ($i = 1; ; $i++)
		{
			$x5 = $i*5+1;//5人分 
			$x4 = $x5 * 5 / 4 + 1;//第3天 33
			if(is_int($x4)){
				$x3 = $x4 * 5 / 4 + 1;//第二天 45
				if(is_int($x3)){
					$x2 = $x3 * 5 / 4 + 1;//第一天  61
					if(is_int($x2)){
						$x1 = $x2 * 5 / 4 + 1;
						if(is_int($x1)){
							$x = $x1 * 5 / 4 + 1;
							if(is_int($x)){
								echo $i.'|';
								echo $x;
								break;
							}
						}
					}
				}
			}
		}
	}
	
	//第18日考题
	public function day18(){
		$num = 10;
		$arr = [];
		
		while ($num >= 1){
			$arr[] = $num % 2;
			$num = intval($num /2);
		}
		
		$arr = array_reverse($arr);

		$arr = array_count_values($arr);
		print_r($arr[1]);
	}
	public function day18_2(){
		$num = 10;
		$er = decbin($num);
		echo substr_count($er,'1');
	}
	
	//第19天
	public function day19(){
		$arr = array(1,2,4,6,10,40,50,80,100,110);
		//echo $this->bin_search($arr,110);
		
		echo $this->bin_search2($arr, 100, 0, count($arr));
	}	
	/**
	 * 二分查找 非递归
	 * @param Array $arr 待查找的数组
	 * @param Int $key 要查找的关键字
	 * @return Int
	 */
	function bin_search(Array $arr,$key)
	{
		$high = count($arr);
		if($high <= 0)
			return -1;
		$low = 0;
		while($low < $high)
		{
			//当前查找区间arr[low..high]非空
			$mid=intval(($low + $high) / 2);
			if($arr[$mid] == $key)
				return $mid; //查找成功返回
			if($arr[$mid] > $key)
				$high = $mid - 1; //继续在arr[low..mid-1]中查找
			else
				$low = $mid + 1; //继续在arr[mid+1..high]中查找
		}
		return -1; //当low>high时表示查找区间为空，查找失败
	}
	//递归 2分
	function bin_search2(array $arr,$key,$begin,$end){
		if($end <= 0)
			return -1;
		$mid=intval(($begin + $end) / 2);
		if($arr[$mid] == $key)
			return $mid; //查找成功返回
		if($arr[$mid] > $key)
			return $this->bin_search2($arr, $key, $begin, $mid - 1); //继续在arr[low..mid-1]中查找
		else
			return $this->bin_search2($arr, $key, $mid + 1, $end); //继续在arr[mid+1..high]中查找
	}
	
	public function day19_test(){
		$a = 10;
		$a ^= (1<<4)-1;//第一步
// 		$a ^= 16-1;//第二步
// 		$a ^= 15;//第三步 
// 		$a = $a ^ 15;//第四步
		return $a;
	} 
	
	//第20天日考
	public function day20(){
		echo $this->day20_2(10, 10).'<br>';
		$this->day20_1(10, 10);
	}
	//非递归
	public function day20_1($x,$y){
		for($i = 0; $i <= $x; $i++){
			$f[$i][0] = 1;
		}
		for($i = 0; $i <= $y; $i++ ){
			$f[0][$i] = 1;
		}
// 		print_r($f);exit;
		for($i = 1; $i <= $x; $i++){
			for($j = 1; $j <= $y; $j++){
				$f[$i][$j] = $f[$i-1][$j] + $f[$i][$j-1];
			}
		}
		
		print_r($f[$x][$y]);
	}
	//递归
	public function day20_2($x,$y){
		if($x==0 && $y==0)
			return 0;
		if ($x == 0 || $y == 0)
			return 1;
		$total = $this->day20_2($x - 1, $y) + $this->day20_2($x, $y - 1);
		return $total;
	}
	
	//杨辉三角
	public function sanjiao(){
		$n=20;
		for($i=0;$i<$n;$i++){
			for($j=0;$j<=$i;$j++){
				if($j==0||$i==$j){
					$arr[$i][$j]=1;
				}else {
					$arr[$i][$j]=$arr[$i-1][$j]+$arr[$i-1][$j-1];
				}
				echo $arr[$i][$j]."\t";
			}
			echo "<br>";
		}
	}
	
	/**
	 * 18只动物 118只腿 20对翅膀  蜘蛛 蝉 蜻蜓
	 */
	public function dongwu(){
		$n = 0;
		for($x=0;$x<18;$x++){
			for($y=0;$y<18;$y++){
				for($z=0;$z<18;$z++){
					$n++;
					if($x+$y+$z == 18){
						if($x*8+$y*6+$z*6 == 118){
							if( $y*2 + $z == 20){
								echo '蜘蛛:'.$x.'蜻蜓:'.$y.'蝉:'.$z;
							}
						}
					}
				}
			}
		}
		echo '<br />'.$n;
		
	}
	
	public function dongwu2(){
		$n = 0;
		for($x=1;$x<18;$x++){
			for($y=1;$y<18;$y++){
				for($z=1;$z<18;$z++){
					$n++;
					if($x+$y+$z == 18){
						if($x*8+$y*6+$z*6 == 118){
							if( $y*2 + $z == 20){
								echo '蜘蛛:'.$x.'蜻蜓:'.$y.'蝉:'.$z;
							}
						}
					}
				}
			}
		}
		echo '<br />'.$n;
		
	}
	
	public function dongwu3(){
		$n = 0;
		for($x=1;$x<=18;$x++){
			for($y=1;$x+$y<=18;$y++){
				for($z=1;$x+$y+$z<=18;$z++){
					$n++;
					if($x+$y+$z == 18){
						if($x*8+$y*6+$z*6 == 118){
							if( $y*2 + $z == 20){
								echo '蜘蛛:'.$x.'蜻蜓:'.$y.'蝉:'.$z;
							}
						}
					}
				}
			}
		}
		echo '<br />'.$n;
	
	}
	
	public function jiami(){
		$str = 'bC2Y';
		
		$arr = str_split($str, 1);
		
		foreach ($arr as $k => $v){
			if($v < 'y' && $v >= 'a'){
				$arr[$k] = ++$arr[$k];
				$arr[$k] = ++$arr[$k];
			}else if($v == 'y'){
				$arr[$k] = 'a';
			}else if($v == 'z'){
				$arr[$k] = 'b';
			}
			
			if($v < 'Y' && $v >= 'A'){
				$arr[$k] = ++$arr[$k];
				$arr[$k] = ++$arr[$k];
			}else if($v == 'Y'){
				$arr[$k] = 'A';
			}else if($v == 'Z'){
				$arr[$k] = 'B';
			}
			
			if($v >= '0' && $v < '9'){
				$arr[$k] = ++$arr[$k];
				$arr[$k] = ++$arr[$k];
			}else if($v == '9'){
				$arr[$k] = '0';
			}
			
		}
		
		print_r($arr);
		
	}
	
	public function jiami2(){
		$str = 'bC2Y';
		
		$arr = str_split($str, 1);
		
		foreach ($arr as $k => $v){
			if($v == 'y'){
				$arr[$k] = 'a';
			}else if($v == 'z'){
				$arr[$k] = 'b';
			}else if($v == 'Y'){
				$arr[$k] = 'A';
			}else if($v == 'Z'){
				$arr[$k] = 'B';
			}else if($v == '9'){
				$arr[$k] = '0';
			}else{
				$arr[$k] = ++$arr[$k];
				$arr[$k] = ++$arr[$k];
			}
		}
		
		print_r($arr);
	}
	
	/**
	 * 100个球 红40 白30 黄30 取50个
	 */
	public function qiu(){
		
		for($x=0;$x<40;$x++){
			for($y=0;$y<30;$y++){
				for($z=0;$z<30;$z++){
					if($x+$y+$z == 50){
						echo '红球'.$x.'|黄球'.$y.'|白球'.$z;
					}
				}
			}
		}
		
	}
	
	public function arr_1(){
		$arr = ['a',1,'b',2];
		$list = [];
		for($i=0;$i<count($arr);$i=$i+2){
			$list[$arr[$i]] = $arr[$i+1];
		}
		print_r($list);
	}
	
}
