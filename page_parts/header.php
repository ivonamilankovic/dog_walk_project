<!-- HEADER -->
<small id="top"></small>
<div class="header sticky-top">
    <div class="container d-flex header">
        <div class="me-auto p-3"><a href="../pages/home.php"> <img src="../images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></div>
        <?php
        if(isset($_SESSION['id'])){

            if($_SESSION['role'] === "customer"){

                require_once '../customer_dashboard/customer_header.php';
                }
            elseif ($_SESSION['role'] === "walker"){

                require_once '../walker_dashboard/walker_header.php';
            }
            elseif($_SESSION['role'] === "admin"){
                require_once  '../admin/admin_header.php';
            }
        ?>

        <div class="p-3 align-self-center">
            <a href="../include/logout.inc.php">
                <button type="button" class="btn header-btn" id="btnLogout">
                    Log out
                </button>
            </a>
        </div>
            <?php
            }

        else{
            ?>

            <div class="p-3 align-self-center">
                <button id="btnLogin" type="button" class="btn header-btn" data-bs-toggle="modal" data-bs-target="#modal_login">
                    Log in
                </button>
            </div>
            <div class="p-3 align-self-center">
                <button id="btnSignup" type="button" class="btn  header-btn" data-bs-toggle="modal" data-bs-target="#modal_signup">
                    Sign up
                </button>
            </div>
            <?php
        }
        ?>
        <!--toggle search-->
        <div class="p-0">
            <nav class="navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <a href="#top"><img src="../images/loupe.png" alt="search" class="social"></a>
                    </button>
                </div>
            </nav>
        </div>
    </div>
</div>


<div class="topnav">
    <a href="../pages/home.php" class="active"> <img src="../images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a>
    <div id="myLinks">
       <?php
        if(isset($_SESSION['id'])){

        if($_SESSION['role'] === "customer"){

        require_once '../customer_dashboard/customer_mini_header.php';
        }
        elseif ($_SESSION['role'] === "walker"){

        require_once '../walker_dashboard/walker_mini_header.php';
        }
        elseif($_SESSION['role'] === "admin"){
        require_once  '../admin/admin_header.php';
        }
        ?>
        <a href="../include/logout.inc.php" >Log out</a>
           <?php
       }

       else{
       ?>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_login">Log in</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_signup">Sign up</a>
        <?php
       }
       ?>
        <a href="../pages/allWalkers.php">All walkers</a>
        <a href="#" onclick="myFunction()" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Search for walkers</a>
        <a href="../pages/about.php">About</a>
    </div>
    <a href="#" class="icon" onclick="myFunction()">
        <img src="../images/navburger.ico" width="40" height="40" alt="navigation">
    </a>
</div>


<!--active toggle search-->
<div class=" d-flex justify-content-around">
    <div class="collapse mb-4" id="navbarToggleExternalContent">
        <div class="p-3">
            <div class="input-group rounded">
                <input id="searchInput" type="search" class="form-control rounded border border-dark" placeholder="Search for dog walkers..." aria-label="Search" aria-describedby="search-addon" />
                <button id="searchWalkersBtn" type="button" class="btn btn-dark search">Search</button>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="findWalkers btn btn-outline-dark">Show all dog walkers...</button>
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
                <small id="forgotPass" class="text-primary" >Forgot password?</small>
                <br>
                <small id="errorMessage"></small>
                <br>
                <button type="submit" name="submit" id="loginBtn" class="btn btn-primary m-auto mt-4" style=" background-color: #866464; border: black;">Log in</button>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto my-2 row gutters mx-auto">
                <!--Form for signup-->
                <div id="chooseYourStatus" class=" m-auto mb-4 row gutters d-flex justify-content-center">
                    <p class="d-flex justify-content-center">Please select your status:</p>
                    <div class="form-check col-lg-6 mx-auto" style="width: 200px">
                        <input class="form-check-input" type="radio" name="user-type" id="roleUser" checked>
                        <label class="form-check-label" for="roleUser">I'm a Regular user</label>
                    </div>
                    <div class="form-check col-lg-6 mx-auto" style="width: 200px">
                        <input class="form-check-input" type="radio" name="user-type" id="roleWalker">
                        <label class="form-check-label" for="roleWalker">I'm a Dog walker</label>
                    </div>
                </div>
                <!--inputs for all the users-->
                <div id="inputsForEveryone" class="row g-2 d-flex justify-content-center">
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="firstName" name="fname" type="text" placeholder="First name" required style="width: 300px">
                            <label for="firstName">First Name</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="lastName" name="lname" type="text" placeholder="Last name" required style="width: 300px">
                            <label for="lastName">Last Name</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Email" required style="width: 300px">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" minlength="10" required style="width: 300px">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="pass1" name="pass1" type="password" placeholder="Your password" minlength="6" maxlength="15" required style="width: 300px">
                            <label for="pass1">Your Password</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="pass2" name="pass2" type="password" placeholder="Repeat password" minlength="6" maxlength="15" required style="width: 300px">
                            <label for="pass2">Repeat Password</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="address" name="address" type="text" placeholder="Address" required style="width: 300px">
                            <label for="address">Address</label>
                        </div>

                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="city" name="city" type="text" placeholder="City" required style="width: 300px">
                            <label for="city">City</label>
                        </div>
                        <div class="form-floating col-lg-6 mx-2" style="width: 300px">
                            <input class="form-control" id="postalCode" name="postalCode" type="number" placeholder="Postal Code" minlength="5" maxlength="10" required style="width: 300px">
                            <label for="postalCode">Postal Code</label>
                        </div>
                </div>
                <small id="errorMsg"></small>
                <br>
                <button type="submit" name="submit" id="signupBtn" class="btn btn-primary m-auto mt-4 col-lg-8" style="background-color: #866464; border: black;">Register</button>
            </div>
            <div class="modal-footer">
                <p>Already have a profile? <span class="text-primary" id="goToLogin">Log in!</span></p>
            </div>
        </div>
    </div>
</div>


