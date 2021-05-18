<?php
include 'model/mdl_login.php';

Class LoginController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        /* get POST/GET value*/
        //$userName = (empty($_POST['inputUserId'])) ? '' : $_POST['inputUserId'];
        $param = (empty($_GET['logout'])) ? '' : $_GET['logout'];
        if($param != ''){
            session_unset();
            session_destroy();
        }

        $loginSession = (empty($_SESSION['loginUserId'])) ? '' : $_SESSION['loginUserId'];

        if($loginSession != '')
        {
            $link = "./?rt=dashboard";
            header("Location: ".$link);
        }
    
        /* Load the login template. */
        $this->registry->template->show('login');
    }

    public function login()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        
        //Get post value from ajax
        $userId = $request['inputUserId'];
        $password = $request['inputPassword'];
        $_SESSION["login"] = $userId ;
        //Create model object
        $loginModel = new LoginModel();
        
        //入力したログイン情報からユーザ情報を取得
        $loginUser = $loginModel->getLoginUserInfo($userId, $password);
        $resultLogin = "ERR";
        if($loginUser != null){
            $_SESSION["loginUserId"] = $loginUser->getUserId();
            $_SESSION["loginPassword"] = $loginUser->getPassword();
            $_SESSION["loginMail"] = $loginUser->getMail();
            $_SESSION["loginRole"] = $loginUser->getRole();
            $resultLogin = "OK";
        }
        
        echo json_encode(array("result"=>$resultLogin));
        
    }
}

?>
