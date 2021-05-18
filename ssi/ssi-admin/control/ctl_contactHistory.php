<?php
include 'model/mdl_contactHistory.php';
include 'model/mdl_login.php';

Class ContactHistoryController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        
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
        $contactHistoryModel = new ContactHistoryModel();
        
        $current_page=isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $total_records = $contactHistoryModel->countPage();
        if ($total_records !=0) {
            
            $total_page = $contactHistoryModel->getTotalPage($limit);
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            $record_skip = ($current_page * $limit) - $limit;
            $record_skip_page = 1; 
            $nextpage = $current_page + 1;
            $previouspage = $current_page - 1;
        }else{
            $previouspage=0;
            $nextpage=0;
            $record_skip=0;
            $total_page=0;
            $record_skip_page=0;
        }
        $listContact = array();
        $listContact = $contactHistoryModel->getListContact($record_skip, $limit);

        

        $this->registry->template->contact = array( "name" => "contact",
          "value" => $listContact);
        $this->registry->template->total_page = array( "name" => "total_page", 
           "value" => $total_page);
        $this->registry->template->limit = array( "name" => "limit", 
           "value" => $limit);
        $this->registry->template->total_records = array( "name" => "total_records", 
           "value" => $total_records);
        $this->registry->template->current_page = array( "name" => "current_page",
          "value" => $current_page);
        $this->registry->template->record_skip_page = array( "name" => "record_skip_page",
          "value" => $record_skip_page);
        $this->registry->template->previouspage = array( "name" => "previouspage",
          "value" => $previouspage);
        $this->registry->template->nextpage = array( "name" => "nextpage",
          "value" => $nextpage);
        $this->registry->template->class = array( "name" => "class",
          "value" => "active");

        $loginSession = (empty($_SESSION['loginUserId'])) ? '' : $_SESSION['loginUserId'];

        if($loginSession == '')
        {
            $link = "./?rt=login";
            header("Location: ".$link);
        }
        
        /* Load the index template. */
        $this->registry->template->show('listContactHistory');
    }

}
?>
