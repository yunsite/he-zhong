<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : TemplateAction.class.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 13:22:47
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: www分组-项目前台模板
 */

class TemplateAction extends CommonAction {
    /*
     * 
     */
    public function index(){
        $this->display();
    }
    
    /*
     * 
     */

    public function _empty() {
        $templateName = TEMPLATE_PATH . '/' . GROUP_NAME . '/' . MODULE_NAME . '/' . ACTION_NAME . '.html';
        if (file_exists($templateName)) {
            $this->assign('tplFile', $templateName);
            $this->display('Www:Template:index');
        } else {
            $this->_message('errorUri', '出错了，您访问的模板不存在！', U(APP_NAME . '://' . GROUP_NAME . '-' . MODULE_NAME . '/index'));
        }
    }

}

?>
