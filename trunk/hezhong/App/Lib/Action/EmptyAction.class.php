<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : EmptyAction.class.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 11:17:10
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: 空模块处理类
 */

class EmptyAction extends CommonAction {
    /*
     * 当访问的模块不存在时，该方法触发
     * @access  public
     * @param   void
     * @return  void
     */

    public function index() {
        $this->_message('errorUri', '出错了，您访问的模块不存在！', U(APP_NAME . '://' . GROUP_NAME . '-Index/index'));
    }

}

?>
