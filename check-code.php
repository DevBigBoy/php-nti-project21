<?php
$title = "Check Code";
include_once "layouts/header.php";
include_once "app/models/User.php";

$errors = [];
if ($_POST) {
    if (empty($_POST['code'])) {
        $errors['required'] = "<div class='alert alert-danger'>Code Is Required</div>";
    } else {
        if (strlen($_POST['code']) != 5) {
            $errors['digits'] = "<div class='alert alert-danger'>Code Must Be Five Digits</div>";
        }
    }

    if (empty($errors)) {
        $userObject = new User;
        $userObject->setCode($_POST['code']);
        $userObject->setEmail($_SESSION['user-email']);
        $result = $userObject->checkCode();

        if ($result) {
            # TODO: correct Code
            $userObject->setStatus(1);
            date_default_timezone_set('Africa/Cairo');
            $userObject->setEmail_verified_at(date('Y-m-d H:i:s'));
            // TODO: update email verified at and code
            $updateResult = $userObject->makeUserVerified();
            if ($updateResult) {
                // TODO: Header To login
                header('location: login.php');
            } else {
                $errors['something'] = "<div class='alert alert-danger'>try again later</div>";
            }
            // 
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'>Wrong Code</div>";
        }
    }
}

?>


<div class="container d-flex justify-content-center align-items-center flex-column" style="height: 100vh;">
    <h1 class="my-2">Verification code</h1>
    <p>We sent a verification code to your email.
        <br> Please enter the code in the field below.
    </p>
    <div class="row align-items-center">
        <form method="post" class="d-flex flex-column">
            <div class=" form-group">
                <label for="code">Verification code</label>
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $key => $value) {
                        echo $value;
                    }
                }
                ?>
                <input type="number" min="10000" max="99999" class="form-control" id="code" name="code" placeholder="code">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once "layouts/footer-scripts.php";
?>