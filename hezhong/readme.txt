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
工具 -> 模板 -> 许可证 -> 在编辑器中打开

--------------------------------------------------------------------------------

User.properties structure of this project:

user = 
author = 
email = 
qq = 
url = 
tel = 

设置方法：
工具 -> 模板 -> 设置

--------------------------------------------------------------------------------

前端开发说明

样式存放位置：  /public/css/【对应的主题目录】/【对应的分组（可选）】
              如：默认主题 - default | /public/css/default
              如：默认主题的点评分组 - default/dp | /public/css/default/dp
图片存放位置：  /public/images/【对应的主题目录】/【对应的分组（可选）】
              如：默认主题-default | /public/images/default
              如：默认主题的点评分组 - default/dp | /public/images/default/dp
JS存放位置:    /public/js
