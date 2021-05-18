<?php
include 'classes/TContactHistory.php';

Class ContactHistoryModel Extends baseModel{

    public function getListContact($record_skip, $limit) {

        $listContact = array();
        $sql = "SELECT * FROM t_contact_history ORDER BY create_date DESC LIMIT " . $record_skip . "," . $limit . "";

        $result = $this->db->query($sql);
        
        if($result['success'] == true)
        {
            $data =  $result['rows'];
            foreach ($data as $row) {
                $contactHistory = new TContactHistory();
                $contactHistory->setId($row['id']);
                $contactHistory->setCompanyName($row['company_name']);
                $contactHistory->setGuestName($row['guest_name']);
                $contactHistory->setPostalCode($row['postal_code']);
                $contactHistory->setPrefectures($row['prefectures']);
                $contactHistory->setCity($row['city']);
                $contactHistory->setAddress($row['address']);
                $contactHistory->setPhone($row['phone']);
                $contactHistory->setEmail($row['email']);
                $contactHistory->setFax($row['fax']);
                $contactHistory->setPhoneContact($row['phone_contact']);
                $contactHistory->setInquiryItem($row['inquiry_item']);
                $contactHistory->setContent($row['content']);
                $contactHistory->setCreateDate($row['create_date']);

                array_push($listContact, $contactHistory);
            }
            
        }else{
            echo "An error has occurred: " . $result['error'] ."<br />";
        }
        return $listContact;
    }
    
    public function getTotalPage($limit) {
        $total_records = $this->countPage();

        $total_page = ceil($total_records / $limit);
        return $total_page;
    }
    public function countPage() {

        $result = $this->db->query("SELECT COUNT(*) AS TOTAL FROM t_contact_history ");
        if($result['success'] == true && $result['count'] > 0)
        {
            $data =  $result['rows'][0];
            $count = $data['TOTAL'];
        }
        return $count;
    }

}
?>