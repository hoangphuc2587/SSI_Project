<?php
include_once 'model/baseModel.php';
include 'classes/TContactHistory.php';
include 'directory/directory.php';

Class ContactHistoryModel Extends baseModel{

    public function addNewContactHistory($company_name, $guest_name,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content) {
        $company_name = str_replace("'","\'",$company_name);
        $guest_name = str_replace("'","\'",$guest_name);
        $postal_code = str_replace("'","\'",$postal_code);
        $prefectures = str_replace("'","\'",$prefectures);
        $city = str_replace("'","\'",$city);
        $address = str_replace("'","\'",$address);
        $phone = str_replace("'","\'",$phone);
        $email = str_replace("'","\'",$email);
        $fax = str_replace("'","\'",$fax);
        $mobile_number = str_replace("'","\'",$mobile_number);
        $inquiry = str_replace("'","\'",$inquiry);
        $content = str_replace("'","\'",$content);

        $sql = "INSERT INTO t_contact_history ( `company_name`, `guest_name`, `postal_code`, `prefectures`, `city`,`address`,`phone`, `email`, `fax`, `phone_contact`, `inquiry_item`, `content`, `create_date` ) VALUES ('$company_name','$guest_name','$postal_code' , '$prefectures','$city', '$address', '$phone', '$email', '$fax', '$mobile_number', '$inquiry', '$content', NOW())";
        $result = $this->db->query($sql);

        if($result['success']==1) {
                return 1;
        } else {
            return 0;
        }
    }
}
