<?php
$fname  = $_POST['fname'] ?? '';
$mname  = $_POST['mname'] ?? '';
$lname  = $_POST['lname'] ?? '';
$bdate  = $_POST['bdate'] ?? '';
$gender = $_POST['gender'] ?? '';
function validatename($name){
        $regexNames = "/^[a-zA-Z]+$/";

        if(trim($name) === ""){
            return [
                'fieldName'=> 'fName',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else if (!preg_match($regexNames, $name)){
            return[
                'fieldName'=> 'fName',
                'error' => "Invalid Format",
                'isValid' => false
            ];
        }else{
            return[
                'fieldName'=> 'fName',
                "error" => '',
                'isValid' => true
            ];
        }

}

function validateMname($name){
        $regexNames = "/^[a-zA-Z]+$/";

        if(trim($name) === ""){
            return [
                'fieldName'=> 'Mname',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else if (!preg_match($regexNames, $name)){
            return[
                'fieldName'=> 'Mname',
                'error' => "Invalid Format",
                'isValid' => false
            ];
        }else{
            return[
                'fieldName'=> 'Mname',
                "error" => '',
                'isValid' => true
            ];
        }

}

function validatelname($name){
        $regexNames = "/^[a-zA-Z]+$/";

        if(trim($name) === ""){
            return [
                'fieldName'=> 'lname',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else if (!preg_match($regexNames, $name)){
            return[
                'fieldName'=> 'lname',
                'error' => "Invalid Format",
                'isValid' => false
            ];
        }else{
            return[
                'fieldName'=> 'lname',
                "error" => '',
                'isValid' => true
            ];
        }

}

function validatebdate($Bdate){
        if(trim($Bdate) === ""){
            return [
                'fieldName'=> 'Bdate',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else{
            return[
                'fieldName'=> 'Bdate',
                "error" => '',
                'isValid' => true
            ];
        }
}

function validategender($gender){
        if(trim($gender )=== ""){
            return [
                'fieldName'=> 'gender',
                'error' => "this is a Required Field",
                'isValid' => false
                
            ];
        }else{
            return[
                'fieldName'=> 'gender',
                "error" => '',
                'isValid' => false
            ];
        }
}

function validateEmail($mail){
    //Please enter a valid email address
         $emailAdd = "/^\w[a-zA-Z0-9]*[@]gmail\.com$/";

        if(trim($mail) === ""){
            return [
                'fieldName'=> 'email',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }elseif(!preg_match($emailAdd, $mail)){
            return[
                'fieldName'=> 'email',
                'error' => "Invalid Format",
                'isValid' => false
            ];
        }
            return[
                'fieldName'=> 'email',
                "error" => '',
                'isValid' => true
            ];
        
}

function validatephone($telno){
        if(trim($telno) === ""){
            return [
                'fieldName'=> 'phone',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else{
              return[
                'fieldName'=> 'phone',
                "error" => '',
                'isValid' => true
            ];
        }
}

function validateBarangay($barangay){
        if(trim($barangay) === ""){
            return [
                'fieldName'=> 'barangay',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
        }else{
              return[
                'fieldName'=> 'barangay',
                "error" => '',
                'isValid' => false
                
            ];
        }
}

function vaildateZipcode($zipcode){
    $zipregex = '/^[0-9]{4}$/';

    if(trim($zipcode) === ""){
        return [
            'fieldName'=> 'zipCode',
                'error' => "this is a Required Field",
                'isValid' => false
            ];
    }else if (!preg_match($zipregex, $zipcode)){
        return[
            'fieldName'=> 'zipCode',
                'error' => "Invalid Format",
                'isValid' => false
            ];
    }else{
          return[
            'fieldName'=> 'zipCode',
                "error" => '',
                'isValid' => true
            ];
        }
}

<?php

require 'process.php';

$firstName = "";
$middleName = "";
$lastName = "";
$birthday = "";
$gender = "";
$email = "";
$phone = "";
$street = "";
$barangay = "";
$city = "";
$province = "";
$zipcode = "";







if (isset($_POST['submit_bttn'])) {

    $firstName = $_POST['fName'];
    $middleName = $_POST['Mname'];
    $lastName = $_POST['lname'];
    $birthday = $_POST['Bdate'];
    // $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipCode'];





    $Validfname = validatename($firstName);
    $ValidMname = validateMname($middleName);
    $Validlname = validatelname($lastName);
    $validbdate = validatebdate($birthday);
    // $validgender = validategender($gender);
    $validemail = validateEmail($email);
    $validphone = validatephone($phone);
    $validbarangay = validateBarangay($barangay);
    $validZip = vaildateZipcode($zipcode);

    $Validfname['isValid'];
    var_dump($Validfname['isValid']);
    var_dump($ValidMname['isValid']);
    var_dump($Validlname['isValid']);

    if (
        $Validfname['isValid'] &&
        $ValidMname['isValid'] &&
        $Validlname['isValid']
    ) {
        var_dump($ValidMname['error']);
    } else {
        var_dump($ValidMname['error']);

    }


}