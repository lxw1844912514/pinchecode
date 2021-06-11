<?php

namespace Admin\Controller;

use Think\Controller;

/**
 * 乘客控制器
 * @author 艾逗笔<765532665@qq.com>
 */
class PassengerController extends BaseController
{

    /**
     * 添加用户
     * @author 艾逗笔<765532665@qq.com>
     */
    public function add()
    {
        if (IS_POST) {
            $_validate = array(
                array('name', 'require', '用户名不能为空', 1, 'regex', 3),
                array('name', '', '用户已存在', 2, 'unique', 1),
                array('name', '6,20', '用户名长度在6至20个字符之间', 2, 'length', 1),
                array('password', 'require', '密码不能为空', 1, 'regex', 1),
                array('password', '6,20', '密码长度在6至20个字符之间', 2, 'length', 1),
                array('confirm_password', 'require', '确认密码不能为空', 0, 'regex', 1),
                array('confirm_password', 'password', '确认密码不正确', 0, 'confirm', 1),
                array('email', 'require', '邮箱不能为空', 1, 'regex', 3),
                array('email', 'email', '邮箱格式不正确', 2, 'regex', 3),
                array('email', '', '邮箱已存在', 2, 'unique', 1)
            );
            $_auto = array(
                array('password', 'md5', 3, 'function'),
                array('name', 'name', 1, 'field'),
                array('created_at', 'time', 1, 'function')
            );
            $User = M('user');
            $User->setProperty('_validate', $_validate);
            $User->setProperty('_auto', $_auto);
            if (!$User->create()) {
                $this->error($User->getError());
            } else {
                $user_id = $User->add();
                if ($user_id) {
                    foreach (I('roles') as $k => $v) {
                        $data['user_id'] = $user_id;
                        $data['role_id'] = $v;
                        $datas[] = $data;
                    }
                    M('rbac_role_user')->addAll($datas);
                    $this->success('添加用户成功', U('lists'));
                } else {
                    $this->error('添加用户失败');
                }
            }
        } else {
            $this->addCrumb('系统管理', U('Index/index'), '')
                ->addCrumb('用户管理', U('User/lists'), '')
                ->addCrumb('添加用户', '', 'active')
                ->addNav('添加用户', '', 'active')
                ->setModel('user')
                ->addFormField('username', '用户名', 'text', '')
                ->addFormField('password', '密码', 'password', '')
                ->addFormField('confirm_password', '确认密码', 'password', '')
                ->addFormField('email', '邮箱', 'email', '')
                ->addFormField('roles', '用户角色', 'checkbox', array('options' => 'callback', 'callback_name' => 'get_user_roles'))
                ->common_add();
        }
    }

    /**
     * 编辑用户
     * @author 艾逗笔<765532665@qq.com>
     */
    public function edit()
    {
        if (IS_POST) {
            if (I('password')) {
                $password = I('password');
                $confirm_password = I('confirm_password');
                if (strlen($password) < 6 || strlen($password) > 20) {
                    $this->error('密码长度在6至20个字符之间');
                }
                if (!$confirm_password) {
                    $this->error('确认密码不能为空');
                }
                if ($password !== $confirm_password) {
                    $this->error('确认密码不正确');
                }
                $data['password'] = md5($password);
            }
            $_validate[] = array('email', 'require', '邮箱不能为空', 1, 'regex', 3);
            $_validate[] = array('email', 'email', '邮箱格式不正确', 2, 'regex', 3);

            $User = M('bs_user');
            $User->setProperty('_validate', $_validate);
            $User->setProperty('_auto', $_auto);

            $data['name'] = I('name');
            $data['email'] = I('email');
            $data['phonenum'] = I('phonenum');
            $data['id'] = I('get.id');
            C('TOKEN_ON', false);
//            var_dump($data['name']);die;
            if (!$User->create($data)) {
                $this->error($User->getError());
            } else {
                $User->save($data);
            }
            $this->success('修改乘客信息成功', U('lists'));
        } else {
            $user = M('bs_user')->find(I('id'));
            $this->addCrumb('系统管理', U('Index/index'), '')
                ->addCrumb('乘客管理', U('passenger/lists'), '')
                ->addCrumb('编辑乘客', '', 'active')
                ->addNav('编辑乘客', '', 'active')
                ->setModel('user')
//                ->addFormField('name', '用户名', 'text', array('attr' => 'disabled'))
                ->addFormField('name', '昵称', 'text', '')
                ->addFormField('phonenum', '电话', 'text', '')
                ->addFormField('password', '新密码', 'password', array('tip' => '如果不修改密码请勿填写'))
                ->addFormField('confirm_password', '确认密码', 'password', '')
                ->addFormField('email', '邮箱', 'email', '')
                ->addFormField('roles', '用户角色', 'checkbox', array('options' => 'callback', 'callback_name' => 'get_user_roles'))
                ->setFormData($user)
                ->common_edit();
        }
    }

