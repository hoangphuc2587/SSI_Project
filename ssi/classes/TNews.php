<?php
class TNews
{
    private $__id;
    private $__title;
    private $__content;
    private $__image;
    private $__displayFlag;
    private $__createUser;
    private $__createDate;
    private $__updateUser;
    private $__updateDate;
    private $__displayDate;
    private $__deleteFlag;
    //GET
    public function getId()
    {
        return $this->__id;
    }
    public function getTitle()
    {
        return $this->__title;
    }
    public function getContent()
    {
        return $this->__content;
    }
    public function getImage()
    {
        return $this->__image;
    }
    public function getDisplayFlag()
    {
        return $this->__displayFlag;
    }
    public function getCreateUser()
    {
        return $this->__createUser;
    }
    public function getCreateDate()
    {
        return $this->__createDate;
    }
    public function getUpdateUser()
    {
        return $this->__updateUser;
    }
    public function getUpdateDate()
    {
        return $this->__updateDate;
    }
    public function getDisplayDate()
    {
        return $this->__displayDate;
    }
    public function getDeleteFlag()
    {
        return $this->__deleteFlag;
    }
    //SET
    public function setId($id)
    {
        $this->__id = $id;
    }
    public function setTitle($title)
    {
        $this->__title = $title;
    }
    public function setContent($content)
    {
        $this->__content = $content;
    }
    public function setImage($image)
    {
        $this->__image = $image;
    }
    public function setDisplayFlag($displayFlag)
    {
        $this->__displayFlag = $displayFlag;
    }
    public function setCreateUser($createUser)
    {
        $this->__createUser = $createUser;
    }
    public function setCreateDate($createDate)
    {
        $this->__createDate = $createDate;
    }
    public function setUpdateUser($updateUser)
    {
        $this->__updateUser = $updateUser;
    }
    public function setUpdateDate($updateDate)
    {
        $this->__updateDate = $updateDate;
    }
    public function setDisplayDate($displayDate)
    {
        $this->__displayDate = $displayDate;
    }
    public function setDeleteFlag($deleteFlag)
    {
        $this->__deleteFlag = $deleteFlag;
    }
}
