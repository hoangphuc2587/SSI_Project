<?php
include_once 'model/baseModel.php';
include 'component/MailHandler.php';
include 'classes/MContact.php';

Class ContactModel Extends baseModel{
	
    /*アドミンにメール送信*/
    public function sendContactMailToAdmin($company_name, $name,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {

    	$mailHandler = new MailHandler();
        $contactInfo=array();
        $contactInfo = $this->getListContact();
        
        $params = array('1'=>$name, '2'=>$company_name, '3'=>$postal_code, '4'=>$prefectures, '5' =>$city, '6'=>$address, '7'=>$phone, '8'=>$email, '9'=>$fax, '10'=>$mobile_number,'11'=>$inquiry, '12'=>$content);

    	return $mailHandler->sendMailToAdmin($params, $contactInfo);
    }

    /*ユーザーにメール送信*/
    public function sendContactMailToUser($company_name, $name,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {
        $mailHandler = new MailHandler();

        $contactInfo = $this->getContactInfo();
        $params = array('1'=>$name, '2'=>$company_name, '3'=>$postal_code, '4'=>$prefectures, '5' =>$city, '6'=>$address, '7'=>$phone, '8'=>$email, '9'=>$fax, '10'=>$mobile_number, '11'=>$inquiry, '12'=>$content);

        return $mailHandler->sendMailToUser($name, $email, $params, $contactInfo->getAutoMailContent());

    }

    /*ログインユーザーの情報を取得*/
    private function getContactInfo() {

        $contactInfo = null;

        $result = $this->db->query("SELECT * FROM m_contact");
        if($result['success'] == true && $result['count'] > 0)
        {
            $data =  $result['rows'][0];
            $contactInfo = new MContact();
            $contactInfo->setId($data['id']);
            $contactInfo->setReceptionMail($data['reception_mail']);
            $contactInfo->setAutoMailContent($data['auto_mail_content']);

        }
        return $contactInfo;
    }
    private function getListContact() {

        $contactInfo = $this->getContactInfo();
        $listMail = $contactInfo->getReceptionMail();
        $listContact=explode(',',$listMail);
        return $listContact;
    }
}
?>
