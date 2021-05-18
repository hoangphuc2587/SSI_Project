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

}
?>