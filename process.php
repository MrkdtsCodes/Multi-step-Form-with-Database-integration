<?php

$json = file_get_contents("php://input");  // Taga-salo ng JSON
$data = json_decode($json, true);          // Translator ni PHP

// Makikita mo ang laman sa console kung papalitan mo ang JS mo ng .text() pansamantala


if (isset($data)) {

    $firstName = $data[0] ?? '';
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

}
function validatename($name)
{
    $regexNames = "/^[a-zA-Z]+$/";

    if (trim($name) === "") {
        return [
            'fieldName' => 'fName',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else if (!preg_match($regexNames, $name)) {
        return [
            'fieldName' => 'fName',
            'error' => "Invalid Format",
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
    if (trim($Bdate) === "") {
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
    if (trim($gender) === "") {
        return [
            'fieldName' => 'gender',
            'error' => "this is a Required Field",
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

    if (trim($mail) === "") {
        return [
            'fieldName' => 'email',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } elseif (!preg_match($emailAdd, $mail)) {
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
    if (trim($telno) === "") {
        return [
            'fieldName' => 'phone',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else {
        return [
            'fieldName' => 'phone',
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
            'isValid' => false

        ];
    }
}

function vaildateZipcode($zipcode)
{
    $zipregex = '/^[0-9]{4}$/';

    if (trim($zipcode) === "") {
        return [
            'fieldName' => 'zipCode',
            'error' => "this is a Required Field",
            'isValid' => false
        ];
    } else if (!preg_match($zipregex, $zipcode)) {
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