<?php
session_start();
# 
if (!isset($_POST['login'])) {
    header('location: ../../layouts/errors/404.php');
    die;
}

include_once "../requests/Validation.php";
include_once "../models/User.php";
# validation
# email => required, regex 
$checkEmail = new Validation('email', $_POST['email']);
$emailRequired = $checkEmail->required();
if (empty($emailRequired)) {
    $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    $emailRegex = $checkEmail->regex($emailPattern);
    if (!empty($emailRegex)) {
        $_SESSION['errors']['email']['regex'] = $emailRegex;
    }
} else {
    $_SESSION['errors']['email']['required'] = $emailRequired;
}

# Validate password => required, regex   
$checkPassword = new Validation('password', $_POST['password']);
$passwordRequired = $checkPassword->required();
if (empty($passwordRequired)) {
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
    $passwordRegex = $checkPassword->regex($passwordPattern);
    if (!empty($passwordRegex)) {
        $_SESSION['errors']['password']['regex'] = $passwordRegex;
    }
} else {
    $_SESSION['errors']['password']['required'] = $passwordRequired;
}
// print_r($_SESSION);
// die;
# if NO Errors
if (empty($_SESSION['errors'])) {
    # Search in db
    $userObject = new User;
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']); // 123
    $result = $userObject->login(); // one user || no user
    if ($result) {
        # correct credentionals
        $user = $result->fetch_object();

        if ($user->status == 1) {
            # status => 1 => home
            $_SESSION['user'] = $user;
            header('location:../../index.php');
            die;
        } elseif ($user->status == 0) {
            # status => 0 => check code page
            $_SESSION['user-email'] = $_POST['email'];
            header('location:../../check-code.php');
            die;
        } else {
            # status => 2 => alert with block message
            $_SESSION['errors']['email']['block'] = "Sorry, Your account has been Blocked";
        }
    } else {
        # wrong email or password
        # dsplay error message
        $_SESSION['errors']['email']['wrong'] = "Failed Attempt";
    }
}

header('location:../../login.php');
