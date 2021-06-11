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

use Mp\Controller\MobileBaseController;

/**
 * 拼车移动端控制器
 * @author 宝树
 */
class MobileController extends MobileBaseController
{
    /*
     * 首页
     */
    public function index($type = '')
    {
        $go = $_GET['go'];

        if (empty($go)) {
            $this->assign('go1', 'sel');
            $this->assign('go', 0);
        } elseif ($go == 2) {
            $this->assign('go2', 'sel');
            $this->assign('go', 2);
        }

        if ($type == 2) {
            $this->assign('type', 2);
            $this->assign('man', 'sel');
        } elseif ($type == 1) {
            $this->assign('type', 1);
            $this->assign('car', 'sel');
        }

        if (isset($_GET['ffrom'])) {
            $this->assign('ffrom', $_GET['ffrom']);
        }
        if (isset($_GET['tto'])) {
            $this->assign('tto', $_GET['tto']);
        }

        $jssdk_sign = get_jssdk_sign_package();
        $this->assign('config', $jssdk_sign);

        $addon_config = get_addon_settings();
        $this->assign('addon_config', $addon_config);

        $system_settings = D('Admin/SystemSetting')->get_settings();
        $this->assign('meta_title', '');
        $this->assign('system_settings', $system_settings);
        $this->display();
    }

    /*
     * 发布拼车信息
     */
    public function add()
    {
        $config = get_addon_settings('pinche', get_mpid());
        $attention = $config['attention'];

        // 如果后台设置 发布必须关注本公众号
        if ($attention == 1) {
            $openid = get_openid();
            $fans_info = get_fans_info($openid);

            if ($fans_info['is_subscribe'] != 1) {
                $url = create_addon_url('attention');
                header("location: {$url}");
            }
        }

        // 查询是否收费
        if (!empty($config['charge']) && is_numeric($config['charge'])) {
            $charge = $config['charge'];
            if ($charge != 0) {
                $this->assign('add_money', $config['charge']);
            }
        }

        $this->display();
    }

