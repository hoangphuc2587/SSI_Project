<?php
include_once 'model/baseModel.php';
include 'component/MailHandler.php';
include 'classes/MContact.php';

Class ContactModel Extends baseModel{
	
    /*アドミンにメール送信*/
    public function sendContactMailToAdmin($company_name, $name, $company_url,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {

    	$mailHandler = new MailHandler();
        $contactInfo=array();
        //$contactInfo = $this->getListContact();
        
        $params = array('1'=>$name, '2'=>$company_name, '13'=>$company_url, '3'=>$postal_code, '4'=>$prefectures, '5' =>$city, '6'=>$address, '7'=>$phone, '8'=>$email, '9'=>$fax, '10'=>$mobile_number,'11'=>$inquiry, '12'=>$content);

        if ($inquiry == 'IT制作やプロジェクトに関するご相談'){
            array_push($contactInfo, 'ssi_it_solution@ssi.co.jp', 'contact_from_web+solution@ssi.co.jp');
        }elseif ($inquiry == '業務効率化に関するご相談'){
            array_push($contactInfo, 'ssi_business_consulting@ssi.co.jp', 'contact_from_web+consulting@ssi.co.jp');
        }elseif ($inquiry == 'その他のご相談'){
            array_push($contactInfo, 'keikan@ssi.co.jp', 'contact_from_web+inquiry@ssi.co.jp');
        }elseif ($inquiry == '資料請求（PmSQETs）'){
            array_push($contactInfo, 'sqet@ssi.co.jp', 'contact_from_web+sqet@ssi.co.jp');
        }elseif ($inquiry == '資料請求（SGS）'){
            array_push($contactInfo, 'education@ssi.co.jp', 'contact_from_web+edu@ssi.co.jp');
        }elseif ($inquiry == 'パートナーについて'){
            array_push($contactInfo, 'ssi_procurement@ssi.co.jp', 'contact_from_web+partner@ssi.co.jp');
        }elseif ($inquiry == '採用について'){
            array_push($contactInfo, 'ssi_recruit@ssi.co.jp', 'contact_from_web+recruit@ssi.co.jp');
        }elseif ($inquiry == 'その他'){
            array_push($contactInfo, 'keikan@ssi.co.jp', 'contact_from_web+other@ssi.co.jp');
        }

    	return $mailHandler->sendMailToAdmin($params, $contactInfo);
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
