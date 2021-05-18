<?php
//local
define('TMPL_DIR_MAIL', $_SERVER['DOCUMENT_ROOT'] . '/');
//vop
//define('TMPL_DIR_MAIL', $_SERVER['DOCUMENT_ROOT'] . '/test/ssi/');
define('TMPL_MAIL_ADMIN', 'component/mailToAdmin.tpl');
define('TMPL_MAIL_USER', 'component/mailToUser.tpl');

mb_internal_encoding("utf-8");

require ("component/PHPMailerAutoload.php");
require ("component/PHPMailer.php");
require ("component/SMTP.php");
require ("component/Exception.php");

Class MailHandler {

    private $__mailTo;
    private $__name;
    private $__subject;
    private $__headers;
	private $__body;

    /* GET */
    public function getMailTo(){
       return $this->__mailTo;
    }

    public function getName(){
       return $this->__name;
    }
     
    public function getSubject(){
        return $this->__subject;
    }

    public function getHeaders(){
        return $this->__headers;
    }

	public function getBody(){
        return $this->__body;
    }

    
    /* SET */
    public function setMailTo($mailTo){
        $this->__mailTo = $mailTo;
    }

    public function setName($name){
        $this->__name = $name;
    }
     
    public function setSubject($subject){
        $this->__subject = $subject;
    }

    public function setHeaders($headers){
        $this->__headers = $headers;
    }

    public function setBody($body){
        $this->__body = $body;
    }

    public function sendMailToAdmin($params, $mailToAdmin, $mailContent){

        $filePath = TMPL_DIR_MAIL . TMPL_MAIL_ADMIN;
        $text = file_get_contents($filePath);
        $text = $this->replaceParams($text, $params); // テンプレートの文字列置換
        $userInfo = array('content'=>$text);
        $userInfo = str_replace(array("\r\n", "\r", "\n"), "<br/>", $userInfo); 
        $textMail = str_replace(array("\r\n", "\r", "\n"), "<br/>", $mailContent); 
        $Mail = $this->replaceParams($textMail, $userInfo); 
        $text = $this->replaceParams($Mail, $params);
        date_default_timezone_set("Japan");
        $now =  date('Y/m/d H:i:s');
        $subject = "お問い合わせのご連絡[ ".$now." ]";
        $this->sendMail($text, $mailToAdmin, $subject); // テンプレートの文字列置換
    }
    
    public function sendMailToUser($name, $email, $params, $mailContent){

        $filePath = TMPL_DIR_MAIL . TMPL_MAIL_USER;
        $text = file_get_contents($filePath);
        $text = $this->replaceParams($text, $params); 
        $userInfo = array('content'=>$text,'inputName'=>$name);
        $userInfo = str_replace(array("\r\n", "\r", "\n"), "<br/>", $userInfo); 
        $textMail = str_replace(array("\r\n", "\r", "\n"), "<br/>", $mailContent); 
        $Mail = $this->replaceParams($textMail, $userInfo); 
        $text = $this->replaceParams($Mail, $params);
        date_default_timezone_set("Japan");
        $now =  date('Y/m/d H:i:s');
        $subject = "【株式会社ソフトウエア・サイエンス】お問い合わせありがとうございます。[ ".$now." ]";
        $contactGuest=array();
        array_push($contactGuest, $email);
        $this->sendMail($text, $contactGuest, $subject);
    }

    private function sendMail($body, $address, $subject) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();        //Sets Mailer to send message using SMTP
//      $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
//      $mail->Port = 465;        //Sets the default SMTP server port
//      $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
//      $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->Host = 'localhost';  //Sets the SMTP hosts
        $mail->Port = 25;        //Sets the default SMTP server port
        $mail->SMTPAuth = false;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'testmail1.acc@gmail.com';     //Sets SMTP username
        $mail->Password = 'Test123Test';     //Sets SMTP password
        $mail->From = "no-reply@ssi.co.jp";     //Sets the From email address for the message
        $mail->FromName = "株式会社ソフトウエア・サイエンス";   //Sets the From name of the message
        
        foreach ($address as $key => $value) {
            $mail->addAddress($value);
	    //for test
	    //$mail->addAddress("dtnthach@starboardasia.com");
        }
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);       //Sets message type to HTML    
        $mail->Subject = $subject;

        $mail->Body =$body; 
	//$mail->SMTPDebug=1;
	error_log("send mail start"); 
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
            return 1;
        }
        else
        {
            error_log("mail failed::" . $mail->ErrorInfo);
            return 0;
        }
    }
    // テンプレートパラメータ置換　{KEY}
    private function replaceParams($str, &$params) {
        $ret = $str;
        foreach ($params as $k => $v) {
           $ret = str_replace('{' . $k . '}', str_replace(array("\r\n", "\r", "\n"), "\n", $v), $ret); 
        }
        return $ret;
    }

    //headerを設定
    private function headerSettings($fromName,$fromMail){
        
        $charset = "UTF-8";
        $headers['MIME-Version']    = "1.0";
        $headers['Content-Type']    = "text/plain; charset=".$charset;
        $headers['Content-Transfer-Encoding']   = "8bit";
        $headers['From'] = '"'.$fromName.'"<'.$fromMail.'>"';

        //headerを編集
        foreach ($headers as $key => $val) {
            $arrheader[] = $key . ': ' . $val;
        }
        return implode("\n", $arrheader);
    }
}
?>
