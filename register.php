<?php
    include("./header.php");
?>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            require 'register-process.php';
        }
    ?>
    
    <!-- registration area-->

    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="font-ubuntu text-black-50">I already have a <a href="login.php">Login</a></span>
                </div>

                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
                        </div>
                        <img src="./assets/profile/beard.png" style="width:200px;height:200px;"class="img rounded-circle"alt="profile">
                        <small class="form-text text-black-50">Choose image</small>
                        <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname'] ?>" class="form-control" name="firstname" placeholder="First Name" id="firstname">
                            </div>
                            <div class="col">
                                <input type="text" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname'] ?>" class="form-control" name="lastname" placeholder="Last Name" id="lastname">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" required name="email" id="email" placeholder="Email*" class="form-control" >
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" name="password" id="password" placeholder="password*" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password*" class="form-control" required>
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">terms, conditions, and policy</a>(*)</label>  
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </section>


    <!-- #registration area-->

<?php
    include("./footer.php")
?>