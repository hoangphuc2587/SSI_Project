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
    private $__mobile;
    private $__content;
    private $__createDate;
    private $__machineId;
    private $__image;
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
    public function getMobile(){
       return $this->__mobile;
    }
    public function getContent(){
       return $this->__content;
    }
    public function getCreateDate(){
       return $this->__createDate;
    }
    public function getMachineId(){
       return $this->__machineId;
    }
    public function getImage(){
       return $this->__image;
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
    public function setMobile($mobile){
        $this->__mobile = $mobile;
    }
    public function setContent($content){
        $this->__content = $content;
    }
    public function setCreateDate($createDate){
        $this->__createDate = $createDate;
    }
    public function setMachineId($machineId){
        $this->__machineId = $machineId;
    }
    public function setImage($image){
        $this->__image = $image;
    }
}
?>