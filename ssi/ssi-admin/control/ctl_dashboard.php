<?php

Class DashboardController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);
        
        $userLink = "./?rt=userDetail";
        if($loginRole == '1')
        {
            $userLink = "./?rt=loginUserList";
        	
        }
         $loginSession = (empty($_SESSION['loginUserId'])) ? '' : $_SESSION['loginUserId'];

        if($loginSession == '')
        {
            $link = "./?rt=login";
            header("Location: ".$link);
        }
        //Set list user link to template
        $this->registry->template->userLink = array( "name" => "userLink",
                                                      "value" => $userLink);
        /* Load the index template. */
        $this->registry->template->show('dashboard');
    }
}

?>