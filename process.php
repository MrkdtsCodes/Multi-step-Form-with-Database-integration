<?php



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $rawJsonFile = file_get_contents('php://input');

    $decodedJson = json_decode($rawJsonFile, true);

    if($decodedJson){ //truthy or falsy means may laman ba parang ganon
        $firstName = $decodedJson['fName'];
        $middleName = $decodedJson['Mname'];
        $lastName  = $decodedJson['lname'];
        $birthday = $decodedJson['Bdate'];
        $gender = $decodedJson['gender'];
        $email     = $decodedJson['email'];
        $phone = $decodedJson['phone'];
        $street = $decodedJson['street'];
        $barangay = $decodedJson['barangay'];
        $city = $decodedJson['city'];
        $province = $decodedJson['province'];
        $zipcode = $decodedJson['zipCode'];

        $textinput = [$firstName, $middleName, $lastName];



        $errorbucket = [];

        validatename($firstName);
        vaildateZipcode($zipcode);




        $reply = [
        "status" => "success",
        "message" => "Nakuha na namin ang data mo, " . $firstName . " " . $lastName . "!"
    ];

     echo json_encode($reply);
    }

}else{
    echo json_encode(["status" => "error", "message" => "Walang dumating na data."]);
}

function validatename($name){
        $regexNames = "/^[a-zA-Z]+$/";

        if($name === ""){
            echo "This is A required Feild*";
        }else if (!preg_match($regexNames, $name)){
            echo "The input is not valid";
        }else{
            echo "this is Valid";
        }

}

function validatebdate($Bdate){
        if($Bdate === ""){
                echo "This is A required Feild*";
        }else{
            echo "this is Valid";
        }
}

function validategender($gender){
        if($gender === ""){
                echo "This is A required Feild*";
        }else{
            echo "this is Valid";
        }
}

function validateEmail($mail){
        if($mail === ""){
                echo "This is A required Feild*";
        }else{
            echo "this is Valid";
        }
}

function validatephone($telno){
        if($telno === ""){
                echo "This is A required Feild*";
        }else{
            echo "this is Valid";
        }
}

function validateBarangay($barangay){
        if($barangay === ""){
                echo "This is A required Feild*";
        }else{
            echo "this is Valid";
        }
}

function vaildateZipcode($zipcode){
    $zipregex = '/^[0-9]{4}$/';

    if($zipcode === ""){
        echo "This is A required Feild*";
    }else if (!preg_match($zipregex, $zipcode)){
            echo "The input is not valid";
    }else{
            echo "this is Valid";
        }
}