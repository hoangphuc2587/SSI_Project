<?php
    include 'model/mdl_contact.php';

    $contactModel = new ContactModel();
    if (isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $company_name=$_POST['company-name'];
        $company_url=$_POST['company-url'];
        $code = $_POST['code'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email= $_POST['email'];
        $fax = $_POST['fax'];
        $mobile_number = $_POST['mobile-number'];
        $content= $_POST['content'];
        $maker="";
        if (isset($_POST['maker'])) {
            $maker="<br>機械ID: ".$_POST['maker'];
        }
        if ($_FILES['image1']['name']!="") {
            $img1 = $_FILES['image1']['name'];
            $tmpimg1 = $_FILES['image1']['tmp_name'];
        }else{
            $img1=""; $tmpimg1="";
        }
        if ($_FILES['image2']['name']!="") {
            $img2 = $_FILES['image2']['name'];
            $tmpimg2 = $_FILES['image2']['tmp_name'];}
        else{$img2=""; $tmpimg2="";}

        if ($_FILES['image3']['name']!="") {
            $img3 = $_FILES['image3']['name'];
            $tmpimg3 = $_FILES['image3']['tmp_name'];
        }else{$img3=""; $tmpimg3="";}

        $sendMail = $contactModel->sendContactMailToAdmin($name, $company_name, $company_url, $code, $state, $city, $address, $phone, $email, $fax, $mobile_number, $maker, $content, $img1, $tmpimg1, $img2, $tmpimg2, $img3, $tmpimg3);
        $sendMail2 = $contactModel->sendContactMailToUser($name, $company_name, $company_url, $code, $state, $city, $address, $phone, $email, $fax, $mobile_number, $maker, $content, $img1, $tmpimg1, $img2, $tmpimg2, $img3, $tmpimg3);
        if ($sendMail==1) {
            //$result=1;
            header("Location: ./completion.php");
            exit;
        }
        else{
            //$result=0;
        }
    }
?>
