<?php
$title = "Check Code";
include_once "layouts/header.php";

if ($_POST) {
    print_r($_POST);
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
                <input type="number" min="10000" max="99999" class="form-control" id="code" name="code" placeholder="code">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once "layouts/footer-scripts.php";
?>