    /*
     * ajax 保存发布的
     */
    public function save($id = null)
    {
        $mpid = get_mpid();
        $pinche = D('bs_pinche');
        $openid = get_openid();
        $mp_fans = D('mp_fans');
        $userinfo = get_fans_info();

        $config = get_addon_settings('pinche', get_mpid());

        // 查询是否收费
        if (!empty($config['charge']) && is_numeric($config['charge'])) {
            $charge = $config['charge'];
            if ($charge != 0) {
                // 用户余额是否大于 发布费用
                if ($userinfo['money']/100 < $charge) {
                    $json['code'] = 8;
                    $json['status'] = true;
                    $json['data'] = create_addon_url('recharge');
                    $json['error'] = '您的余额不足,请先充值';
//                    . $userinfo['money'] . '-' . $charge
                    $this->ajaxReturn($json);
                    exit();
                }
            }
        }

        // 如果后台开启 用户每日最多发布数量
        $user_add_num = $config['user_add_num'] + 0;
        if (!empty($user_add_num) && is_numeric($user_add_num)) {
//            查询 改用户今日发布了多少条
            $now_date = strtotime(date("y-m-d", strtotime('now')));
            $user_pinche_count = $pinche->where("openid = '{$openid}' and pubtime > {$now_date} and mpid = {$mpid}")->count();
            if ($user_pinche_count >= $user_add_num) {
                $json['code'] = 7;
                $json['status'] = false;
                $json['data'] = '#';
                $json['error'] = '您今日发布超过最大限制 ' . $user_add_num . '条/天';
                $this->ajaxReturn($json);
                exit();
            }
        }

        if (IS_POST) {
            $data['mpid'] = get_mpid();
            $data['openid'] = get_openid();;
            $data['nickname'] = $userinfo['nickname'];
            $data['pubtime'] = time();
            $data['status'] = 0;
            $data['types'] = $_POST['Type'];//1 2
            $data['gotime'] = strtotime($_POST['DepTime']);

            if (strtotime($_POST['DepTime']) < time()) {
                $data['gotime'] = time() + (10 * 60);
            }

            // 出发地
            $data['from'] = $_POST['From'] ? $_POST['From'] : '';
            $data['to'] = $_POST['To'] ? $_POST['To'] : '';
            $data['money'] = $_POST['Money'] ? $_POST['Money'] : 0;
            $data['num'] = $_POST['SeatCount'] ? $_POST['SeatCount'] : 0;
            $data['cartype'] = $_POST['CarType'] ? $_POST['CarType'] : 0;
            $data['through'] = $_POST['Through'] ? $_POST['Through'] : '';
            $data['people_count'] = $_POST['PeopleCount'] ? $_POST['PeopleCount'] :0;
            $data['remark'] = $_POST['Remark'] ? $_POST['Remark'] : '';
            $data['contact'] = $_POST['Contact'] ? $_POST['Contact'] : '';
            $data['tel'] = $_POST['Tel'] ? $_POST['Tel'] : '';
            
            //保存下联系方式
            setcookie('user_contact',$data['contact']);
            setcookie('user_tel',$data['tel']);

//            update
            if (isset($id)) {
                $where['id'] = $id + 0;
                $where['mpid'] = get_mpid();
                $where['openid'] = get_openid();
                if ($pinche->data($data)->where($where)->save()) {
                    $json['status'] = true;
                    $json['data'] = create_addon_url('detail') . '/id/' . $id;
                    $json['error'] = '';
                    $this->ajaxReturn($json);
                }
                exit();
            }


            //  置顶收费
            if ($_POST['TopIndex'] >= 1) {
                if (is_numeric($_POST['TopIndex'])) {
                    $config_key = 'charge' . $_POST['TopIndex'];
                    $charge_top = $config["$config_key"];
                    $charge_top_arr = explode('#', $charge_top);

                    $charge_time = $charge_top_arr[0];
                    $charge_money = $charge_top_arr[1];

                    // 查询是否收费
                    if (!empty($config['charge']) && is_numeric($config['charge'])) {
                        $charge = $config['charge'];

                        if ($userinfo['money']/100 < $charge_money+$charge) {
                            $json['code'] = 8;
                            $json['status'] = true;
                            $json['data'] = create_addon_url('recharge');
                            $json['error'] = '您的余额不足,请先充值';
                            $this->ajaxReturn($json);
                            exit();
                        }
                        else{
                            // 扣费
                            $mp_fans->where("openid = '{$openid}' and mpid = {$mpid}")->setDec('money', $charge_money*100);
//                        置顶天数
                            $data['top_time'] = time()+($charge_time*24*60*60);
                        }

                    }else{
                        if ($userinfo['money']/100 < $charge_money) {
                            $json['code'] = 8;
                            $json['status'] = true;
                            $json['data'] = create_addon_url('recharge');
                            $json['error'] = '您的余额不足,请先充值';
                            $this->ajaxReturn($json);
                            exit();
                        }
                        else{
                            // 扣费
                            $mp_fans->where("openid = '{$openid}' and mpid = {$mpid}")->setDec('money', $charge_money*100);
//                        置顶天数
                            $data['top_time'] = time()+($charge_time*24*60*60);
                        }
                    }

                }
            }

//            写入数据库
            if ($add_id = $pinche->data($data)->add()) {
                
                // 查询是否收费
                if (!empty($config['charge']) && is_numeric($config['charge'])) {
                    $charge = $config['charge'];
                    if ($charge != 0) {
                        // 扣费
                        $mpid = get_mpid();
                        $mp_fans->where("openid = '{$openid}' and mpid = {$mpid}")->setDec('money', $charge*100);
                    }
                }
                
//                写入成功
                $json['status'] = true;
                $json['data'] = create_addon_url('detail') . '/id/' . $add_id;
                $json['error'] = '';
                $this->ajaxReturn($json);
                exit();
            } else {
//                写入失败
                $json['status'] = false;
                $json['data'] = '#';
                $json['error'] = '发布失败';
                $this->ajaxReturn($json);
                exit();
            }
        }
    }

