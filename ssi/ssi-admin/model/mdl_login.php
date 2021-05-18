<?php
include 'classes/MLogin.php';
include 'component/MailHandler.php';

Class LoginModel Extends baseModel{

	/*ログインユーザーの情報を取得*/
    public function getLoginUserInfo($userId, $password) {

    	$loginUser = null;

    	//スペースを消す
    	$password = preg_replace('/\s+/', '', $password);
    	//パスワードを復号する
    	$passEncrypted = $this->encryptPassword($password);
	    $result = $this->db->query("SELECT * FROM m_login WHERE user_id ='".$userId."' 
	    							AND password ='".$passEncrypted."' AND delete_flag = 0");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$loginUser = new MLogin();
			$loginUser->setUserId($data['user_id']);
			$loginUser->setPassword($data['password']);
			$loginUser->setMail($data['mail']);
			$loginUser->setRole($data['role']);
	    }
        return $loginUser;
    }

	/* 暗号化 */
    private function encryptPassword($passwordOrg){
    	$encrypted = '';
		$key = base64_decode("キーをbase64エンコードした文字列");
		$encrypted = openssl_encrypt($passwordOrg, 'aes-256-ecb', $key);
    	return $encrypted;
    }

	/* 復号 */
	private function decryptPassword($passwordEncrypted){
    	$decrypted = '';
		$key = base64_decode("キーをbase64エンコードした文字列");
		$decrypted = openssl_decrypt($passwordEncrypted, 'aes-256-ecb', $key);
    	return $decrypted;
    }

   
	/*ユーザー情報更新*/
    public function updateUserInfo($oldUserId, $userInfo, $oldMail){

    	//ユーザー存在チェック
    	if($oldUserId != $userInfo->getUserId()){
    		$isExist = $this->isExistsUser($userInfo->getUserId());
    		error_log("isExist: ".$isExist);
		    if($isExist){
		    	return -1; // UserIdが存在している
		    }
    	}
    	if($oldMail != $userInfo->getMail()){
		    $isExistMail = $this->isExistsEmailUpdate($userInfo->getMail());
		    if($isExistMail){
		    	error_log("isExistMail: ".$isExistMail);
		    	return -1; // mail exits
		    }
		}
	    
	    $oldUser = $this->getUserInfo($oldUserId);
	    error_log("oldUserId: ".$oldUserId);
	    if($oldUser->getUserId() != $userInfo->getUserId()){
	    	$oldUser->setUserId($userInfo->getUserId());
	    }
	    if($oldUser->getMail() != $userInfo->getMail()){
	    	$oldUser->setMail($userInfo->getMail());
	    }
	    if($oldUser->getRole() != "" && $oldUser->getRole() != $userInfo->getRole()){
	    	$oldUser->setRole($userInfo->getRole());
	    }
	    if($userInfo->getPassword() != ""){
	    	$encryptedNewPass = $this->encryptPassword($userInfo->getPassword());
	    	if($encryptedNewPass != $oldUser->getPassword()){
				$oldUser->setPassword($encryptedNewPass);
	    	}
	    }
	    $oldUser->setUpdateDate($userInfo->getUpdateDate());
	    $oldUser->setUpdateUser($userInfo->getUpdateUser());

	    //ユーザー更新SQL文
	    $updateQuery = "UPDATE m_login SET user_id = '".$oldUser->getUserId()."', password = '".$oldUser->getPassword()."', mail = '".$oldUser->getMail()."', ROLE = '".$oldUser->getRole()."', update_date = '".$oldUser->getUpdateDate()."', update_user = '".$oldUser->getUpdateUser()."' WHERE user_id = '".$oldUserId."'";

	    $updateResult = $this->db->execute($updateQuery);
	    if($updateResult == false){
	    	return -2; //更新が失敗
	    }
	    return 1; //更新が成功
	}

	/*ユーザー登録*/
    public function insertUserInfo($userInfo, $adminId){

    	//ユーザー存在チェック
	    $isExist = $this->isExistsUser($userInfo->getUserId());
	    if($isExist){
	    	return -1; // UserIdが存在している
	    }

	    $isExistMail = $this->isExistsEmail($userInfo->getMail());
	    if($isExistMail){
	    	return -1; // mail exits
	    }
	   
	    $encryptedPassword = $this->encryptPassword($userInfo->getPassword());
	    $userInfo->setPassword($encryptedPassword);
	    //ユーザー登録SQL文
	    $insertQuery = "INSERT INTO m_login (user_id, password, mail, role, create_date, create_user, delete_flag) VALUES('".$userInfo->getUserId()."', '".$userInfo->getPassword()."', '".$userInfo->getMail()."', '".$userInfo->getRole()."', '".$userInfo->getCreateDate()."', '".$userInfo->getCreateUser()."', '0') ";

	    $insertResult = $this->db->execute($insertQuery);
	    if($insertResult == false){
	    	return -2; //登録が失敗
	    }
	    return 1; //登録が成功
	}

	/*ユーザー一覧を取得*/
	public function getAllUsers(){

		$listUser = null;
		// $query = "SELECT * FROM m_login WHERE role <> '1' AND delete_flag = '0' ";
		$query = "SELECT * FROM m_login WHERE delete_flag = '0' ";
	    $result = $this->db->query($query);
	    if($result['success'] == true)
	    {
	    	$listUser = array();
	    	$data =  $result['rows'];
	    	//return $data;
	    	foreach ($data as $row) {
	    		
			    $user = new MLogin();
			    $user->setUserId($row['user_id']);
			    $user->setMail($row['mail']);
			    $role = ($row['role'] == '1') ? 'アドミン' : 'ユーザー';
			    $user->setRole($role);
			    array_push($listUser, $user);
			}
			
	    }
        return $listUser;
	}

	public function updateUserRole($userId, $role) {
    	
    	$updateResult = true;
        //update user role
	    $result = $this->db->execute("UPDATE m_login SET role ='".$role."' WHERE user_id ='".$userId."'");
	    if($result == false)
	    {
	    	$updateResult = false;
	    }
        return $updateResult;
    }

    public function deleteUser($user) {
    	
    	$deleteResult = true;
        //delete user
	    $result = $this->db->execute("UPDATE m_login SET delete_flag ='1' ,
	    								delete_date ='".$user->getDeleteDate()."' ,
	    								delete_user ='".$user->getDeleteUser()."' 
	    							  WHERE user_id ='".$user->getUserId()."'");
	    if($result == false)
	    {
	    	$deleteResult = false;
	    }
        return $deleteResult;
    }

    /*ユーザーの情報を取得*/
    public function getUserInfo($userId) {

    	$userInfo = null;
    	
	    $result = $this->db->query("SELECT * FROM m_login WHERE user_id ='".$userId."' AND delete_flag = 0");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$userInfo = new MLogin();
			$userInfo->setUserId($data['user_id']);
			$userInfo->setPassword($data['password']);
			$userInfo->setMail($data['mail']);
			$userInfo->setRole($data['role']);
	    }
        return $userInfo;
    }

    /*ユーザー存在チェック*/
    public function isExistsUser($userId) {

    	$isExist = false;
    	
	    // $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE user_id ='".$userId."' AND delete_flag = 0");
	    $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE user_id ='".$userId."'");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$count = $data['COUNT_USER'];
	    	if($count != '0'){
	    		$isExist = true;
	    	}
	    }
        return $isExist;
    }
    public function isExistsUserUpdate($userId) {

    	$isExist = false;
    	
	    // $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE user_id ='".$userId."' AND delete_flag = 0");
	    $currentId=$_SESSION["loginUserId"];
	    $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE user_id ='".$userId."'AND user_id NOT LIKE '".$currentId."'");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$count = $data['COUNT_USER'];
	    	if($count != '0'){
	    		$isExist = true;
	    	}
	    }
        return $isExist;
    }

    /*check exist mail*/
    public function isExistsEmail($mail) {

    	$isExist = false;
    	
	    $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE mail ='".$mail."' AND delete_flag = 0");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$count = $data['COUNT_USER'];
	    	if($count != '0'){
	    		$isExist = true;
	    	}
	    }
        return $isExist;
    }
    /*check exist mail*/
    public function isExistsEmailUpdate($mail) {

    	$isExist = false;
    	$currentMail=$_SESSION["loginMail"];
    	error_log("currentMail: ".$currentMail);
	    $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE mail ='".$mail."' AND mail NOT LIKE '".$currentMail."' AND delete_flag = 0");
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$count = $data['COUNT_USER'];
	    	error_log("count: ".$count);
	    	if($count != '0'){
	    		$isExist = true;
	    	}
	    }
	    error_log("isExistMailDDD: ".$isExist);
        return $isExist;
    }
    /*ユーザー情報を変更完了メール送信*/
    public function sendMailUpdateUser($updateUser, $loginMail, $editMode) {

    	$mailHandler = new MailHandler();
    	$mailTo = $updateUser->getMail();
    	$params = array('1'=>$updateUser->getUserId(), '2'=>'変更', '3'=>$updateUser->getUserId(), '4'=>$updateUser->getPassword(), '5'=>$updateUser->getMail());
    	return $mailHandler->sendMailUpdateToUser($params, $mailTo);
    }

    /*ユーザーを登録完了メール送信*/
    public function sendMailRegistionUser($insertUser, $loginMail) {

    	$mailHandler = new MailHandler();

    	// $params = array('1'=>$insertUser->getUserId(), '2'=>'変更', '3'=>$insertUser->getUserId(), '4'=>$this->decryptPassword($insertUser->getPassword()), '5'=>$insertUser->getMail());
    	$params = array('1'=>$insertUser->getUserId(), '2'=>'変更', '3'=>$insertUser->getUserId(), '4'=>$this->decryptPassword($insertUser->getPassword()), '5'=>$insertUser->getMail());
    	$sendMail = $mailHandler->sendAutoMailRegistionToUser($params, $insertUser->getMail());
    	error_log('sendMailRegistionUser'.$sendMail);
    	return 1;
    	// if ($sendMail==1) {
    	// 	return 1;
    	// }
    	// else{
    	// 	return -3;
    	// }
    	
    }
    public function sendMailRegistionAdmin($insertUser, $loginMail) {

    	$mailHandler = new MailHandler();
    	$contact = $this->db->query("SELECT * FROM m_contact");
    	$listContact=$contact['rows']['0']['reception_mail'];
    	$contactMailAdmin=explode(',',$listContact);

    	$params = array('1'=>$insertUser->getUserId(), '2'=>'変更', '3'=>$insertUser->getUserId(), '4'=>$this->decryptPassword($insertUser->getPassword()), '5'=>$insertUser->getMail());
    	$sendMail1 = $mailHandler->sendAutoMailRegistionToAdmin($params, $contactMailAdmin);
    }

}
?>