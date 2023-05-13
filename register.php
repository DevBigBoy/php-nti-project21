<?php
$title = "Register";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
include_once "app/requests/Validation.php";
include_once "app/models/User.php";
include_once "app/services/mail.php";

if ($_POST) {
    // print_r($_POST);
    // die;
    # validation rules

    $success = [];
    # first_name :: required, String
    $checkFirstName = new Validation('First name', $_POST['first_name']);
    $checkFirstNameResult = $checkFirstName->required();


    # last_name :: required, string
    $checkLastName = new Validation('Last name', $_POST['last_name']);
    $checkLastNameResult = $checkLastName->required();

    # gender :: required,['f','m']

    # email :: required, regular expression, unique
    $checkEmail = new Validation('email', $_POST['email']);
    $emailRequired = $checkEmail->required();
    if (empty($emailRequired)) {
        $emailRegex = $checkEmail->regex("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/");
        if (empty($emailRegex)) {
            $emailUnique = $checkEmail->unique('users');
            if (empty($emailUnique)) {
                $success['email'] = 'email';
            }
        }
    }

    # phone :: required, regex(pattern), unique
    $checkPhone = new Validation('phone', $_POST['phone']);
    $phoneRequired = $checkPhone->required();
    if (empty($phoneRequired)) {
        $phoneRegex = $checkPhone->regex("/^01[0-2,5,9]{1}[0-9]{8}$/");
        if (empty($phoneRegex)) {
            $phoneUnique = $checkPhone->unique('users');
            if (empty($phoneUnique)) {
                $success['phone'] = 'phone';
            }
        }
    }

    # password :: required, regex(pattern), = password_confirmation
    $checkpass = new Validation('password', $_POST['password']);
    $passRequired = $checkpass->required();
    if (empty($passRequired)) {
        $passRegex = $checkpass->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/");
        if (empty($passRegex)) {
            $checkC_pass = new Validation('confirmed password', $_POST['password_confirmation']);
            $c_passRequired = $checkC_pass->required();
            if (empty($c_passRequired)) {
                $c_passMatches = $checkpass->confirmed($_POST['password_confirmation']);
                if (empty($c_passMatches)) {
                    $success['password'] = 'password';
                }
            }
        }
    }




    # Insert Data into database

    if (isset($success['email']) && isset($success['phone']) && isset($success['password'])) {

        # hash for password
        # generate code
        # insert User
        $userObject = new User;
        $userObject->setFirst_name($_POST['first_name']);
        $userObject->setLast_name($_POST['last_name']);
        $userObject->setEmail($_POST['email']);
        $userObject->setPhone($_POST['phone']);
        $userObject->setGender($_POST['gender']);
        $userObject->setPassword($_POST['password']);
        $code = rand(10000, 99999);
        $userObject->setCode($code);
        $result = $userObject->create();
        if ($result) {
            # send mail with code
            // mail to => $_POST['email'];
            // mail from => configration
            // mail subject => verification code
            // mail body => hello name, your verification code is 00000, thanks
            $subject = 'verification code';
            $body = "Hello {$_POST['first_name']} {$_POST['last_name']},<br> Your verification code is $code <br> thank you for joining us";
            $mail = new mail($_POST['email'], $subject, $body);
            $mailresult =  $mail->send();
            if ($mailresult) {
                // echo 'Check Your mail!';
                # header to check code page
                $_SESSION['user-email'] = $_POST['email'];
                header('location: check-code.php');
            } else {
                $error = "<div class='alert alert-danger'>Try Again Later!</div>";
            }
        } else {
            $error = "<div class='alert alert-danger'>Try Again Later!</div>";
        }
    }
}
?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4>register</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php (isset($error)) ? $error : ''; ?>
                                    <form method="post">
                                        <?= empty($checkFirstNameResult) ? '' : "<div class='alert alert-danger'>$checkFirstNameResult </div>"; ?>
                                        <input type="text" name="first_name" placeholder="First Name"
                                            value="<?= (isset($_POST['first_name'])) ? $_POST['first_name'] : ''; ?>" />

                                        <?= empty($checkLastNameResult) ? '' : "<div class='alert alert-danger'>$checkLastNameResult </div>"; ?>
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            value="<?= (isset($_POST['last_name'])) ? $_POST['last_name'] : ''; ?>" />

                                        <?= empty($emailRequired) ? '' : "<div class='alert alert-danger'>$emailRequired </div>"; ?>
                                        <?= empty($emailRegex) ? '' : "<div class='alert alert-danger'>$emailRegex </div>"; ?>
                                        <?= empty($emailUnique) ? '' : "<div class='alert alert-danger'>$emailUnique </div>"; ?>
                                        <input name="email" placeholder="Email" type="email"
                                            value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" />


                                        <?= empty($phoneRequired) ? '' : "<div class='alert alert-danger'>$phoneRequired </div>"; ?>
                                        <?= empty($phoneRegex) ? '' : "<div class='alert alert-danger'>$phoneRegex </div>"; ?>
                                        <?= empty($phoneUnique) ? '' : "<div class='alert alert-danger'>$phoneUnique </div>"; ?>
                                        <input name="phone" placeholder="phone" type="text"
                                            value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>" />

                                        <?= empty($passRequired) ? '' : "<div class='alert alert-danger'>$passRequired </div>"; ?>
                                        <?= empty($passRegex) ? '' : "<div class='alert alert-danger'>Minimum eight and maximum 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>"; ?>
                                        <input type="password" name="password" placeholder="Password" />

                                        <?= empty($c_passRequired) ? '' : "<div class='alert alert-danger'>$c_passRequired </div>"; ?>
                                        <?= empty($c_passMatches) ? '' : "<div class='alert alert-danger'>$c_passMatches </div>"; ?>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm Password" />

                                        <select name="gender" id="" class="form-control mb-2">
                                            <option
                                                <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ? 'selected' : ''; ?>
                                                value="m">male</option>
                                            <option
                                                <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ? 'selected' : ''; ?>
                                                value="f">female</option>
                                        </select>

                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>