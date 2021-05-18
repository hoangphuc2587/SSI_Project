<?php

Class IndexController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginSession = (empty($_SESSION['loginUserId'])) ? '' : $_SESSION['loginUserId'];

        if($loginSession != '')
        {
            $link = "./?rt=dashboard";
            header("Location: ".$link);
        }

        /* Load the index template. */
        $this->registry->template->show('login');
    }
}

?>
