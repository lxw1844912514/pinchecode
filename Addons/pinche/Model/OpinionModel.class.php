<?php

/**
 *User: lxw
 *Date: 2021-04-11
 */

namespace Addons\pinche\Model;


use Think\Model;

class OpinionModel extends Model
{
    protected $_validate = array(
        array('content', 'require', '内容不能为空', 1, 'regex', 3),
        array('user_id', 'number', '用户id必须是数字',)
    );
    protected $_auto = array(
        array('name', 'name', 1, 'field'),
        array('created_at', 'time', 1, 'function')
    );
}