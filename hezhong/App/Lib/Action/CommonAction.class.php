<?php

/*
 * [HZcms] (C)2001-2018 AoSheWeb Inc.
 * This is NOT a freeware, use is subject to license terms.
 * 
 * Document   : CommonAction.class.php
 * Encoding   : UTF-8
 * Created on : 2011-11-18, 11:15:30
 * Author     : leefire yunzhi.li.08@gmail.com 464328282
 * Site       : http://www.aosheweb.com
 * Description: 公共继承类
 */

class CommonAction extends Action {
    /*
     * 生成邮箱验证码
     * @access	protected
     * @param	int	$length		生成验证码的长度
     * @param	int	$mode		生成验证码模式
     * @param	string	$verifyName	生成验证码名称
     * @return	string	$verify
     */

    protected function buildEmailVerify($length=20, $mode=5, $verifyName='emailVerify') {
        import('ORG.Util.String');
        $verify = String::rand_string($length, $mode);
        $_SESSION[$verifyName] = md5($verify);
        return $verify;
    }

    /*
     * 发送邮箱验证码
     * @access	public
     * @param	void
     * @return	void
     */

    public function sendEmailVerify() {
        $username = $_POST['username'];
        $usermail = $_POST['useremail'];
        $verify = $this->buildEmailVerify();
        $checkurl = 'http://' . $_SERVER['SERVER_NAME'] . __URL__ . '/checkEmail/verify/' . $verify;
        $body = '邮箱验证请点击：<a href="' . $checkurl . '" target="_blank">' . $checkurl . '</a><br/>如果该链接不可点击，请直接复制并粘贴到浏览器地址栏访问。';
        $this->sendEmailWithoutAttachment($usermail, $username, '【邮箱认证】', $body);
    }

    /*
     * 邮箱验证
     * @access	public
     * 
     */

    public function checkEmail($verifyName='emailVerify') {

        if ($_SESSION[$verifyName] != md5($_GET['verify'])) {
            $this->_message('error', '邮件验证失败<br/>');
        } else {
            $this->_message('success', '邮件验证成功！', __APP__);
        }
    }

    /*
     * 不带附件的邮件发送
     * @access	protected
     * @param	string	$toEmail	发送至邮箱
     * @param	string	$toName		发送至姓名
     * @param	string	$subject	邮件主题
     * @param	string	$body		邮件内容
     * @param	string	$replyEmail	回复至邮箱
     * @param	string	$replyName	回复至姓名
     * @return	void
     */

    protected function sendEmailWithoutAttachment($toEmail, $toName, $subject, $body, $replyEmail='yunzhi.li.08@gmail.com', $replyName='lifire') {
        header('Content-type:text/html;charset=utf-8');
        vendor("PHPMailer.class#phpmailer");
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        try {
            $mail->SMTPDebug = C('SMTP_DEBUG'); // 改为2可以开启调试
            $mail->SMTPAuth = C('SMTP_AUTH'); // enable SMTP authentication
            $mail->Host = C('SMTP_HOST'); // SMTP server 部分邮箱不支持SMTP，QQ邮箱里要设置开启的
            $mail->Port = C('SMTP_PORT'); // set the SMTP port for the GMAIL server
            $mail->CharSet = C('SMTP_CHARSET'); // 这里指定字符集！解决中文乱码问题
            $mail->Encoding = C('SMTP_ENCODING');
            $mail->Username = C('SMTP_USER'); // SMTP account username
            $mail->Password = C('SMTP_PWD'); // SMTP account password
            $fromEmail = C('FROM_EMAIL');
            $fromName = C('FROM_NAME');
            $mail->AddAddress($toEmail, $toName);
            $mail->SetFrom($fromEmail, $fromName); //发送者邮箱
            $mail->AddReplyTo($replyEmail, $replyName); //回复到这个邮箱
            $mail->Subject = $subject;
            $mail->MsgHTML($body);
            $mail->Send();
            $this->_message('success', '验证邮件发送成功！', U(APP_NAME . '://' . GROUP_NAME . '-Index/index'));
        } catch (phpmailerException $e) {
            $this->_message('error', '邮件发送失败<br/>' . $e->errorMessage(), '', 30);
        } catch (Exception $e) {
            $this->_message('error', '邮件发送失败<br/>' . $e->errorMessage());
        }
    }

