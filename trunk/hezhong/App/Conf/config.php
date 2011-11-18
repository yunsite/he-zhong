<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : config.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 11:10:48
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: 项目总体参数配置
 */

return array(
    // 应用分组列表
    'APP_GROUP_LIST' => 'Www,Admin',
    // 默认分组
    'DEFAULT_GROUP' => 'Www',
    // 是否开启二级域名	1：开启  0：关闭
    'APP_SUB_DOMAIN_DEPLOY' => 0,
    // 指定二级域名与分组的关系
    'APP_SUB_DOMAIN_RULES' => array(
	'www' => array('Www/'),
    ),
    // 数据库配置
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_PORT' => '3306',
    'DB_NAME' => 'hzcmsdb',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_PREFIX' => 'hz_',
    // 开启调试模式
    'APP_DEBUG' => true,
    // 关闭模板缓存，对应cache目录
    'TMPL_CACHE_ON' => false,
    // URL访问模式，及静态缓存后缀配置
    'URL_MODEL' => 2,
    'URL_HTML_SUFFIX' => '.shtml',
    //启用静态缓存
    'HTML_CACHE_ON' => true,
    'HTML_FILE_SUFFIX' => '.shtml',
    'HTML_CACHE_TIME' => 60, //时间单位是秒（默认）
    'HTML_READ_TYPE' => 0,
    // SMTP服务器配置
    'SMTP_DEBUG' => false,
    'SMTP_AUTH' => true,
    'SMTP_CHARSET' => 'UTF-8',
    'SMTP_ENCODING' => 'base64',
    'SMTP_HOST' => 'smtp.qq.com',
    'SMTP_PORT' => '25',
    'SMTP_PWD' => 'ms201101',
    'FROM_EMAIL' => '1823825135@qq.com',
    'FROM_NAME' => '【微源网络科技】',
);
