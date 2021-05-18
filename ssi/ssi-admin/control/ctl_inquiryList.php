<?php
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
}

?>
