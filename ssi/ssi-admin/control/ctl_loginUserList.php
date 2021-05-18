<?php
include 'model/mdl_login.php';

Class LoginUserListController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);

        if($loginRole != '1')
        {
            $userLink = "./?rt=userDetail&loginUserEdit=true";
            header("Location: ".$userLink);
        }
        //Create model object
        $loginModel = new LoginModel();
        
        //Return array Users
        $listUser = array();
        $listUser = $loginModel->getAllUsers();
     
        //Set list user to template
        $this->registry->template->listUser = array( "name" => "listUser",
                                                      "value" => $listUser);
        /* Load the login template. */
        $this->registry->template->show('loginUserList');
    }

    public function deleteUser()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        if(empty($_SESSION["loginUserId"]))
        {
            echo json_encode(array("result"=>"NOLOGIN"));
        }else{
            //Get post value from ajax
            $userId = $request['userId'];

            //Create model object
            $loginModel = new LoginModel();
            
            $deleteUser = new MLogin();
            $deleteUser->setUserId($userId);
            $deleteUser->setDeleteDate(date('Y-m-d H:i:s'));
            $deleteUser->setDeleteUser($_SESSION["loginUserId"]);

            $deleteResult = $loginModel->deleteUser($deleteUser);

            echo json_encode(array("result"=>"LOGINOK", "return"=>$deleteResult));
        }        
    }
}

?>
