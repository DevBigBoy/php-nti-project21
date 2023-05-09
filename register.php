<?php
$title = "Register";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

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
                                    <form action="" method="post">
                                        <input type="text" name="first_name" placeholder="First Name" />
                                        <input type="text" name="last_name" placeholder="Last Name" />
                                        <input name="email" placeholder="Email" type="email" />
                                        <input name="phone" placeholder="phone" type="text" />
                                        <input type="password" name="password" placeholder="Password" />
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm Password" />
                                        <select name="gender" id="" class="form-control mb-2">
                                            <option value="m">male</option>
                                            <option value="f">female</option>
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