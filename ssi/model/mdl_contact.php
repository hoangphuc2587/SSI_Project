<?php
include_once 'model/baseModel.php';
include 'component/MailHandler.php';
include 'classes/MContact.php';

Class ContactModel Extends baseModel{
	
    /*アドミンにメール送信*/
    public function sendContactMailToAdmin($company_name, $name, $company_url,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {

        $mailHandler = new MailHandler();
        $emails=array();
        $contactInfo = $this->getContactInfo();
        $emails = $this->getInquiryEmail($inquiry);
        $params = array('1'=>$name, '2'=>$company_name, '13'=>$company_url, '3'=>$postal_code, '4'=>$prefectures, '5' =>$city, '6'=>$address, '7'=>$phone, '8'=>$email, '9'=>$fax, '10'=>$mobile_number,'11'=>$inquiry, '12'=>$content);
        return $mailHandler->sendMailToAdmin($params, $emails, $contactInfo->getAutoMailContentAdmin());
    }

    /*ユーザーにメール送信*/
    public function sendContactMailToUser($company_name, $name, $company_url, $postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {
        $mailHandler = new MailHandler();

        $contactInfo = $this->getContactInfo();
        $params = array('1'=>$name, '2'=>$company_name, '13'=>$company_url, '3'=>$postal_code, '4'=>$prefectures, '5' =>$city, '6'=>$address, '7'=>$phone, '8'=>$email, '9'=>$fax, '10'=>$mobile_number, '11'=>$inquiry, '12'=>$content);

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
            $contactInfo->setAutoMailContentAdmin($data['auto_mail_content_admin']);

        }
        return $contactInfo;
    }
    private function getListContact() {

        $contactInfo = $this->getContactInfo();
        $listMail = $contactInfo->getReceptionMail();
        $listContact=explode(',',$listMail);
        return $listContact;
    }

    private function getInquiryEmail($inquiry_type) {
        $listContact = array();
        $result = $this->db->query("SELECT reception_mail FROM t_inquiry_email WHERE inquiry_type = '".$inquiry_type."'");
        if($result['success'] == true && $result['count'] > 0)
        {
           $data =  $result['rows'][0]; 
           $listMail = $data['reception_mail'];
           $listContact=explode(',',$listMail);
        }
        return $listContact;
    }
}
?>
