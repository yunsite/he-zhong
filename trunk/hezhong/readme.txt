license-hzcms content:

<#if licenseFirst??>
${licenseFirst}
</#if>
${licensePrefix}[HZcms] (C)2001-2018 AoSheWeb Inc.
${licensePrefix}This is NOT a freeware, use is subject to license terms.
${licensePrefix}
${licensePrefix}Document   : ${nameAndExt}
${licensePrefix}Encoding   : ${encoding}
${licensePrefix}Created on : ${date}, ${time}
${licensePrefix}Author     : ${author} ${email} ${qq}
${licensePrefix}Site       : http://www.aosheweb.com
${licensePrefix}Description: 
<#if licenseLast??>
${licenseLast}
</#if>

设置方法：
工具 -> 模板 -> 许可证(选择具体的一个许可证) -> 在编辑器中打开

--------------------------------------------------------------------------------

User.properties structure of this project:

user = 
author = 
email = 
qq = 
url = http://www.aosheweb.com

设置方法：
工具 -> 模板 -> 设置

--------------------------------------------------------------------------------

html 文件开发模板规范

<#assign licenseFirst = "<!--">
<#assign licensePrefix = "">
<#assign licenseLast = "-->">
<#include "../Licenses/license-${project.license}.txt">

<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=${encoding}">
    </head>
    <body>
        <div>TODO write content</div>
    </body>
</html>

设置方法：
工具 -> 模板 -> 其他 -> HTML文件 -> 在编辑器中打开

--------------------------------------------------------------------------------

css 文件开发模板规范

<#assign licenseFirst = "/* ">
<#assign licensePrefix = " * ">
<#assign licenseLast = " */">
<#include "../Licenses/license-${project.license}.txt">

*{margin:0px; padding:0px;}

设置方法：
工具 -> 模板 -> 其他 -> 层又叠样式表 -> 在编辑器中打开

--------------------------------------------------------------------------------

javascript 文件开发模板规范

<#assign licenseFirst = "/* ">
<#assign licensePrefix = " * ">
<#assign licenseLast = " */">
<#include "../Licenses/license-${project.license}.txt">


设置方法：
工具 -> 模板 -> 其他 -> JavaScript文件 -> 在编辑器中打开

--------------------------------------------------------------------------------

PHP 文件开发模板规范

<?php
<#assign licenseFirst = "/* ">
<#assign licensePrefix = " * ">
<#assign licenseLast = " */">
<#include "../Licenses/license-${project.license}.txt">

?>


设置方法：
工具 -> 模板 -> PHP -> PHP文件 -> 在编辑器中打开

--------------------------------------------------------------------------------

前端开发说明

系统定义参数说明：
../Public       对应主题下的 Public 目录
如：当前主题是 default ，那么该参数代表 /App/Tpl/default/Public
***注意：参数中的 P 要大写

__PUBLIC__      整体项目工程下的 Public 目录
即： /Public
***注意：参数的前后都是 两 个下划线，其中英文字母都要大写

作用范围说明：
以上参数只限于在 html 代码中使用，在 css 代码中，仍采用常规的路径书写方式

样式存放位置：      ../Public/css/
                  即： /App/Tpl/default/Public/css/

样式图片存放位置：  ../Public/images/
                  即： /App/Tpl/default/Public/images/
                  注： 主要是存放与CSS相关的图片以及样式定义相关联的图片，不放置与测试相
                  关的任何内容，如产品图片、用户头像等。

测试图片存放位置：  __PUBLIC__/images/
                  即： /Public/images/
                  注： 这里即放置在前端开发过程相关的测试性图片，如产品、广告、用户头像等。

JS存放位置:        __PUBLIC__/js
                  即： /Public/js
                  注： 参数的前后都是 两 个下划线，其中英文字母都要大写
