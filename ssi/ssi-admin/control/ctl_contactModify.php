<?php
include 'model/mdl_contact.php';
include 'model/mdl_login.php';
Class ContactModifyController Extends baseController {

    public function index() {
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
 
        $contactModel = new ContactModel();

        $contact = $contactModel->getContact();
            //Set data[] to template
        $this->registry->template->receptionMail = array( "name" => "receptionMail",
                                                      "value" => $contact->getReceptionMail());

        $this->registry->template->contentMail = array( "name" => "contentMail",
                                                      "value" => $contact->getAutoMailContent());
													  
        $this->registry->template->contentMailAdmin = array( "name" => "contentMailAdmin",
                                                      "value" => '');													  
        $this->registry->template->id = array( "name" => "id",
                                                      "value" => $contact->getId());

        $this->registry->template->show('contact');
    }
    public function update(){
        $request = json_decode(file_get_contents('php://input'), true);
        $id = $request['id'];
        $currentUser = $request['currentUser'];
        $mail = $request['mail'];
        $contentMail = $request['contentMail'];
        $contactModel = new ContactModel();
        $contact =$contactModel->editContact($id, $currentUser, $mail, $contentMail);
        echo json_encode(array("result"=>$contact));
    }
    public function add(){
        $request = json_decode(file_get_contents('php://input'), true);
        $currentUser = $request['currentUser'];
        $mail = $request['mail'];
        $contentMail = $request['contentMail'];
        $contactModel = new ContactModel();
        $contact =$contactModel->addContact($currentUser, $mail, $contentMail);
        echo json_encode(array("result"=>$contact));
    }
}
?>
