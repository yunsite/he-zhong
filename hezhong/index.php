<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : index.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 10:45:41
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: 项目主入口文件
 */
// 定义头信息
header("Content-type: text/html; charset=UTF-8");

// 跨域访问session，域名：hzcms.com
//ini_set("session.cookie_domain", ".hzcms.com");
// 定义thinkphp框架入口
define('THINK_PATH', './ThinkPHP/');
// 定义应用路径及应用名称
define("APP_PATH", "./App");
define("APP_NAME", "App");

// 整体用于调试模式的配置
// 调试模式，配置不生成核心缓存文件
define('NO_CACHE_RUNTIME', false);
// 调试模式，配置对于编译缓存的内容不去空白和注释
define('STRIP_RUNTIME_SPACE', false);

// 定义静态缓存文件生成位置
define('HTML_PATH', './Html/');

// 项目框架引入
require THINK_PATH . "ThinkPHP.php";
App::run();
