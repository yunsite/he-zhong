<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : htmls.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 11:12:29
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: 项目静态缓存生成规则配置
 */

return array(
    // 配置Www分组的静态缓存规则，以当前的URL来缓存
    'Www-' => array('{:group}/{:module}/{$_SERVER.REQUEST_URI|md5}'),
    // 配置Admin分组的静态缓存规则，以当前的URL来缓存
    'Admin-' => array('{:group}/{:module}/{$_SERVER.REQUEST_URI|md5}'),
);
?>
