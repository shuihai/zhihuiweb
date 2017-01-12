<?php
namespace Common\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel{
    //自动验证
    protected $_validate=array(
        array('username','','用户名称已经存在！',0,'unique',3), // 新增修改时候验证username字段是否唯一
    );
    // 获取所有用户信息
    public function getAllUser($where = '' , $order = 'id  ASC', $limit='') {
        return $this->where($where)->order($order)->limit($limit)->select();
    }
    // 获取单个用户信息
    public function getUser($where = '',$field = '*') {
        return $this->field($field)->where($where)->find();
    }
    // 获取单个用户名称
    public function getUsername($id) {
        return $this->where(array('id'=>$id))->getField('nickname');
    }
    // 获取单个用户电话
    public function getUserphone($id) {
        return $this->where(array('id'=>$id))->getField('phone');
    }
    // 获取单个用户邮箱
    public function getUseremail($id) {
        return $this->where(array('id'=>$id))->getField('email');
    }
    //获得用户信息
    public function getUserinfo($id){
        return $this->field('password',true)->find($id);
    }
    // 删除用户
    public function delUser($where) {
        if($where){
            return $this->where($where)->delete();
        }else{
            return false;
        }
    }
    // 更新用户
    public function upUser($data) {
        if($data){
            return $this->save($data);
        }else{
            return false;
        }
    }
    // 更新用户
    public function checkName($username,$user_id=0){
        if($user_id){   //编辑时查询
            $map['id']  = array('neq',$user_id);
            $map['username']  = array('eq',$username);
        }else{  // 新增是查询
            $map['username']  = array('eq',$username);
        }
        return $this->where($map)->find();
    }
    //检查邮箱
    public function checkEmail($email){
        return $this->where(array('email'=>$email))->getField('email');
    }
    //检查用户名
    public function checkUsername($username){
        return $this->where(array('username'=>$username))->getField('username');
    }
    //检查手机
    public function checkPhone($phone){
        return $this->where(array('phone'=>$phone))->getField('phone');
    }
    //检查身份证号
    public function checkIdcard($idcard){
        return $this->where(array('idcard'=>$idcard))->getField('idcard');
    }
    /**
     * 登录指定用户
     * @param  integer $uid 用户ID
     * @return boolean      ture-登录成功，false-登录失败
     */
    public function login($uid){
        /* 检测是否在当前应用注册 */
        $user = $this->field(true)->find($uid);
        if(!$user || 1 != $user['status']) {
            $this->error = '用户不存在或已被禁用！'; //应用级别禁用
            return false;
        }
        /* 登录用户 */
        $this->autoLogin($user);
        return true;
    }
    /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }
    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'uid'             => $user['uid'],
            'login'           => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip'   => get_client_ip(1),
        );
        $this->save($data);
        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'uid'             => $user['uid'],
            'username'        => $user['nickname'],
            'last_login_time' => $user['last_login_time'],
        );
        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
    }
}