<?php
namespace app\controllers;

use yii\web\Controller;

class SmpController extends Controller{
    function actionIndex(){
        $m=1;
        $n=10;
        $res=$this->calfn($m,$n);
        echo $res;
    }
    function calfn($m,$n){
        $arr=range($m,$n);
        $str=implode($arr);
        $num=substr_count($str,'1');
        return $num;
    }
}
