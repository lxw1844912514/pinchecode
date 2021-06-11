<?php

/**
 *User: lxw
 *Date: 2021-04-12
 */

namespace Admin\Controller;


class CarController extends BaseController
{

    /**
     * 添加车辆
     * User: lxw
     * Date: 2021-04-13 00:05
     */
    public function add()
    {
        if (IS_POST) {
            $_validate = array(
                array('name', 'require', '品牌不能为空', 1, 'regex', 3),
            );
            $_auto = array(
                array('name', 'name', 1, 'field'),
                array('created_at', 'time', 1, 'function')
            );
            $Car = M('car');
            $Car->setProperty('_validate', $_validate);
            $Car->setProperty('_auto', $_auto);
            if (!$Car->create()) {
                $this->error($Car->getError());
            } else {
                $user_id = $Car->add();
                if ($user_id) {
                    $this->success('添加车辆成功', U('lists'));
                } else {
                    $this->error('添加车辆失败');
                }
            }
        } else {
            $this->addCrumb('系统管理', U('Index/index'), '')
                ->addCrumb('车辆管理', U('User/lists'), '')
                ->addCrumb('添加车辆', '', 'active')
                ->addNav('添加车辆', '', 'active')
                ->setModel('car')
                ->addFormField('name', '品牌', 'text', '')
                ->addFormField('type', '车型', 'select', array('options' => array(0 => '请选择车型', 1 => '小轿车', 2 => 'SUV', 3 => '微面', 4 => '货车')))
                ->addFormField('color', '颜色', 'select', array('options' => array(0 => '请选择颜色', 1 => '红色', 2 => '黄色', 3 => '白色', 4 => '蓝色', 5 => '黑色')))
                ->addFormField('steatnum', '座位数', 'number', array('placeholder' => '请添加座位数'))
                ->addFormField('car_img', '汽车图片', 'image', array('placeholder' => '请添加图片'))
                ->common_add();
        }
    }

    /**
     * 车辆列表
     * User: lxw
     * Date: 2021-04-13 00:05
     */
    public function lists()
    {
        $cars = M('car')->where('')->select();
        $this->addCrumb('系统管理', U('Index/index'), '')
            ->addCrumb('车辆管理', U('User/lists'), '')
            ->addCrumb('车辆列表', '', 'active')
            ->addNav('车辆列表', '', 'active')
            ->addButton('添加车辆', U('add'), 'btn btn-primary', '')
            ->addListItem('id', 'ID', '', '')
            ->addListItem('car_img', '图片', 'image', array('attr' => 'width=100,height=100'))
            ->addListItem('name', '品牌名', '', '')
            ->addListItem('steatnum', '座位数', '', '')
            ->addListItem('color', '颜色', 'enum', array('options' => array(1 => '红色', 2 => '黄色', 3 => '白色', 4 => '蓝色', 5 => '黑色')))
            ->addListItem('created_at', '添加时间', 'function', array('function_name' => 'date', 'params' => 'Y-m-d H:i:s,###'))
            ->addListItem('status', '状态', 'enum', array('options' => array(0 => '禁用', 1 => '正常')))
            ->addListItem('id', '操作', 'custom', array('options' => array(
                'edit' => array('编辑', U('edit', array('id' => '{id}')), 'btn btn-primary btn-sm icon-edit', ''),
                'delete' => array('删除', U('delete', array('carid' => '{id}')), 'btn btn-danger btn-sm icon-delete', ''))))
            ->setListPer(20)
            ->setListData($cars)
            ->common_lists();
    }

    /**
     * 编辑车辆信息
     * User: lxw
     * Date: 2021-04-13 00:32
     */
    public function edit()
    {
        if (IS_POST) {
            $User = M('car');

            $data['name'] = I('name');
            $data['color'] = I('color');
            $data['steatnum'] = I('steatnum');
            $data['car_img'] = I('car_img');
            $data['id'] = I('get.id');
            C('TOKEN_ON', false);
            if (!$User->create($data)) {
                $this->error($User->getError());
            } else {
                $User->save($data);
            }
            $this->success('修改车辆信息成功', U('lists'));
        } else {
            $carInfo = M('car')->find(I('id'));
            $this->addCrumb('系统管理', U('Index/index'), '')
                ->addCrumb('车辆管理', U('passenger/lists'), '')
                ->addCrumb('编辑车辆', '', 'active')
                ->addNav('编辑车辆', '', 'active')
                ->setModel('car')
                ->addFormField('name', '品牌名', 'text', '')
                ->addFormField('steatnum', '座位数', 'number', '')
                ->addFormField('color', '颜色', 'select', array('options' => array(1 => '红色', 2 => '黄色', 3 => '白色', 4 => '蓝色', 5 => '黑色')))
                ->addFormField('car_img', '图片', 'image', array('attr' => 'width=100,height=100'))
                ->setFormData($carInfo)
                ->common_edit();
        }
    }

    public function delete()
    {
        $car_id = I('carid');
        $res = M('car')->delete($car_id);
        if (!$res) {
            $this->error('删除车辆失败');
        } else {
            $this->success('删除车辆成功', U('lists'));
        }
    }

}