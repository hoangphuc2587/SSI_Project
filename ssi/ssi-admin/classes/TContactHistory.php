<?php
Class TContactHistory {
    private $__id;
    private $__companyName;
    private $__guestName;
    private $__postalCode;
    private $__prefectures;
    private $__city;
    private $__address;
    private $__phone;
    private $__email;
    private $__fax;
    private $__phoneContact;
    private $__inquiryItem;
    private $__content;
    private $__createDate;
    //GET
    public function getId(){
       return $this->__id;
    }
    public function getCompanyName(){
       return $this->__companyName;
    }
    public function getGuestName(){
       return $this->__guestName;
    }
    public function getPostalCode(){
       return $this->__postalCode;
    }
    public function getPrefectures(){
       return $this->__prefectures;
    }
    public function getCity(){
       return $this->__city;
    }
    public function getAddress(){
       return $this->__address;
    }
    public function getPhone(){
       return $this->__phone;
    }
    public function getEmail(){
       return $this->__email;
    }
    public function getFax(){
       return $this->__fax;
    }
    public function getPhoneContact(){
       return $this->__phoneContact;
    }
    public function getInquiryItem(){
       return $this->__inquiryItem;
    }
    public function getContent(){
       return $this->__content;
    }
    public function getCreateDate(){
       return $this->__createDate;
    } 
    //SET
    public function setId($id){
        $this->__id = $id;
    }
    public function setCompanyName($companyName){
        $this->__companyName = $companyName;
    }
    public function setGuestName($guestName){
        $this->__guestName = $guestName;
    }
    public function setPostalCode($postalCode){
        $this->__postalCode = $postalCode;
    }
    public function setPrefectures($prefectures){
        $this->__prefectures = $prefectures;
    }
    public function setCity($city){
        $this->__city = $city;
    }
    public function setAddress($address){
        $this->__address = $address;
    }
    public function setPhone($phone){
        $this->__phone = $phone;
    }
    public function setEmail($email){
        $this->__email = $email;
    }
    public function setFax($fax){
        $this->__fax = $fax;
    }
    public function setPhoneContact($phoneContact){
        $this->__phoneContact = $phoneContact;
    }
    public function setInquiryItem($inquiryItem){
        $this->__inquiryItem = $inquiryItem;
    }
    public function setContent($content){
        $this->__content = $content;
    }
    public function setCreateDate($createDate){
        $this->__createDate = $createDate;
    }
}
?>