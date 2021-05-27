<?php
include 'model/mdl_login.php';
include 'model/mdl_inquiryEmail.php';

Class InquiryListController Extends baseController {

    public function index() {
        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);
        //Create model object
        $inquiryModel = new InquiryEmailModel();
        
        //Return array Users
        $listInquiry = array();

        $listInquiry = $inquiryModel->getAllInquiries();
     
        //Set list user to template
        $this->registry->template->listInquiry = array( "name" => "listInquiry",
                                                      "value" => $listInquiry);
        /* Load the login template. */
        $this->registry->template->show('listInquiry');
    }

    public function delete() {
        $loginUser = new MLogin();
        if($_SESSION["loginUserId"] != null)
        {
            $loginUser->setUserId($_SESSION["loginUserId"] );
            $loginUser->setPassword($_SESSION['loginPassword']);
            $loginUser->setMail($_SESSION['loginMail']);
            $loginUser->setRole($_SESSION['loginRole']);
        }
        $id = $_GET['id'];
        $inquiryModel = new InquiryEmailModel();
        $news = $inquiryModel->deleteInquiry($id, $loginUser->getUserId());
        $link = "./?rt=inquiryList";

        header("Location: " . $link);
    }
}

?>
