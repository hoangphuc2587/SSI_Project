<?php
Class TInquiryEmail{
	private $__id;	
	private $__inquiryType;
    private $__receptionMail;
	private $__updateDate;
	private $__updateUser;
	//GET
	public function getId(){
       return $this->__id;
    }
    public function getInquiryType(){
       return $this->__inquiryType;
    }
    public function getReceptionMail(){
       return $this->__receptionMail;
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
    public function setInquiryType($inquiryType){
        $this->__inquiryType = $inquiryType;
    }    
    public function setReceptionMail($receptionMail){
        $this->__receptionMail = $receptionMail;
    }
    public function setUpdateDate($updateDate){
        $this->__updateDate = $updateDate;
    }
    public function setUpdateUser($updateUser){
        $this->__updateUser = $updateUser;
    }
}
?>