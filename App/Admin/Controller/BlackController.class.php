<?php

/**
 *User: lxw
 *Date: 2021-04-12
 */

namespace Admin\Controller;


class BlackController extends BaseController
{
    /**
     * 黑名单列表
     * User: lxw
     * Date: 2021-04-12 22:56
     */
    public function lists()
    {
        $passengers = M('bs_user')->where(array('status' => 0))->select();
        $this->addCrumb('系统管理', U('Index/index'), '')
            ->addCrumb('用户管理', U('User/lists'), '')
            ->addCrumb('黑名单列表', '', 'active')
            ->addNav('黑名单列表', '', 'active')
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
                'removeblack' => array('移出黑名单', U('removeblack', array('id' => '{id}')), 'btn btn-info btn-sm icon-add', ''),
                'edit' => array('编辑', U('edit', array('id' => '{id}')), 'btn btn-primary btn-sm icon-edit', ''),
                'delete' => array('删除', U('delete', array('id' => '{id}')), 'btn btn-danger btn-sm icon-delete', ''))))
            ->setListPer(20)
            ->setListData($passengers)
            ->common_lists();
    }

    /**移出黑名单
     * User: lxw
     * Date: 2021-04-12 23:00
     */
    public function removeblack($id)
    {

        $res= M('bs_user')->where(array('id'=>$id))->save(['status'=>1,'updated_at'=>time()]);
        if (!$res) {
            $this->error('移出黑名单');
        } else {
            $this->success('移出黑名单', U('lists'));
        }
    }

}