    /*
     * ajax 列表
     */
    public function lists()
    {
        $page = $_GET['page'];
        $start = ($page - 1) * 8;
        $num = 8;
        $pinche = D('bs_pinche');

        //根据拼车类型查询
        $type = $_GET['type'];
        if (isset($type)) {
            $where['types'] = $type;
        }

        //根据时间查询 显示不过期的
        $go = $_GET['go'];
        if ($go == 2) {
            $where['gotime'] = array('EGT', time());
        }

        //搜索
        if (isset($_GET['ffrom'])) {
            $where["from"] = array("like", "%" . $_GET['ffrom']);
        }
        if (isset($_GET['ffrom'])) {
            $where["to"] = array("like", "%" . $_GET['tto']);
        }

        $where['mpid'] = get_mpid();

        $where['is_top'] = 0;

        // user top
//        $where2 = array();
        $where2 = $where;
        $where2['is_top'] = 1;
        $pinche_lists2 = $pinche->where($where2)->order('pubtime desc')->limit($start, $num)->select();
        foreach ($pinche_lists2 as $k2 => $v2) {
            $pinche_lists2[$k2]['is_top'] = 1;
            $pinche_lists2[$k2]['gotime'] = time() + 100;
        }

        // user pay top
        $where3 = array();
        $where3 = $where;
        $where3['top_time'] = array('GT', time());
        $pinche_lists3 = $pinche->where($where3)->order('pubtime desc')->limit($start, $num)->select();
        foreach ($pinche_lists3 as $k3 => $v3) {
            $pinche_lists3[$k3]['is_top'] = 1;
            $pinche_lists3[$k3]['gotime'] = time() + 100;
        }

        $config = get_addon_settings('pinche', get_mpid());
        $timeout = $config['timeout'];

        // timeout no show
        if ($timeout == 2) {
            $where['gotime'] = array('egt', time());
        }

        $pinche_lists = $pinche->where($where)->order('pubtime desc')->limit($start, $num)->select();

        if (!empty($pinche_lists2)) {
            $pinche_lists = array_merge($pinche_lists2, $pinche_lists);
        }

        if (!empty($pinche_lists3)) {
            $pinche_lists = array_merge($pinche_lists3, $pinche_lists);
        }

        $arr = array();
        foreach ($pinche_lists as $key => $value) {
//            is top?
            $arr[$key]['Remark'] = $pinche_lists[$key]['remark'];
            $arr[$key]['Url'] = __APP__ . '/addon/pinche/mobile/detail/id/' . $pinche_lists[$key]['id'] . '/mpid/' . get_mpid();

            $arr[$key]['Id'] = $pinche_lists[$key]['id'];

            $openid = $pinche_lists[$key]['openid'];
            $mp_fans = D('mp_fans');
            $userinfo = $mp_fans->where("openid = '{$openid}'")->find();
            if ($userinfo) {
                $arr[$key]['UserFace'] = $userinfo['headimgurl'];
                $arr[$key]['Sex'] = $userinfo['sex'];
            } else {
                $arr[$key]['UserFace'] = "";
                $arr[$key]['Sex'] = 1;
            }

            $arr[$key]['From'] = $pinche_lists[$key]['from'];
            $arr[$key]['To'] = $pinche_lists[$key]['to'];
            $arr[$key]['Tel'] = $pinche_lists[$key]['tel'];
            $arr[$key]['Contact'] = $pinche_lists[$key]['contact'];
            $arr[$key]['NickName'] = mb_substr($pinche_lists[$key]['nickname'], 0, 15, "UTF-8");
            $arr[$key]['SeatCount'] = $pinche_lists[$key]['num'];
            $arr[$key]['PeopleCount'] = $pinche_lists[$key]['people_count'];
            $arr[$key]['Through'] = $pinche_lists[$key]['through'];
            $arr[$key]['DepTime'] = date('Y-m-d H:i:s', $pinche_lists[$key]['gotime']);
            $arr[$key]['Type'] = $pinche_lists[$key]['types'];
            $arr[$key]['Money'] = ceil($pinche_lists[$key]['money']);
            $arr[$key]['TopIndex'] = $pinche_lists[$key]['is_top'];
            // $arr[$key]['CarType'] = $pinche_lists[$key]['cartype'];

            $car_type = $pinche_lists[$key]['cartype'];

            switch ($car_type) {
                case 0:
                    $car_types = '';
                    break;
                case 1:
                    $car_types = '小轿车';
                    break;
                case 2:
                    $car_types = 'SUV';
                    break;
                case 3:
                    $car_types = '微面';
                    break;
                case 4:
                    $car_types = '货车';
                    break;
                default:
                    $car_types = '';
                    break;
            }

            $arr[$key]['CarType'] = $car_types;


//            time is end?
            if ($pinche_lists[$key]['gotime'] > time()) {
                $arr[$key]['IsOverdue'] = false;
            } else {
                $arr[$key]['IsOverdue'] = ture;
            }
        }

        $data['status'] = true;
        $data['data'] = $arr;

        $this->ajaxReturn($data);
    }

    /*
     * 拼车详情
     */
    public function detail($id = null)
    {
        $id = $id + 0;

        $pinche = D('bs_pinche');
        $info = $pinche->where("id = {$id}")->find();

        $openid = $info['openid'];
        $mp_fans = D('mp_fans');
        $userinfo = $mp_fans->where("openid = '{$openid}'")->find();
        if ($userinfo) {
            $info['UserFace'] = $userinfo['headimgurl'];
            $info['Sex'] = $userinfo['sex'];
        } else {
            $info['UserFace'] = "";
            $info['Sex'] = 1;
        }

        $car_type = $info['cartype'];

        switch ($car_type) {
            case 0:
                $car_types = '';
                break;
            case 1:
                $car_types = '小轿车';
                break;
            case 2:
                $car_types = 'SUV';
                break;
            case 3:
                $car_types = '微面';
                break;
            case 4:
                $car_types = '货车';
                break;
            default:
                $car_types = '';
                break;
        }
        $info['CarType'] = $car_types;

        $jssdk_sign = get_jssdk_sign_package();
        $this->assign('config', $jssdk_sign);

        $system_settings = D('Admin/SystemSetting')->get_settings();
        $this->assign('meta_title', '');
        $this->assign('system_settings', $system_settings);

        $addon_config = get_addon_settings();
        $this->assign('addon_config', $addon_config);

        $this->assign('info', $info);
        $this->display();
    }

