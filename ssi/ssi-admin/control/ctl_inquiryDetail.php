<?php
include 'model/mdl_login.php';
include 'model/mdl_inquiryEmail.php';

Class InquiryDetailController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);

        $loginUser = new MLogin();
        if($_SESSION["loginUserId"] != null)
        {
            $loginUser->setUserId($_SESSION["loginUserId"] );
            $loginUser->setPassword($_SESSION['loginPassword']);
            $loginUser->setMail($_SESSION['loginMail']);
            $loginUser->setRole($_SESSION['loginRole']);
        }
        $this->registry->template->userId = array( "name" => "userId",
                                                    "value" => $loginUser->getUserId());
        //Create model object
        $idInquiry = (empty($_GET['id'])) ? 0 : $_GET['id'];
        $receptionMail = '';

        if ($idInquiry != ''){
            $inquiryModel = new InquiryEmailModel();
            $inquiryInfo = $inquiryModel->getInquiryInfo($idInquiry);
            $receptionMail = $inquiryInfo->getReceptionMail();
        }

        //Set list user to template
        $this->registry->template->inquiryType = array( "name" => "inquiryType",
                                                      "value" => $idInquiry);
        $this->registry->template->receptionMail = array( "name" => "receptionMail",
                                                      "value" => $receptionMail);

        $this->registry->template->id = array( "name" => "id",
                                                      "value" => $idInquiry);
        /* Load the login template. */
        $this->registry->template->show('inquiryDetail');
    }

    public function getInquiry(){
        $request = json_decode(file_get_contents('php://input'), true);
        $id = $request['inquiry'];
        $inquiryModel = new InquiryEmailModel();
        $inquiryInfo =$inquiryModel->getInquiryInfo($id);        
        $email = '';
        $id = '0';
        if (!empty($inquiryInfo)){
            $email = $inquiryInfo->getReceptionMail();
            $id = $inquiryInfo->getId();
        }
        echo json_encode(array("email"=>$email, 'id' => $id));
    }

    public function update(){
        $request = json_decode(file_get_contents('php://input'), true);
        $id = $request['id'];
        $currentUser = $request['currentUser'];
        $mail = $request['mail'];
        $inquiry = (int)$request['inquiry'];
        $inquiryList = array(
            1 => 'IT制作やプロジェクトに関するご相談',
            2 => '業務効率化に関するご相談',
            3 => 'その他のご相談',
            4 => '資料請求（PmSQETs）',
            5 => '資料請求（SGS）',
            6 => 'パートナーについて',
            7 => '採用について',
            8 => 'その他'
        );
        $inquiryModel = new InquiryEmailModel();
        $contact =$inquiryModel->updateInquiry($id, $currentUser, $inquiryList[$inquiry], $mail);
        echo json_encode(array("result"=>$contact));
    }
}

?>
