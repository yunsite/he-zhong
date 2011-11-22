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
 * Description: 点评分组-项目前台模板
 */

class TemplateAction extends CommonAction {
    /*
     * 模板列表页
     * @access  public
     * @param   void
     * @return  void
     */

    public function index() {
        $dir = TEMPLATE_PATH . '/' . GROUP_NAME . '/' . MODULE_NAME;
        $handle = opendir($dir);
        $templates = array();
        while ($file = readdir($handle)) {
            $newpath = $dir . "/" . $file;
            if (is_file($newpath) && $file != "index.html") {
                $tempArray = explode('.', $file);
                $templates[] = array('templateName' => $tempArray[0], 'templateUrl' => '__URL__/' . $tempArray[0]);
            }
        }
        $this->assign('templates', $templates);
        $this->display();
    }

    /*
     * 模板模块的空方法函数，用于产生对各个不同模板文件的调用
     * @access  public
     * @param   void
     * @return  void
     */

    public function _empty() {
        $templateName = TEMPLATE_PATH . '/' . GROUP_NAME . '/' . MODULE_NAME . '/' . ACTION_NAME . '.html';
        if (file_exists($templateName)) {
            $this->assign('tplFile', $templateName);
            $this->display(GROUP_NAME . ':' . MODULE_NAME . ':index');
        } else {
            $this->_message('errorUri', '出错了，您访问的模板不存在！', U(APP_NAME . '://' . GROUP_NAME . '-' . MODULE_NAME . '/index'));
        }
    }

}

?>
