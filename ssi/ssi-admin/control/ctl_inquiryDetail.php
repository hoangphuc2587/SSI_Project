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
        $inquiryType = '';

        if ($idInquiry != ''){
            $inquiryModel = new InquiryEmailModel();
            
            $inquiryInfo = $inquiryModel->getInquiryInfo($idInquiry);
            $receptionMail = $inquiryInfo->getReceptionMail();
            $inquiryType = $inquiryInfo->getInquiryType();
        }

        //Set list user to template
        $this->registry->template->inquiryType = array( "name" => "inquiryType",
                                                      "value" => $inquiryType);
        $this->registry->template->receptionMail = array( "name" => "receptionMail",
                                                      "value" => $receptionMail);

        $this->registry->template->id = array( "name" => "id",
                                                      "value" => $idInquiry);
        /* Load the login template. */
        $this->registry->template->show('inquiryDetail');
    }

    public function update(){
        $request = json_decode(file_get_contents('php://input'), true);
        $id = $request['id'];
        $currentUser = $request['currentUser'];
        $mail = $request['mail'];
        $inquiry = $request['inquiry'];
        $inquiryModel = new InquiryEmailModel();
        $contact =$inquiryModel->updateInquiry($id, $currentUser, $inquiry, $mail);
        echo json_encode(array("result"=>$contact));
    }
}

?>
