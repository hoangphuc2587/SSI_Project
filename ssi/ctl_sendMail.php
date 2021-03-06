<?php
    include 'model/mdl_contact.php';
    include 'model/mdl_contactHistory.php';
    $contactModel = new ContactModel();
    $contactHistoryModel = new ContactHistoryModel();
    if (isset($_POST['submit']))
    {
        $name=htmlspecialchars($_POST['name'], ENT_QUOTES);
        $company_name=htmlspecialchars($_POST['company-name'], ENT_QUOTES);
        $company_url=htmlspecialchars($_POST['company-url'], ENT_QUOTES);
        $code = $_POST['code'];
        $code02 = $_POST['code02'];
        $prefectures = htmlspecialchars($_POST['state'], ENT_QUOTES);
        $city = htmlspecialchars($_POST['city'], ENT_QUOTES);
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
        $phone = $_POST['phone'];
        $email= $_POST['email'];
        $fax = $_POST['fax'];
        $mobile_number = $_POST['phoneRequest'];
        $inquiry = $_POST['inquiry'];
        $content= htmlspecialchars($_POST['content'], ENT_QUOTES);
        //check spam
        $strErrName = "お名前が無効です。再入力してください。";
        $strErrCompanyName = "会社名が無効です。再入力してください。";
        $strErrAddress = "ご住所が無効です。再入力してください。";
        $strErrMobileNum = "ご担当者様携帯番号が無効です。再入力してください。";
        $strErrContent = "お問い合わせ内容が無効です。再入力してください。";
        if(checkInputIncludeBadString($name) == true)
        {
            echo  "<script>
                alert('".$strErrName."'); 
                window.history.go(-1);
            </script>";

        }else if( checkInputIncludeBadString($company_name) == true){
            echo  "<script>
                alert('".$strErrCompanyName."'); 
                window.history.go(-1);
            </script>";
        }else if( checkInputIncludeBadString($address) == true || 
            checkInputIncludeBadString($prefectures) == true ||
            checkInputIncludeBadString($city) == true){
            echo  "<script>
                alert('".$strErrAddress."'); 
                window.history.go(-1);
            </script>";    
        }else if( checkInputIncludeBadString($mobile_number) == true){
            echo  "<script>
                alert('".$strErrMobileNum."'); 
                window.history.go(-1);
            </script>";
        
        }else if( checkInputIncludeBadString($content) == true){
            echo  "<script>
                alert('".$strErrContent."'); 
                window.history.go(-1);
            </script>";
        
        }//end check spam
        else{
            if ( isset($_POST['recaptcha_response'])) {

                // Build POST request:
                $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptcha_secret = '6LfG38wZAAAAACjnTlZLBzhHqX-cT17fN0pkXZ0E';
                $recaptcha_response = $_POST['recaptcha_response'];
              //  var_dump($recaptcha_response);die;

                // Make and decode POST request:
                $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                $recaptcha = json_decode($recaptcha);
               // $recaptcha->score = 0.2;

                // Take action based on the score returned:
                if ($recaptcha->success == true && $recaptcha->score >= 0.5) {
                    // Verified - send email
                    // save contact to database
                    $postal_code= $code."".$code02;
                   // $contactHistoryModel->addNewContactHistory($company_name, $name,$postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content);

                    // send mail
                    $sendMail = $contactModel->sendContactMailToAdmin($company_name, $name, $company_url, $postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content);
                    $sendMail2 = $contactModel->sendContactMailToUser($company_name, $name, $company_url, $postal_code, $prefectures, $city, $address,  $phone, $email, $fax, $mobile_number, $inquiry, $content);

                    ob_start();
                    header('Location: complete');
                    exit();
                    // if ($sendMail==1) {
                    //     ob_start();
                    //     header('Location: thankyou.php');
                    //     exit();
                    // }
                    // else{
                    //     echo
                    //     "<script>
                    //         alert('some error');
                    //         window.history.go(-1);
                    //     </script>";
                    // }
                } else {
                       echo  "<script>
                             alert('入力内容に不備や不正が御座いましたので、再度ご確認下さい。');
                             window.history.go(-1);
                         </script>";
                    // Not verified - show form error
                }

            }

        }   
    }
function checkInputIncludeBadString($str){
    if (substr_count($str, 'http://') > 0 || substr_count($str, 'https://')) {
       return true;
    }
    return false;
}
?>