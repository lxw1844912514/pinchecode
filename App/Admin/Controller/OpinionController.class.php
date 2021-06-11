<?php

/**
 *User: lxw
 *Date: 2021-04-12
 */

namespace Admin\Controller;

use Admin\Controller\BaseController;


class OpinionController extends BaseController
{

    public function lists()
    {
        $opionions = M('Opinion')->where('')->select();
        $this->addCrumb('系统管理', U('Index/index'), '')
            ->addCrumb('投诉建议', '', '')
            ->addCrumb('建议列表', '', 'active')
            ->addNav('建议列表', U('Opinion/lists'), '')
            ->addListItem('id', 'ID', '', '')
            ->addListItem('name', '用户名', '', '')
            ->addListItem('content', '建议内容', '', '')
            ->addListItem('created_at', '创建时间', 'function', array('function_name' => 'date', 'params' => 'Y-m-d H:i:s,###'))
            ->addListItem('id', '操作', 'custom', array(
                'options' => array(
                    array(
                        'title' => '删除',
                        'url' => U('delete', array('id' => '{id}')),
                        'class' => 'btn btn-danger btn-sm icon-delete'
                    )
                )
            ))
            ->setListPer(20)
            ->setListData($opionions)
            ->common_lists();
    }

    //删除建议
    public function delete()
    {
        $id = I('id');
        $res = M('Opinion')->delete($id);
        if (!$res) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功', U('lists'));
        }
    }
}