<?php
namespace Admin\Controller;
class UserController extends AdminController {
    public function _initialize() {
        parent::_initialize();
    }
    //后台用户
    public function index(){
        $this->role = M('Role')->getField('id,name');
        $map['role'] = array('neq',0);
        $d = D('User');
        $count      = $d->where($map)->count();
        $Page       = new \Common\Extend\Page($count);
        $nowPage    = isset($_GET['p'])?$_GET['p']:1;
        $this->show = $Page->show();
        $this->list = $d->where($map)->order('id asc')->page($nowPage.','.$Page->listRows)->select();
        $this->display();
    }
    public function add(){
        $d = D("User");
        if(IS_POST) {
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            if(empty($password) || empty($repassword)) exit($this->error('密码必须'));
            if($password != $repassword) exit($this->error('两次输入密码不一致'));
            if($data = $d->create()){
                $data['reg_time'] = NOW_TIME;
                $data['password']=ez_encrypt($data['password']);
                if($id = $d->add($data)){
                    M("RoleUser")->data(array('user_id'=>$id,'role_id'=>I('post.role')))->add() ? $this->success('添加成功',U('Admin/User/index')) : $this->error('用户添加成功,但角色对应关系添加失败');
                }else{
                     $this->error('添加失败');
                }
            }else{
                $this->error($UserDB->getError());
            }
        }else{
            $this->role = D('Role')->getAllRole(array('status'=>1),'sort desc');
            $this->display();
        }
    }
    public function edit(){
        $d = D("User");
        if(IS_POST) {
            if($data = $d->create()){
                if($data['password']){
                    $data['password']=ez_encrypt($data['password']);
                }else{
                    unset($data['password']);
                }
                $image=new \Common\Extend\Image();
                if($_FILES['avatar']['size']>0){
                    $img            = $image->upload($_FILES['avatar'],filePath($data['id'],'user'),'thumb2');
                    $data['avatar'] = $img['origin_'];
                }else{
                    unset($data['avatar']);
                }
                if($d->save($data)){
                    $this->success('修改成功',U('Admin/User/index'));
                }else{
                    $this->error('修改失败!');
                }
            }else{
                $this->error($d->getError());
            }
        }else{
            $this->role = D('Role')->getAllRole(array('status'=>1),'sort desc');
            $this->row = $d->getUser(array('id'=>I('get.id')));
            $this->display();
        }
    }
    public function del(){
        global $user;
        //为了统一这么写，项目需求不一样  如果需要批量删除 请复制其他模块的删除代码
        $id=I('post.ids');
        if(!$id)$this->error('参数错误!');
        $d = D('User');
        $info = $d->getUser(array('id'=>$id));
        if($info['username']==C('SPECIAL_USER')){     //无视系统权限的那个用户不能删除
           $this->error('禁止删除此用户!');
        }
        if($d->delUser(array('id'=>$id))){
            action_log('del_home_user','User',$user['id'],$id);
            $this->success('删除成功！');
        }else{
            $this->error('删除失败!');
        }
    }
    //前台用户
    public function customer(){
        $map['role'] = 0;
        if($_GET['keywords']) $map['nickname']=array('like','%'.$_GET['keywords'].'%');
        if(is_numeric($_GET['status'])) $map['status']=I('get.status');
        $d = D('User');
        $count = $d->where($map)->count();
        $Page    = new \Common\Extend\Page($count,10);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $this->show = $Page->show();
        $this->list = $d->where($map)->order('id desc')->page($nowPage.','.$Page->listRows)->select();
        $this->display();
    }
    public function customerEdit(){
        $d = D('User');
        if(IS_POST) {
            if($data = $d->create()){
                if($data['password']){
                    $data['password']=ez_encrypt($data['password']);
                }else{
                    unset($data['password']);
                }
                $image=new \Common\Extend\Image();
                if($_FILES['avatar']['size']>0){
                    $img            = $image->upload($_FILES['avatar'],filePath($data['id'],'user'),'thumb2');
                    $data['avatar'] = $img['origin_'];
                }else{
                    unset($data['avatar']);
                }
                if($d->save($data)){
                    $this->success('修改成功',U('Admin/User/customer'));
                }else{
                    $this->error('修改失败!');
                }
            }else{
                $this->error($d->getError());
            }
        }else{
            $this->row = $d->getUser(array('id'=>I('get.id')));
            $this->display();
        }
    }
    public function customerDel()
    {
        $ids=I('post.ids');
        D('User')->where(
            array(
                'id'=>is_array($ids) ? array('in',implode(',', $ids)) : $ids,
            )
        )->delete() ? $this->success('删除成功') : $this->error('删除失败');
    }
    /* -----------------------------------角色部分--------------------------------------------- */
    public function role(){
        $d = D('Role');
        $this->list = $d->getAllRole();
        $this->display();
    }
    public function roleAdd(){
        $d = D("Role");
        if(IS_POST) {
            if($d->create()){
                $d->add() ? $this->success('添加成功',U('Admin/User/role')) :  $this->error('添加失败');
            }else{
                $this->error($d->getError());
            }
        }else{
            $this->display();
        }
    }
    public function roleEdit(){
         $d = D("Role");
        if(IS_POST) {
            if($d->create()){
                $d->save() ? $this->success('修改成功',U('Admin/User/role')) : $this->error('修改失败');
            }else{
                $this->error($d->getError());
            }
        }else{
            $this->row = $d->getRole(array('id'=>I('get.id')));
            $this->display();
        }
    }
    public function roleDel(){
        in_array(I('get.id'), explode(',', C('SYSTEM_ROLE'))) ? exit($this->error('删除失败')) : null;
        D('Role')->delRole(array('id'=>I('get.id'))) ? $this->success('删除成功',U('Admin/User/role')) : $this->error('删除失败');
    }
    public function roleSort(){
        $sorts = I('post.sort');
        if(!is_array($sorts))$this->error('参数错误!');
        foreach ($sorts as $id => $sort) {
            D('Role')->upRole( array('id' =>$id , 'sort' =>intval($sort) ) );
        }
        $this->success('更新完成',U('Admin/User/role'));
    }
    //登陆
    public function login() {
        if(session('admin_user')) exit($this->redirect('Index/index'));
        if(IS_POST){
            $username = I('post.username');
            $password = I('post.password');
            $verify   = I('post.verify');
            if (empty($username)) {
                $this->error('用户名不能为空');
            }elseif(empty($password)) {
                $this->error('密码不能为空');
            }elseif(empty($verify)){
                $this->error('验证码不正确');
            }
            //生成认证条件
            $map            =   array();
            // 支持使用绑定帐号登录
            $map['username'] = $username;
            $map['status']        = 1;
            if(session('verify') != md5($verify)) $this->error('验证码错误',U('index'));
            $_RBAC=new \Common\Extend\RBAC();
            $authInfo = $_RBAC::authenticate($map);
            //使用用户名、密码和状态的方式进行认证
            if(false == $authInfo) {
                $this->error('帐号不存在或已禁用');
            }else {
                if($authInfo['password'] != ez_encrypt($password)) {
                    exit($this->error('密码错误',U('index')));
                }
                session(C('USER_AUTH_KEY'), $authInfo['id']);
                session('userid',$authInfo['id']);  //用户ID
                session('username',$authInfo['username']);   //用户名
                session('roleid',$authInfo['role']);    //角色ID
                unset($authInfo['password']);
                session('admin_user',$authInfo);
                if($authInfo['username']==C('SPECIAL_USER')) {
                    session(C('ADMIN_AUTH_KEY'), true);
                }
                $_RBAC::saveAccessList();
                $this->success('登陆成功');
            }
        }else{
            $this->display();
        }
    }
    // 退出
    public function logout() {
        session(null);
        $this->redirect('login');
    }
    /* -----------------权限设置部分----------------------- */
    public function access(){
        $roleid=I('get.roleid');
        $Tree =new \Common\Extend\Tree();
        $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $NodeDB = D('Node');
        $node = $NodeDB->getAllNode();
        $AccessDB = D('Access');
        $access = $AccessDB->getAllAccess('','role_id,node_id,pid,level');
        foreach ($node as $n=>$t) {
            $node[$n]['checked'] = ($AccessDB->is_checked($t,$roleid,$access))? ' checked' : '';
            $node[$n]['depth'] = $AccessDB->get_level($t['id'],$node);
            $node[$n]['pid_node'] = ($t['pid'])? ' class="tr lt child-of-node-'.$t['pid'].'"' : '';
        }
        $str  = "<tr id='node-\$id' \$pid_node>
        <td style='padding-left:30px;'>\$spacer<input type='checkbox' name='nodeid[]' value='\$id' id='_node_\$id' class='radio' level='\$depth' \$checked onclick='javascript:checknode(this);' ><label for='_node_\$id'>&nbsp; \$title (\$name)</label></td>
                </tr>";
        $Tree->init($node);
        $html_tree = $Tree->get_tree(0, $str);
        $this->assign('html_tree',$html_tree);
        $this->display();
    }
    public function accessEdit(){
        $roleid = I('roleid','intval',0);
        $nodeid = I('nodeid');
        if(!$roleid) $this->error('参数错误!');
        $AccessDB = D('Access');
        if (is_array($nodeid) && count($nodeid) > 0) {  //提交得有数据，则修改原权限配置
            $AccessDB -> delAccess(array('role_id'=>$roleid));  //先删除原用户组的权限配置
            $NodeDB = D('Node');
            $node = $NodeDB->getAllNode();
            foreach ($node as $_v) $node[$_v[id]] = $_v;
            foreach($nodeid as $k => $node_id){
                $data[$k] = $AccessDB -> get_nodeinfo($node_id,$node);
                $data[$k]['role_id'] = $roleid;
            }
            $AccessDB->addAll($data);   // 重新创建角色的权限配置
        } else {    //提交的数据为空，则删除权限配置
            $AccessDB -> delAccess(array('role_id'=>$roleid));
        }
        $this->success('设置成功',U('Admin/User/access',array('roleid'=>$roleid)));
    }
    public function actionIndex(){
        $d =D('Action');
        $map=array();
        $_GET['tid']?$map['tid']=$_GET['tid']:null;
        import("@.Extend.Page");                //导入分页类 
        $count = $d->where($map)->count();      //计算总数 
        $p = new \Common\Extend\Page($count,30); 
        $list = $d->where($map)->order('id desc')->select();
        $show = $p->show();                      
        $this->assign("show", $show);           //分类输出
        $this->assign("list", $list);           //数据循环变量
        $this->display();
    }
    public function actionAdd(){
        if(IS_POST){
            $d =D('Action');
            $d->create();
            $d->add()?$this->success('添加成功',U('Admin/User/actionIndex')):$this->error('添加失败',U('Admin/User/actionIndex'));
        }else{
            $this->display();
        }
    }
    public function actionEdit(){
        if(IS_POST){
            $d =D('Action');
            $d->create();
            $d->id=I('post.id');
            $d->save() ? $this->success('修改成功',U('Admin/User/actionIndex')):$this->error('修改失败',U('Admin/User/actionIndex'));
        }else{
            $this->row=D('Action')->where('id='.$_GET['id'])->find();
            $this->display();
        }
    }
}