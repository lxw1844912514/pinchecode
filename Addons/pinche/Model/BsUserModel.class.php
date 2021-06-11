<?php

/**
 *User: lxw
 *Date: 2021-04-08
 */

namespace Addons\pinche\Model;

use Think\Model;

class BsUserModel extends Model
{
    protected $_validate = array(
        array('name', 'require', '用户名不能为空', 1, 'regex', 3),
        array('name', '', '用户已存在', 2, 'unique', 1),
//        array('name', '6,20', '用户名长度在6至20个字符之间', 3, 'length', 1),
        array('password', 'require', '密码不能为空', 1, 'regex', 1),
        array('password', '6,20', '密码长度在6至20个字符之间', 2, 'length', 1),
        array('phonenum', 'number', '电话必须是数字',)
    );
    protected $_auto = array(
        array('password', 'md5', 3, 'function'),
        array('name', 'name', 1, 'field'),
        array('created_at', 'time', 1, 'function')
    );

    /**
     * 验证登录
     * @author 艾逗笔<765532665@qq.com>
     */
    public function check_login($username, $password)
    {
        if (empty($username) || empty($password)) {
            return false;
        }
        $map['name'] = $username;
        $map['password'] = md5($password);
        $user = M('bs_user')->where($map)->find();
        if (empty($user)) {
            return false;
        }
        return $user;
    }

    /**
     * 自动登录
     * @author 艾逗笔<765532665@qq.com>
     */
    public function auto_login($username, $password)
    {
        $user = $this->check_login($username, $password);
        if (!$user) {
            return false;
        }
        //写入session
        session('user_info_client', $user);
        session('username_client', $user['name']);
        session('contact', $user['phonenum']);
        return true;
    }

    /**
     * 退出登录
     * @author 艾逗笔<765532665@qq.com>
     */
    public function login_out()
    {
        if (!is_user_login()) {
            return false;
        }
        session('user_info_client', null);
        session('username_client', null);
        return true;
    }

    /**
     * 检测用户是否存在
     * @author 艾逗笔<765532665@qq.com>
     */
    public function is_user_exists($username)
    {
        if (empty($username)) {
            return false;
        }
        $map['name'] = $username;
        $user = M('bs_user')->where($map)->find();
        if (empty($user)) {
            return false;
        }
        return true;
    }
}