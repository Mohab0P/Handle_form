<?php   
    $name = strip_tags($_POST['name']);
    $email = strip_tags(trim(htmlspecialchars($_POST['email'])));
    $phone = strip_tags(trim(htmlspecialchars($_POST['phone'])));
    $message = strip_tags(trim(htmlspecialchars($_POST['message'])));




    if(empty($name) || empty($email) || empty($phone) || empty($message)){
        echo "Please fill out all fields";
    } else {
        echo "Thank you for your submission";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Please enter a valid email address";
    }

    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)){
        echo "Please enter a valid phone number";
    }
    if(strlen($message) < 10){
        echo "Please enter a message that is at least 10 characters long";
    }
    
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone) && strlen($message) >= 10){
        echo "Thank you for your submission";
    }
    
    echo $name;
    echo $email;
    echo $phone;



?>