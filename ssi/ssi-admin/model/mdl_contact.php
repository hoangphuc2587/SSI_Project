<?php
include 'classes/MContact.php';
Class ContactModel Extends baseModel{
	
    public function getContact() {
    	// $listNews = array();
        //get all users
        $contact = new MContact();
	    $result = $this->db->query("SELECT * FROM m_contact");
	    if($result['success'] == true)
	    {
	    	$data =  $result['rows'];
	    	//return $data;
	    	foreach ($data as $row) {
	    		
			    // $contact = new MContact();
			    $contact->setId($row['id']);
			    $contact->setReceptionMail($row['reception_mail']);
			    $contact->setAutoMailContent($row['auto_mail_content']);
			    $contact->setAutoMailContentAdmin($row['auto_mail_content_admin']);
			    $contact->setUpdateDate($row['update_date']);
			    $contact->setUpdateUser($row['update_user']);
			}
	    }
	    if($result['success'] == false)
	    {
	    	$data =  $result['rows'];
	    	// //return $data;
	    	foreach ($data as $row) {
	    		$txt ="";
			    // $contact = new MContact();
			    $contact->setId($txt);
			    $contact->setReceptionMail($txt);
			    $contact->setAutoMailContent($txt);
			    $contact->setAutoMailContentAdmin($txt);
			    $contact->setUpdateDate($txt);
			    $contact->setUpdateUser($txt);
			}
	    }
	    // else{
	    // 	echo "An error has occurred: " . $result['error'] ."<br />";
	    // }
        return $contact;
    }

    public function editContact($id, $currentUser, $mail, $contentMail, $contentMailAdmin) {
        $result = $this->db->update("UPDATE m_contact SET reception_mail='$mail', auto_mail_content='$contentMail', auto_mail_content_admin='$contentMailAdmin', update_date=NOW(),update_user='$currentUser' WHERE id='$id'");
    }
    public function addContact($currentUser, $mail, $contentMail, $contentMailAdmin) {
        $result = $this->db->update("INSERT INTO m_contact (`reception_mail`, `auto_mail_content`, `auto_mail_content_admin` , `update_user`) VALUES ('$mail','$contentMail','$contentMailAdmin','$currentUser')");
    	// return $result;
    }
}
?>
