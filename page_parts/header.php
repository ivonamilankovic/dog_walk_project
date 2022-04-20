<!-- HEADER -->

<div class="header fixed-top">
    <div class="container d-flex">
        <div class="me-auto p-4"><a href="../pages/home.php"> <img src="../images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></div>
        <?php
        if(isset($_SESSION['id'])){

            if($_SESSION['role'] === "customer"){

                require_once '../customer_dashboard/customer_header.php';

                }
            elseif ($_SESSION['role'] === "walker"){

                require_once '../walker_dashboard/walker_header.php';
            }
        ?>

    <div class="p-4 align-self-center">
        <button type="button" class="btn btn-outline-dark">
            <a href="../include/logout.inc.php" style="color: black; text-decoration: none;"> Log out </a>
        </button>
    </div>
            <?php
            }

        else{
            ?>

            <div class="p-4 align-self-center">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal_login">
                    Log in
                </button>
            </div>
            <div class="p-4 align-self-center">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal_signup">
                    Sign up
                </button>
            </div>
            <?php
        }
        ?>
        <!--toggle search-->
        <div class="p-4">
            <nav class="navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <a href="#"><img src="../images/loupe.png" alt="search" class="social"></a>
                    </button>
                </div>
            </nav>

        </div>
    </div>
</div>

<!--active toggle search-->
<div class=" d-flex justify-content-around">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="p-4">
            <div class="input-group rounded" style="width: 600px; height: 60px">
                <input type="search" class="form-control rounded border border-dark" placeholder="Search for dog walkers..." aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-dark search" style="width: 120px">Search</button>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-dark" style="width: 600px">Show all dog walkers...</button>
        </div>
    </div>
</div>

<!--Modal for Log in-->

<div class="modal fade" id="modal_login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Log in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto mt-4">
                <!--Form for login-->
                <h5 id="message"></h5>
                <br>
                <div class="form-floating">
                    <input  class="form-control" id="uname" name="uname" type="email" placeholder="Email">
                    <label for="uname">Email</label>
                </div>
                <br>
                <div class="form-floating">
                    <input class="form-control" id="pass" name="pass" type="password" placeholder="Password">
                    <label for="pass">Password</label>
                </div>
                <br>
                <small id="errorMessage"></small>
                <br>
                <button type="submit" name="submit" id="loginBtn" class="btn btn-primary m-auto mt-4">Log in</button>
            </div>
            <div class="modal-footer">
                <br>
                <p>Don't have profile? <span class="text-primary" id="goToSignup">Sign up!</span></p>
            </div>
        </div>
    </div>
</div>

<!--Modal for sign up-->
<div class="modal fade" id="modal_signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto my-4">
                <!--Form for signup-->
                <div id="chooseYourStatus" class=" m-auto mb-4">
                    <p class="mb-0">Please select your status:</p>
                    <input type="radio" id="roleUser" name="user-type" checked/>
                    <label for="roleUser">I'm a Regular user</label>
                    <br>
                    <input type="radio" id="roleWalker" name="user-type"/>
                    <label for="roleWalker">I'm a Dog walker</label>
                    <br>
                </div>
                <!--inputs for all the users-->
                <div id="inputsForEveryone">
                    <div class="form-floating">
                        <input class="form-control" id="firstName" name="fname" type="text" placeholder="First name" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="lastName" name="lname" type="text" placeholder="Last name" required>
                        <label for="lastName">Last Name</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="pass1" name="pass1" type="password" placeholder="Your password" minlength="6" maxlength="15" required>
                        <label for="pass1">Your Password</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="pass2" name="pass2" type="password" placeholder="Repeat password" minlength="6" maxlength="15" required>
                        <label for="pass2">Repeat Password</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" minlength="10" required>
                        <label for="phone">Phone Number</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="address" name="address" type="text" placeholder="Address" required>
                        <label for="address">Address</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="city" name="city" type="text" placeholder="City" required>
                        <label for="city">City</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" id="postalCode" name="postalCode" type="number" placeholder="Postal Code" max="5" min="5" required>
                        <label for="postalCode">Postal Code</label>
                    </div>
                    <br>
                </div>
                <small id="errorMsg"></small>
                <br>
                <button type="submit" name="submit" id="signupBtn" class="btn btn-primary m-auto mt-4">Register</button>
            </div>
            <div class="modal-footer">
                <p>Already have a profile? <span class="text-primary" id="goToLogin">Log in!</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for verification code -->
<div class="modal fade" id="modal_verification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto mt-4">
                <h5 id="messageVerification">We sent you verification code on your mail address! Please enter it here.</h5>
                <br>
                <div class="form-floating">
                    <input  class="form-control" id="ver_code" name="ver_code" type="text" placeholder="Verification Code">
                    <label for="ver_code">Verification Code</label>
                </div>
                <br>
                <small id="errorVerification"></small>
                <br>
                <button type="submit" name="submit" id="verifyBtn" class="btn btn-primary m-auto mt-4">Verify</button>
            </div>
        </div>
    </div>
</div>
