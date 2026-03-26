<?php


    $json = file_get_contents("php://input");  // Taga-salo ng JSON defaullt yan 
    $data = json_decode($json, true);
    // Translator ni PHP default din pang decode ng json object(js) --> json(php)


if (isset($data)) {  ///

    if ($data['form_stage'] == 1) {


    // Makikita mo ang laman sa console kung papalitan mo ang JS mo ng .text() pansamantala

        $firstName = $data[0] ?? ''; //optional kung walag data na natanggap empty ang lalgay niya 
        $middleName = $data[1] ?? '';
        $lastName = $data[2] ?? '';
        $bdate = $data[3] ?? '';
        $gender = $data[4] ?? '';


        $validatedName = validatename($firstName);
        $validatemName = validateMname($middleName);
        $validatLname = validatelname($lastName);
        $validBdate = validatebdate($bdate);
        $validgender = validategender($gender);

        $errorbucket = [];


        if ($validatedName['isValid'] === false) {
            $errorbucket[] = $validatedName;
        }

        if ($validatemName['isValid'] === false) {
            $errorbucket[] = $validatemName;
        }

        if ($validatLname['isValid'] === false) {
            $errorbucket[] = $validatLname;
        }

        if ($validBdate['isValid'] === false) {
            $errorbucket[] = $validBdate;
        }

        if ($validgender['isValid'] === false) {
            $errorbucket[] = $validgender;
        }


        //ngayong may laman na ang ating error bucket bilangan ang error kung meron 
        //ibalik sa js

        if (count($errorbucket) > 0) {
            //gumawa g reply na ipapasa niya sa js yung mga errors na nakuha niyaSS
            print json_encode($errorbucket);
        } else {
            $walanglamangerror = $errorbucket = [];
            print json_encode($walanglamangerror); //nagbalik ako ng array na walang laman 
        }


    } else if ($data['form_stage'] == 2) {
 

        $email = $data['email'] ?? '';
        $phone = $data['phone'] ?? '';


        $errorbucks = [];

        $validateemail = validateEmail($email);
        $validphone = validatephone($phone);

        if ($validateemail['isValid'] === false) {
            $errorbucks[] = $validateemail;
        }

        if ($validphone['isValid'] === false) {
            $errorbucks[] = $validphone;
        }

        if (count($errorbucks) > 0) {
            //gumawa g reply na ipapasa niya sa js yung mga errors na nakuha niyaSS
            print json_encode($errorbucks);
        } else {
            $walanglamangerror = $errorbucks = [];
            print json_encode($walanglamangerror); //nagbalik ako ng array na walang laman 
        }

    }else if($data['form_stage'] == 3){


         $street = $data['street'] ?? '';
         $barangay = $data['barangay'] ?? '';
         $city = $data['city'] ?? '';
         $province = $data['province'] ?? '';
         $zipCode = $data['zipCode'] ?? '';


         $validatedstreet =validatestreet($street);
         $validatedbarangay =validateBarangay($barangay);
         $validatedcity =validatecity($city);
         $validatedprovince =validateprovince($province);
        $validatedzipCode =vaildateZipcode($zipCode);


        $errorbucket = [];


        if ($validatedstreet['isValid'] === false) {
            $errorbucket[] = $validatedstreet;
        }

        if ($validatedbarangay['isValid'] === false) {
            $errorbucket[] = $validatedbarangay;
        }

        if ($validatedcity['isValid'] === false) {
            $errorbucket[] = $validatedcity;
        }

        if ($validatedprovince['isValid'] === false) {
            $errorbucket[] = $validatedprovince;
        }

        if ($validatedzipCode['isValid'] === false) {
            $errorbucket[] = $validatedzipCode;
        }


        //ngayong may laman na ang ating error bucket bilangan ang error kung meron 
        //ibalik sa js

        if (count($errorbucket) > 0) {
            //gumawa g reply na ipapasa niya sa js yung mga errors na nakuha niyaSS
            print json_encode($errorbucket);
        } else {
            $walanglamangerror = $errorbucket = [];
            print json_encode($walanglamangerror); //nagbalik ako ng array na walang laman 
        }

    }


}
function validatename($name)
{
    // $regexNames = "/^[a-zA-Z]+$/";
   
    $regexNames = " /^[a-zA-Z' -]+$/";

    if (trim($name) === "") {
        return [
            'fieldName' => 'fName',
            'error' => "this is a Required Field*",
            'isValid' => false
        ];
    } else if (!preg_match($regexNames, $name)) {
        return [
            'fieldName' => 'fName',
            'error' => "Invalid Format*",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'fName',
            "error" => '',
            'isValid' => true
        ];
    }

}

