<?php
// メール送信テンプレート
define('TMPL_NAME', 'tmplAutoMail.tpl');
require ("component/PHPMailerAutoload.php");
require ("component/PHPMailer.php");
require ("component/SMTP.php");
require ("component/Exception.php");
require ("directory/directory.php");

Class MailHandler {

    public function sendAutoMailRegistionToAdmin($params, $mailToAdmin){
        $filePath = TMPL_DIR . TMPL_NAME;
        $text = file_get_contents($filePath);
        $text = str_replace(array("\r\n", "\r", "\n"), "<br/>", $text); 
        $text = $this->replaceParams($text, $params); 
        $sendMail=$this->sendMail($text, $mailToAdmin); 
        error_log('sendMail result: '.$sendMail);
        return $sendMail;
    }
    public function sendAutoMailRegistionToUser($params, $mailToUser){
        $filePath = TMPL_DIR . TMPL_NAME;
        $text = file_get_contents($filePath);
        $text = str_replace(array("\r\n", "\r", "\n"), "<br/>", $text); 
        $text = $this->replaceParams($text, $params); 
        $listMail=array();
        array_push($listMail, $mailToUser);
        $sendMail=$this->sendMail($text, $listMail);  
        error_log('sendMail result: '.$sendMail);
        return $sendMail;
    }

    public function sendMailUpdateToUser($params, $mailUser){

        $filePath = TMPL_DIR . TMPL_NAME;
        $text = file_get_contents($filePath);
        $text = str_replace(array("\r\n", "\r", "\n"), "<br/>", $text); 
        $text = $this->replaceParams($text, $params); 
        $listMail=array();
        array_push($listMail, $mailUser);
        $sendMail=$this->sendMail($text, $listMail);
        error_log('sendMail result: '.$sendMail);
        return $sendMail;
    }
    
    // テンプレートパラメータ置換　{KEY}
    private function replaceParams($str, &$params) {
        $ret = $str;
        foreach ($params as $k => $v) {
           $ret = str_replace('{' . $k . '}', str_replace(array("\r\n", "\r", "\n"), "\n", $v), $ret); 
        }
        return $ret;
    }

    private function sendMail($body, $address) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();        //Sets Mailer to send message using SMTP
//        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
//        $mail->Port = 465;        //Sets the default SMTP server port
//        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
//        $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->Host = 'localhost';  //Sets the SMTP hosts
        $mail->Port = 25;        //Sets the default SMTP server port
        $mail->Username = 'testmail1.acc@gmail.com';     //Sets SMTP username
        $mail->Password = 'Test123Test';     //Sets SMTP password
        $mail->From = "no-reply@ssi.co.jp";     //Sets the From email address for the message
        $mail->FromName = "株式会社ソフトウエア・サイエンス";   //Sets the From name of the message
        foreach ($address as $key => $value) {
            $mail->addAddress($value);
        }
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);       //Sets message type to HTML    
        $mail->Subject = "ログインユーザー変更完了のお知らせ";

        $mail->Body =$body;  
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
?>
