<?php

Class MLogin {

    private $__userId;
    private $__password;
    private $__mail;
	private $__role;
	private $__createDate;
	private $__createUser;
	private $__updateDate;
	private $__updateUser;
	private $__deleteDate;
	private $__deleteUser;
	private $__deleteFlag;

    // GET
    public function getUserId(){
       return $this->__userId;
    }
     
    public function getPassword(){
        return $this->__password;
    }

    public function getMail(){
        return $this->__mail;
    }

	public function getRole(){
        return $this->__role;
    }

    public function getCreateDate(){
        return $this->__createDate;
    }

    public function getCreateUser(){
        return $this->__createUser;
    }

    public function getUpdateDate(){
        return $this->__updateDate;
    }

    public function getUpdateUser(){
        return $this->__updateUser;
    }

    public function getDeleteDate(){
        return $this->__deleteDate;
    }

    public function getDeleteUser(){
        return $this->__deleteUser;
    }

    public function getDeleteFlag(){
        return $this->__deleteFlag;
    }

    // SET
    public function setUserId($userId){
        $this->__userId = $userId;
    }
     
    public function setPassword($password){
        $this->__password = $password;
    }

    public function setMail($mail){
        $this->__mail = $mail;
    }

    public function setRole($role){
        $this->__role = $role;
    }

    public function setCreateDate($createDate){
        $this->__createDate = $createDate;
    }

    public function setCreateUser($createUser){
        $this->__createUser = $createUser;
    }

    public function setUpdateDate($updateDate){
        $this->__updateDate = $updateDate;
    }

    public function setUpdateUser($updateUser){
        $this->__updateUser = $updateUser;
    }

    public function setDeleteDate($deleteDate){
        $this->__deleteDate = $deleteDate;
    }

    public function setDeleteUser($deleteUser){
        $this->__deleteUser = $deleteUser;
    }

    public function setDeleteFlag($deleteFlag){
        $this->__deleteFlag = $deleteFlag;
    }
     
}

?>
