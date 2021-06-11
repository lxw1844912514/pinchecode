
CREATE TABLE IF NOT EXISTS `dc_bs_pinche` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '用户标识',
  `nickname` varchar(50) NOT NULL COMMENT '用户昵称',
  `types` varchar(10) NOT NULL COMMENT '拼车类型',
  `gotime` varchar(20) DEFAULT NULL COMMENT '出发时间',
  `time_add` varchar(50) DEFAULT NULL COMMENT '时间补充',
  `from` varchar(100) DEFAULT NULL COMMENT '出发地',
  `to` varchar(100) DEFAULT NULL COMMENT '目的地',
  `money` decimal(6,2) DEFAULT NULL COMMENT '价格',
  `num` int(3) DEFAULT NULL COMMENT '座位数量',
  `cartype` tinyint(1) DEFAULT NULL COMMENT '车型',
  `through` varchar(100) DEFAULT NULL COMMENT '途经',
  `people_count` int(2) DEFAULT NULL COMMENT '人数',
  `remark` text COMMENT '备注',
  `contact` varchar(20) DEFAULT NULL COMMENT '联系人',
  `tel` varchar(11) DEFAULT NULL COMMENT '联系电话',
  `pubtime` varchar(20) DEFAULT NULL COMMENT '发布时间',
  `is_top` char(1) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `top_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARSET=utf8 COMMENT='拼车';

CREATE TABLE IF NOT EXISTS `dc_bs_pay_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '用户标识',
  `money` float(10,2) DEFAULT NULL COMMENT '付款金额',
  `pay_status` int(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `is_show` tinyint(1) DEFAULT NULL COMMENT '是否显示',
  `is_ok` tinyint(1) DEFAULT NULL COMMENT '是否完成',
  `orderid` varchar(50) DEFAULT NULL COMMENT '订单号',
  `info_id` int(10) DEFAULT NULL,
  `top_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARSET=utf8 COMMENT='vip支付列表';