    /*
     * 用户中心
     */
    public function user()
    {
        $this->assign('user', get_fans_info());
        $this->display();
    }

    /*
     * 用户发布的
     */
    public function user_push()
    {
        $userinfo = get_fans_info();
        $pinche = D('bs_pinche');

        $where['openid'] = $userinfo['openid'];
        $where['mpid'] = $userinfo['mpid'];

        $arr = $pinche->order('pubtime desc')->where($where)->select();
        $this->assign('info', $arr);
        $this->display();
    }


    /*
     * 更新发布的拼车信息
     */
    public function update($id = null)
    {
        $id = $id + 0;
        $pinche = D('bs_pinche');
        $where['id'] = $id;
        $where['mpid'] = get_mpid();
        $where['openid'] = get_openid();
        $info = $pinche->where($where)->find();

        $info['action'] = 'update';

        $this->assign('info', $info);
        $this->display('add');
    }

    /*
     * 删除发布的拼车信息
     */
    public function del($id = null)
    {
        $id = $id + 0;
        $pinche = D('bs_pinche');
        $where['id'] = $id;
        $where['mpid'] = get_mpid();
        $where['openid'] = get_openid();

        if ($pinche->where($where)->delete()) {
            $data['status'] = true;
            $data['data'] = null;
            $data['error'] = '';
            $this->ajaxReturn($data);
        }
    }

    /*
     * 关注提示
     */
    public function attention()
    {
        $config = get_mp_info(get_mpid());
        $this->assign('config', $config);
        $this->display();
    }

    /*
     * 充值
     */
    public function recharge()
    {
        $settings = get_addon_settings();
        if ($settings['recharge']) {
            if (strpos($settings['recharge'], ',')) {
                $recharge = explode(',', $settings['recharge']);
            } else {
                $recharge = explode('，', $settings['recharge']);
            }
        }

        $this->assign('recharge', $recharge);

        $this->display();
    }

    /*
     * 充值ajax
     */
    public function recharge_ajax()
    {
        $data['mpid'] = get_mpid();
        $data['openid'] = get_openid();
        $data['money'] = floatval(I('price'));
        $data['pay_status'] = 0;
        $data['create_time'] = time();
        $data['is_show'] = 0;
        $data['is_ok'] = 0;
        $data['orderid'] = $data['mpid'] . time();

        $res = M('bs_pay_list')->add($data);

        if (!$res) {
            $data['errcode'] = 0;
            $data['errmsg'] = '支付失败';
        } else {
            $data['errcode'] = 1;
            $data['errmsg'] = '支付成功';
            $data['notify'] = create_addon_url('recharge_ok');
            $data['jump_url'] = create_addon_url('recharge_ok');
        }
        $this->ajaxReturn($data);
    }

    /**
     * 充值成功
     */
    public function recharge_ok()
    {
        /*
         * 微信服务器回调
         */
        if (I('result_code') == 'SUCCESS' && I('return_code') == 'SUCCESS') {
            $map['orderid'] = I('out_trade_no');
            $data['pay_status'] = 1;
            $data['is_show'] = 1;
            M('bs_pay_list')->where($map)->save($data);

            $bs_pay = M('bs_pay_list');
            $pay_list = $bs_pay->where($map)->find();

            $order_status = $pay_list['is_ok'];
            /*
             * 防止微信多次回调
             */
            if ($order_status == 0) {
                $ok['is_ok'] = 1;
                M('bs_pay_list')->where($map)->save($ok);

                $pay_money = $pay_list['money']*100;
                /*
                 * 给用户加余额
                 */
                $oid = $pay_list['openid'];
                $mp_fans = D('mp_fans');

                $mpid = $pay_list['mpid'];
                $mp_fans->where("openid = '{$oid}' and mpid = {$mpid}")->setInc('money', $pay_money);
            }

        } else {
//            如果来自用户访问 跳转用户中心
            $url = create_addon_url('user');
            header("location: $url");
        }
    }

}

?>