<?php
include 'model/mdl_login.php';

Class UserDetailController Extends baseController {

    public function index() {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        if($loginRole != '1' && isset($_GET['userId']))
        {
            $userLink = "./?rt=userDetail&loginUserEdit=true";
            header("Location: ".$userLink);
        }
        if($loginRole != '1' && !isset($_GET['loginUserEdit']))
        {
            $userLink = "./?rt=userDetail&loginUserEdit=true";
            header("Location: ".$userLink);
        }
        //Set list user to template
        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);

        /* get POST/GET value*/
        $userId = (empty($_GET['userId'])) ? '' : $_GET['userId'];
        $loginUserEdit = (empty($_GET['loginUserEdit'])) ? '' : $_GET['loginUserEdit'];
        $editMode = "";
        if($userId != ''){
            $editMode = "ADMIN_EDIT";
        }else if($loginUserEdit != ''){
            $editMode = "LOGIN_EDIT";
        }

        //Create model object
        $loginModel = new LoginModel();
        $userInfo = new MLogin();
        
        if($userId != ''){ //Admin edit user
            $userInfo = $loginModel->getUserInfo($userId);
        }
        if($loginUserEdit != ''){ //Login user edit 
            $userInfo = $loginModel->getUserInfo($_SESSION['loginUserId']);
        }
        $loginSession = (empty($_SESSION['loginUserId'])) ? '' : $_SESSION['loginUserId'];

        if($loginSession == '')
        {
            $link = "./?rt=login";
            header("Location: ".$link);
        }
     
        //Set variables to template
        $this->registry->template->loginUserEdit = array( "name" => "loginUserEdit",
                                                      "value" => $loginUserEdit);
        
        $this->registry->template->userInfo = array( "name" => "userInfo",
                                                      "value" => $userInfo);

        $this->registry->template->loginRole = array( "name" => "loginRole",
                                                      "value" => $loginRole);
        $this->registry->template->editMode = array( "name" => "editMode",
                                                      "value" => $editMode);
        /* Load the login template. */
        $this->registry->template->show('userDetail');
    }

    public function updateUser(){
        $request = json_decode(file_get_contents('php://input'), true);

        if(empty($_SESSION["loginUserId"]))
        {
            echo json_encode(array("result"=>"NOLOGIN"));
        }else{
            //Get post value from ajax
            $userId = $request['userId'];
            $oldUserId = $request['oldUserId']; 
            $oldMail = $request['oldMail'];
            $role = $request['role'];
            $mail = $request['mail'];
            $password = $request['password'];
            $ckbSendMail = $request['ckbSendMail'];
            $editMode = $request['editMode'];
            //Create model object
            $loginModel = new LoginModel();
            
            $updateUser = new MLogin();
            $updateUser->setUserId($userId);
            $updateUser->setRole($role);
            $updateUser->setPassword($password);
            $updateUser->setMail($mail);
            $updateUser->setUpdateDate(date('Y-m-d H:i:s'));
            $updateUser->setUpdateUser($_SESSION["loginUserId"]);

            try{
                //ユーザー情報更新
                $return = "1";
                $updateResult = $loginModel->updateUserInfo($oldUserId, $updateUser,$oldMail);
                error_log("updateResult: ".$updateResult);

                if($updateResult == "1"){
                    $return = "1";
                    if($ckbSendMail == "1"){

                        //通知メール送信
                        $loginMail= $_SESSION["loginMail"];
                        error_log("loginMail: ".$loginMail." editMode:". $editMode);
                        $sendMail = $loginModel->sendMailUpdateUser($updateUser, $_SESSION["loginMail"], $editMode);
                        if($sendMail==1){
                            $return = "1"; //ユーザー更新とメール送信が成功
                        }else{
                            $return = "-3"; //メール送信が失敗
                        }
                    }
                }else if($updateResult == "-1"){
                    $return = $updateResult;
                }else{
                    $return = "-2"; //ユーザー更新が失敗
                }
                echo json_encode(array("result"=>"LOGINOK", "return"=>$return)); 
                        
            } 
            catch(Throwable $e) {
                // $trace = $e->getTrace();
                // echo json_encode(array("result"=>"LOGINOK", "return"=>$e->getMessage()));
                //error_log("Error: ".$e->getMessage(), 3, "obashokai-admin/log/error.log");
            }
        }      
    }

    public function insertUser(){
        $request = json_decode(file_get_contents('php://input'), true);

        if(empty($_SESSION["loginUserId"]))
        {
            echo json_encode(array("result"=>"NOLOGIN"));
        }else{
            //Get post value from ajax
            $userId = $request['userId'];
            $role = $request['role'];
            $mail = $request['mail'];
            $password = $request['password'];
            $ckbSendMail = $request['ckbSendMail'];

            //Create model object
            $loginModel = new LoginModel();
            
            $insertUser = new MLogin();
            $insertUser->setUserId($userId);
            $insertUser->setRole($role);
            $insertUser->setPassword($password);
            $insertUser->setMail($mail);
            $insertUser->setCreateDate(date('Y-m-d H:i:s'));
            $insertUser->setCreateUser($_SESSION["loginUserId"]);

            try{
                //ユーザー情報登録
                $return = "1";
                $insertResult = $loginModel->insertUserInfo($insertUser, $_SESSION["loginUserId"]);

                if($insertResult == "1"){
                    $return = "1";
                    $sendMailAdmin = $loginModel->sendMailRegistionAdmin($insertUser, $_SESSION["loginMail"]);
                    error_log("ckbSendMail".$ckbSendMail);
                    if($ckbSendMail == "1"){
                        //通知メール送信
                        $sendMail = $loginModel->sendMailRegistionUser($insertUser, $_SESSION["loginMail"]);
                        if($sendMail){
                            $return = "1"; //ユーザー登録とメール送信が成功
                        }else{
                            $return = "-3"; //メール送信が失敗
                        }
                    }
                }elseif($insertResult == "-1"){
                    $return = $insertResult;
                }else{
                    $return = "-2"; //ユーザー登録が失敗
                }
                echo json_encode(array("result"=>"LOGINOK", "return"=>$return)); 
                  // error_log("return gfb= ".$return);      
                  // error_log("return dfgbc = ".json_encode(array("result"=>"LOGINOK", "return"=>$return)));      
            } 
            catch(Throwable $e) {
                $trace = $e->getTrace();
                echo json_encode(array("result"=>"LOGINOK", "return"=>$e->getMessage()));
            }
        }
    }
}

?>