    /**
     * 乘客列表
     * User: lxw
     * Date: 2021-04-12 21:57
     */
    public function lists()
    {
        $passengers = M('bs_user')->where(array('type' => 1, 'status' => 1))->select();
        $this->addCrumb('系统管理', U('Index/index'), '')
            ->addCrumb('乘客管理', U('User/lists'), '')
            ->addCrumb('乘客列表', '', 'active')
            ->addNav('乘客列表', '', 'active')
            // ->addButton('添加用户', U('add'), 'btn btn-primary', '')
            ->addListItem('id', 'ID', '', '')
            ->addListItem('name', '用户名', '', '')
            ->addListItem('phonenum', '电话', '', '')
            ->addListItem('gender', '性别', 'enum', array('options' => array(0 => '未知', 1 => '男', 2 => '女')))
            ->addListItem('type', '用户角色', 'enum', array('options' => array(0 => "未知", 1 => '乘客', 2 => '司机')))
//            ->addListItem('id', '用户角色', 'callback', array('callback_name' => 'roles'))
            ->addListItem('created_at', '注册时间', 'function', array('function_name' => 'date', 'params' => 'Y-m-d H:i:s,###'))
            ->addListItem('status', '状态', 'enum', array('options' => array(0 => '禁用', 1 => '正常')))
            ->addListItem('id', '操作', 'custom', array('options' => array(
                'addblack' => array('加入黑名单', U('addblack', array('id' => '{id}')), 'btn btn-warning btn-sm icon-add', ''),
                'edit' => array('编辑', U('edit', array('id' => '{id}')), 'btn btn-primary btn-sm icon-edit', ''),
                'delete' => array('删除', U('delete', array('id' => '{id}')), 'btn btn-danger btn-sm icon-delete', ''))))
            ->setListPer(20)
            ->setListData($passengers)
            ->common_lists();
    }

    /**
     * 删除用户
     * @author 艾逗笔<765532665@qq.com>
     */
    public function delete()
    {
        $user_id = I('id');
        $res = M('bs_user')->delete($user_id);
        if (!$res) {
            $this->error('删除用户失败');
        } else {
            $this->success('删除用户成功', U('lists'));
        }
    }

    /**
     * 加入黑名单
     * User: lxw
     * Date: 2021-04-12 22:49
     */
    public function addblack($id)
    {
       $res= M('bs_user')->where(array('id'=>$id))->save(['status'=>0,'updated_at'=>time()]);
        if (!$res) {
            $this->error('加入黑名单失败');
        } else {
            $this->success('加入黑名单成功', U('lists'));
        }
    }

    /**
     * 获取用户角色
     * @author 艾逗笔<765532665@qq.com>
     */
    public function get_user_roles()
    {
        $results = M('rbac_role')->select();
        foreach ($results as $k => $v) {
            $roles[$v['id']] = $v['name'];
        }
        return $roles;
    }

    /**
     * 格式化显示用户所属角色
     * @author 艾逗笔<765532665@qq.com>
     */
    public function parse_roles($user_id)
    {
        $role_users = M('rbac_role_user')->field('role_id')->where(array('user_id' => $user_id))->select();
        foreach ($role_users as $k => $v) {
            $role = M('rbac_role')->where(array('id' => $v['role_id']))->getField('name');
            $roles[] = $role;
        }
        return implode(',', $roles);
    }

    /**
     * User: lxw
     * Date: 2021-04-12 22:00
     */
    public function roles($userId)
    {
        $role = M('bs_user')->field('type')->where(array('id' => $userId))->find();
        return ($role == 1) ? '乘客' : '司机';
    }

}


?>