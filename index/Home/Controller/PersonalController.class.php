<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
//用户个人信息相关类
class PersonalController extends UserCommonController {
	public function index(){
		$this->display('personal');
	}
	//显示用户相关信息
	public function userInfo(){
		$num = $_SESSION['num'];
		$user = M('User');
        $userInfo = $user->where("u_id=$num")->select();
        if(!empty($userInfo)){
            $res = array(
                'code' => '0',
                'msg' => $userInfo,
            );
            return $this->ajaxReturn($res);
        } else {
            $res = array(
                'code' => '-1',
                'msg' => '个人信息展示有误！',
            );
            return $this->ajaxReturn($res);
        }
	}

	//接受修改用户信息 
	public function fixUserInfo(){
		$num = $_SESSION['num'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$place = $_POST['place'];
		$telphone = $_POST['telphone'];
		if(empty($name)||empty($email)||empty($place)||empty($telphone)){
			$res = array(
                'code' => '-1',
                'msg' => '参数传递出错',
            );
            return $this->ajaxReturn($res);
		}
		$data = array(
			'u_name' => $name,
			'u_email' => $email,
			'u_place' => $place,
			'u_telphone' => $telphone,
		);
		$result = M('User')->where("u_id=$num")->setField($data);
		if($result!=false){
			$res = array(
                'code' => '0',
                'msg' => '修改用户信息成功!',
            );
            return $this->ajaxReturn($res);
		} else {
			$res = array(
                'code' => '-1',
                'msg' => '修改用户失败!',
            );
            return $this->ajaxReturn($res);
		}
	}
	//该用户发布的所有商品
	public function oldPublishGoods(){
		$num = $_SESSION['num'];
		$goodsInfo = M('Goods')->where("u_id=$num")->order('g_id desc')->select();
		if(empty($goodsInfo)){
			$res = array(
                'code' => '-1',
                'msg' => '你还未发布任何商品哦',
            );
            return $this->ajaxReturn($res);
		}
		$res = array(
            'code' => '0',
            'msg' => $goodsInfo,
        );
        return $this->ajaxReturn($res);
	}
	//下架商品
	public function exitGoods(){
		$id = $_GET['id'];//商品id
		if(empty($id)){
			$res = array(
                'code' => '-1',
                'msg' => '参数传递出错！',
            );
            return $this->ajaxReturn($res);
		}
		$result = M('Goods')->where("g_id=$id")->setField('g_status','-1');
		if($result!=false)
		{
			$res = array(
                'code' => '0',
                'msg' => '下架商品成功!',
            );
            return $this->ajaxReturn($res);

		} else {
			$res = array(
                'code' => '-1',
                'msg' => '下架商品失败!',
            );
            return $this->ajaxReturn($res);
		}
	}
	public function publishGoods(){//发布商品
		$data = array(
			'u_id' => $_SESSION['num'],
			'g_name' => $_POST['name'],
			'g_construct' => $_POST['construct'],
			'g_type' => $_POST['type'],
			'g_price' => $_POST['price'],
			'g_time' => date("Y-m-d H:i:s"),
			'g_picture' => ,
		);
	}
	public function publishGoodsPicture(){

	}

}