function validateMname($name)
{
    $regexNames = "/^[a-zA-Z]+$/";

    if (trim($name) === "") {
        return [
            'fieldName' => 'Mname',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else if (!preg_match($regexNames, $name)) {
        return [
            'fieldName' => 'Mname',
            'error' => "Invalid Format",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'Mname',
            "error" => '',
            'isValid' => true
        ];
    }

}

function validatelname($name)
{
    $regexNames = "/^[a-zA-Z]+$/";

    if (trim($name) === "") {
        return [
            'fieldName' => 'lname',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else if (!preg_match($regexNames, $name)) {
        return [
            'fieldName' => 'lname',
            'error' => "Invalid Format",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'lname',
            "error" => '',
            'isValid' => true
        ];
    }

}

function validatebdate($Bdate)
{
    if (($Bdate) === "") {
        return [
            'fieldName' => 'Bdate',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'Bdate',
            "error" => '',
            'isValid' => true
        ];
    }
}

function validategender($gender)
{
    if (($gender) === "") {
        return [
            'fieldName' => 'gender',
            'error' => "Please Select Gender",
            'isValid' => false

        ];
    } else {
        return [
            'fieldName' => 'gender',
            "error" => '',
            'isValid' => true
        ];
    }
}

function validateEmail($mail)
{
    //Please enter a valid email address
    $emailAdd = "/^\w[a-zA-Z0-9]*[@]gmail\.com$/";

    $emailRegex = "/^[a-zA-Z0-9._%+-]+@gmail\.com$/";

    if (trim($mail) === "") {
        return [
            'fieldName' => 'email',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } elseif (!preg_match($emailRegex, $mail)) {
        return [
            'fieldName' => 'email',
            'error' => "Invalid Format",
            'isValid' => false
        ];
    }
    return [
        'fieldName' => 'email',
        "error" => '',
        'isValid' => true
    ];

}

function validatephone($telno)
{

    $phoneRegex = "/^(0\d{9}|63\d{11})$/";
    if (trim($telno) === "") {
        return [
            'fieldName' => 'phone',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } elseif(preg_match($phoneRegex, $telno)){
     return [
            'fieldName' => 'phone',
            'error' => "Invalid format",
            'isValid' => false
        ];
    }
    
    else {
        return [
            'fieldName' => 'phone',
            "error" => '',
            'isValid' => true
        ];
    }
}

function validatestreet($street){
    if (trim($street) === "") {
        return [
            'fieldName' => 'street',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'street',
            "error" => '',
            'isValid' => true

        ];
    }


}

function validatecity($city){
    $cityRegex = "/^[a-zA-Z -]+$/";
    if (trim($city) === "") {
        return [
            'fieldName' => 'city',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } elseif(!preg_match($cityRegex, $city)){
        return [
            'fieldName' => 'city',
            "error" => 'Invalid Format',
            'isValid' => false

        ];

    }
    else {
        return [
            'fieldName' => 'city',
            "error" => '',
            'isValid' => true

        ];
    }


}

function validateBarangay($barangay)
{
    if (trim($barangay) === "") {
        return [
            'fieldName' => 'barangay',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'barangay',
            "error" => '',
            'isValid' => true

        ];
    }
}

function validateprovince($province)
{
    if (trim($province) === "") {
        return [
            'fieldName' => 'province',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'province',
            "error" => '',
            'isValid' => true

        ];
    }
}


function vaildateZipcode($zipcode)
{
    // $zipregex = '/^[0-9]{4}$/';

    $zipRegex = "/^[0-9]{4}$/";

    if (trim($zipcode) === "") {
        return [
            'fieldName' => 'zipCode',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else if (!preg_match($zipRegex, $zipcode)) {
        return [
            'fieldName' => 'zipCode',
            'error' => "Invalid Format",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'zipCode',
            "error" => '',
            'isValid' => true
        ];
    }
}