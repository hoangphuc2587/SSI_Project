<?php
Class MContact {
	private $__id;
	private $__receptionMail;
	private $__autoMailContent;
    private $__autoMailContentAdmin;
	private $__updateDate;
	private $__updateUser;
	//GET
	public function getId(){
       return $this->__id;
    }
    public function getReceptionMail(){
       return $this->__receptionMail;
    }
    public function getAutoMailContent(){
       return $this->__autoMailContent;
    }
    public function getAutoMailContentAdmin(){
       return $this->__autoMailContentAdmin;
    }
    public function getUpdateDate(){
       return $this->__updateDate;
    }
    public function getUpdateUser(){
       return $this->__updateUser;
    }
    //SET
    public function setId($id){
        $this->__id = $id;
    }
    public function setReceptionMail($receptionMail){
        $this->__receptionMail = $receptionMail;
    }
    public function setAutoMailContent($autoMailContent){
        $this->__autoMailContent = $autoMailContent;
    }
    public function setAutoMailContentAdmin($autoMailContentAdmin){
        $this->__autoMailContentAdmin = $autoMailContentAdmin;
    }    
    public function setUpdateDate($updateDate){
        $this->__updateDate = $updateDate;
    }
    public function setUpdateUser($updateUser){
        $this->__updateUser = $updateUser;
    }
}
?>