    /*
     * 不带附件的邮件发送
     * @access	protected
     * @param	string	$toEmail	发送至邮箱
     * @param	string	$toName		发送至姓名
     * @param	string	$subject	邮件主题
     * @param	string	$body		邮件内容
     * @param	array	$attachment	邮件附件路径
     * @param	string	$replyEmail	回复至邮箱
     * @param	string	$replyName	回复至姓名
     * @return	void
     */

    protected function sendEmailWithAttachment($toEmail, $toName, $subject, $body, $attachment, $replyEmail, $replyName) {
        header('Content-type:text/html;charset=utf-8');
        vendor("PHPMailer.class#phpmailer");
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        try {
            $mail->SMTPDebug = C('SMTP_DEBUG'); // 改为2可以开启调试
            $mail->SMTPAuth = C('SMTP_AUTH');    // enable SMTP authentication
            $mail->Host = C('SMTP_HOST'); //"smtp.qq.com"; // SMTP server 部分邮箱不支持SMTP，QQ邮箱里要设置开启的
            $mail->Port = C('SMTP_PORT'); //25;   // set the SMTP port for the GMAIL server
            $mail->CharSet = C('SMTP_CHARSET'); //"UTF-8";     // 这里指定字符集！解决中文乱码问题
            $mail->Encoding = C('SMTP_ENCODING'); //"base64";
            $mail->Username = C('SMTP_USER'); //"464328282"; // SMTP account username
            $mail->Password = C('SMTP_PWD'); //"wolongliyun1202"; // SMTP account password
            $fromEmail = C('FROM_EMAIL');
            $fromName = C('FROM_NAME');
            $mail->AddAddress($toEmail, $toName); //('yunzhi.li.08@gmail.com', 'lfire test!');
            $mail->SetFrom($fromEmail, $fromName); //('464328282@qq.com', 'verycover');     //发送者邮箱
            $mail->AddReplyTo($replyEmail, $replyName); //('464328282@qq.com', 'verycover'); //回复到这个邮箱
            $mail->Subject = $subject; //'helo word';
            $mail->MsgHTML($body);
            if (!empty($attachment)) {
                foreach ($attachment as $att) {
                    $mail->AddAttachment($att);
                }
            }
            $mail->Send();
            $this->_message('success', '邮件发送成功！', U(APP_NAME . '://' . GROUP_NAME . '-Index/index'));
        } catch (phpmailerException $e) {
            $this->_message('error', '邮件发送失败<br/>' . $e->errorMessage());
        } catch (Exception $e) {
            $this->_message('error', '邮件发送失败<br/>' . $e->errorMessage());
        }
    }

    /*
     * 定义空操作处理方法
     * @access  public
     * @param   void
     * @return  void
     */

    public function _empty() {
        $this->_message('errorUri', '出错了，您访问的页面不存在！', U(APP_NAME . '://' . GROUP_NAME . '-Index/index'));
    }

    /*
     * 带有提示信息的跳转
     * @access  protected
     * @param   string  $type       信息的类型
     * @param   string  $content    提示信息内容
     * @param   string  $jumpUrl    跳转链接
     * @param   int     $time       跳转前页面停留时间
     * @param   boolean $ajax       是否为ajax方式
     * @return  void
     */

    protected function _message($type = 'success', $content = '更新成功', $jumpUrl = __URL__, $time = 3, $ajax = false) {
        $jumpUrl = empty($jumpUrl) ? __URL__ : $jumpUrl;
        switch ($type) {
            case 'success':
                $this->assign('msgTitle', '操作成功');
                $this->assign('jumpUrl', $jumpUrl);
                $this->assign('waitSecond', $time);
                $this->success($content, $ajax);
                break;
            case 'error':
                $this->assign('msgTitle', '操作出错');
                $this->assign('jumpUrl', 'javascript:history.back(-1);');
                $this->assign('waitSecond', $time);
                $this->assign('error', $content);
                $this->display(C('TMPL_ACTION_ERROR'));
                break;
            case 'errorUri':
                $this->assign('msgTitle', 'URL出错');
                $this->assign('jumpUrl', $jumpUrl);
                $this->assign('waitSecond', $time);
                $this->assign('error', $content);
                $this->display(C('TMPL_ACTION_ERROR'));
                break;
            default: die('error type');
                break;
        }
    }

}

?>
