<?php
include 'classes/TInquiryEmail.php';

Class InquiryEmailModel Extends baseModel{


	/*ユーザー一覧を取得*/
	public function getAllInquiries(){

		$listInquiry = null;		
		$query = "SELECT * FROM t_inquiry_email";
	    $result = $this->db->query($query);
	    if($result['success'] == true)
	    {
	    	$listInquiry = array();
	    	$data =  $result['rows'];
	    	foreach ($data as $row) {
			    $inquiry = new TInquiryEmail();
			    $inquiry->setId($row['id']);
			    $inquiry->setInquiryType($row['inquiry_type']);
			    $inquiry->setReceptionMail($row['reception_mail']);
			    array_push($listInquiry, $inquiry);
			}
	    }
        return $listInquiry;
	}

	 public function getInquiryInfo($id) {
        $inquiry = null;
	    $result = $this->db->query("SELECT * FROM t_inquiry_email WHERE id =".$id);
	    if($result['success'] == true && $result['count'] > 0)
	    {
	    	$data =  $result['rows'][0];
	    	$inquiry = new TInquiryEmail();
		    $inquiry->setId($data['id']);
		    $inquiry->setInquiryType($data['inquiry_type']);
		    $inquiry->setReceptionMail($data['reception_mail']);
	    }
        return $inquiry;
    }

    /*ユーザー存在チェック*/
    public function isExistsUser($id) {

    	$isExist = false;
    	
	    // $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM m_login WHERE user_id ='".$userId."' AND delete_flag = 0");
	    $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM t_inquiry_email WHERE id ='".$id."'");
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

    public function updateInquiry($id, $currentUser, $inquiry, $mail) {
    	if ($this->isExistsUser($id)){
    		$result = $this->db->update("UPDATE t_inquiry_email SET reception_mail='$mail', inquiry_type='$inquiry', update_date=NOW(),update_user='$currentUser' WHERE id='$id'");
    	}else{
            $result = $this->db->update("INSERT INTO t_inquiry_email (`reception_mail`, `inquiry_type` , `update_user`) VALUES ('$mail','$inquiry','$currentUser')");    		
    	}

    }

}
?>