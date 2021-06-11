<?php
/*
 *---------------------------------------------------------------
 *  酷猴工作室 官方网址:http://kuhou.net
 *  淘宝店铺:https://shop137493962.taobao.com/
 *---------------------------------------------------------------
 *  author:  baoshu
 *  website: kuhou.net
 *  email:   83507315@qq.com
 */

namespace Mp\Controller;
use Mp\Controller\AddonsController;

/**
 * 拼车后台管理控制器
 * @author 宝树
 */
class WebController extends AddonsController {
    public function messages() {
        $model = get_addon_model('bs_pinche');
        $this->setModel($model)
            ->common_lists();
    }

    public function delete() {
        $this->setModel('bs_pinche')
            ->setDeleteMap(array('id'=>I('id'),'mpid'=>get_mpid()))
            ->setDeleteSuccessUrl(create_addon_url('messages'))
            ->common_delete();
    }

    public function edit() {
        $this->addSubNav('编辑', '', 'active')
            ->setModel('bs_pinche')
            ->addFormField('types', '拼车类型', 'select', array('options'=>array(1=>'车主',2=>'乘客')))  

            ->addFormField('gotime', '出发时间', 'text' ,array('function_name' => 'date','params' => 'm-d H:i,###'))
            ->addFormField('from', '出发地', 'text')
            ->addFormField('to', '目的地', 'text')
            ->addFormField('money', '费用', 'text')
            ->addFormField('num', '座位数', 'text')
            ->addFormField('cartype', '车型', 'radio', array('options'=>array(0=>'大巴',1=>'小轿车',2=>'SUV',3=>'微面',4=>'货车')))
            ->addFormField('through', '途经', 'text')
            ->addFormField('people_count', '人数', 'text')
            ->addFormField('remark', '备注', 'text')
            ->addFormField('contact', '联系人', 'text')
            ->addFormField('tel', '手机号', 'text')
            ->addFormField('is_top', '是否置顶', 'radio', array('options'=>array(0=>'未置顶',1=>'已置顶')))

            ->setFindMap(array('mpid'=>get_mpid(),'id'=>I('get.id')))
            ->setEditMap(array('mpid'=>get_mpid(),'id'=>I('get.id')))
            ->setEditSuccessUrl(create_addon_url('messages'))
            ->common_edit();
    }

}

?>