<?php
namespace Home\Controller;
use Think\Controller;
/*
   权限控制，用于判断用户是否登录 
*/
class UserCommonController extends Controller{
    Public function _initialize(){     //前置操作
    // 初始化的时候检查用户权限
        if(!isset($_SESSION['num']) || $_SESSION['num'] == ''){
            redirect('../Login/login');
        }
    }
}
?>