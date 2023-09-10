<?php
session_start();
include "../database/env.php";
$enter_name = $_REQUEST['enter_name'];
$titel = $_REQUEST['titel'];
$details = $_REQUEST['details'];

$errors = [];
// validation

if(empty($enter_name)){
    echo $errors['enter_name_error'] = "Name Required";
}
else if(strlen($enter_name)>20){
    echo $errors['enter_name_error'] = "Name Required";
}

if(empty($titel)){
    echo $errors['titel_error'] = "Titel Required";
}

if(empty($details)){
    echo $errors['details_error'] = "Details Required";
}

if(count($errors) > 0){
    $_SESSION['old'] = $_REQUEST;
    $_SESSION['form_errors'] = $errors;
    header("Location: ../index.php");
}
else{
    $query = "INSERT INTO posts(Name, Titel, Details) VALUES ('$enter_name','$titel','$details')";
    $result = mysqli_query($conn,$query);
    if($result){
        $_SESSION['alart'] = "Successfully Connected";
        header("Location: ../index.php");
    }
}