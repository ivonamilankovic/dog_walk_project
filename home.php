<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Paw Walks - Home Page</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" type="text/css" href="./css/homeStyle.css"/>
</head>

<body>

    <!-- HEADER -->

    <div class="header">
        <div class="container d-flex">
            <div class="me-auto p-4"><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></div>
            <?php
                if(isset($_SESSION['id'])){
                    ?>
                    <div class="p-4 align-self-center">
                        <button type="button" class="btn btn-outline-dark">
                            <a href="./include/logout.inc.php" style="color: black; text-decoration: none;"> Log out </a>
                        </button>
                    </div><div class="p-4 align-self-center">
                        <button type="button" class="btn btn-outline-dark">
                            <a href="#" style="color: black; text-decoration: none;"> My Profile </a>
                        </button>
                    </div>

        <?php
                }else{
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
                            <a href="#"><img src="./images/loupe.png" alt="search" class="social"></a>
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
            <div class="input-group rounded" style="width: 600px">
                <input type="search" class="form-control rounded" placeholder="Search for dog walkers..." aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                <button type="button" class="btn btn-light">Search</button>
                </span>
            </div>
        </div>
    </div>
    </div>
    <!--About us-->
    <div class="container border rounded p-4 mt-4" style="background-color: rgba(142,187,119,0.68)">
        <div class="d-flex align-items-start"><img src="images/paw.svg" class="social"><h1 class="">Here when you need us</h1></div>
        <h5 class="p-4">Whether you're looking for daily walks, planning a trip, stuck at work, or just want your best friend to have some company — we offer any day, anytime care.</h5>
        <div class="d-flex align-items-start"><img src="images/paw.svg" class="social"><h1>Safety is serious business</h1></div>
        <h5 class="p-4">Your dog's safety is our top priority. Every Pet Caregiver passes an enhanced background check, our services are insured, and support is standing by around the clock.</h5>
        <div class="d-flex align-items-start"><img src="images/paw.svg" class="social"><h1>We've been around the block</h1></div>
        <h5 class="p-4">Paw Walks! has a trusted record of experience with over 10M pet care services across 4,600 cities and counting. More than 150,000 Pet Caregivers nationwide are dog people, and it shows.</h5>
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


    <!--    BEST RATED DOG WALKERS-->

    <div class="container d-flex justify-content-between karte">
        <div class="row border rounded karta d-flex justify-content-center fixed">
            <h1 class="d-flex justify-content-center">Best rated dog walkers</h1>

            <!--1.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Ocena</small></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--2.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Ocena</small></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--3.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Ocena</small></span>
                        </div>
                    </div>
                </div>
            </div>


            <!--active-more-->
            <div class="collapse p-0" id="walkerToggleExternalContent">
                <!--4.karta-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-self-center p-2">
                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ime Prezime</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Ocena</small></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--5.karta-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-self-center p-2">
                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ime Prezime</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Ocena</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--More walkers..-->
            <div class="container-fluid d-flex justify-content-center">
                <button id="more1" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#walkerToggleExternalContent" aria-controls="walkerToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <small id="text1" style="text-decoration: underline">More dog walkers...</small>
                </button>
            </div>
            <script>
                document.getElementById('more1').addEventListener('click', function (){
                    document.getElementById('text').textContent = "Less dog walkers...";
                    document.getElementById('text1').textContent = "Less dog walkers...";
                })
            </script>


            </div>


    <!--    MOST ACTIVE DOG WALKERS -->
        <div class="row border rounded karta d-flex justify-content-center fixed">
            <h1 class="d-flex justify-content-center">Most active dog walkers</h1>
            <!--1.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Br. šetnji</small></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--2.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Br. šetnji</small></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--3.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Br. šetnji</small></span>
                        </div>
                    </div>
                </div>
            </div>


            <!--active-more-->
            <div class="collapse p-0" id="walkerToggleExternalContent">
                <!--4.karta-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-self-center p-2">
                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ime Prezime</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Br. šetnji</small></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--5.karta-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-self-center p-2">
                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ime Prezime</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <span class=" d-flex justify-content-between"><small class="text-muted"><a href="#">View</a></small><small>Br. šetnji</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!--More walkers..-->
            <div class="container-fluid d-flex justify-content-center">
                <button id="more" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#walkerToggleExternalContent" aria-controls="walkerToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <small id="text" style="text-decoration: underline">More dog walkers...</small>
                </button>
            </div>
            <script>
                document.getElementById('more').addEventListener('click', function (){
                    document.getElementById('text').textContent = "Less dog walkers...";
                    document.getElementById('text1').textContent = "Less dog walkers...";
                })
            </script>



        </div>
    </div>



<!-- FOOTER -->
    <div class="footer"> <!--???fixed-bottom???-->
        <div class="container  d-flex justify-content-between p-4">
            <img src="images/pawwalks.svg" class="logo" alt="PawWalksLogo"/>

                <div>
                    <h6><b>Company</b></h6>
                    <a href="#" class="text-dark">About PawWalks</a> <br>
                    <a href="#" class="text-dark">Blog</a>
                </div>
                <div>
                    <h6><b>Support</b></h6>
                    <a href="#" class="text-dark">Trust and Safety</a> <br>
                    <a href="#" class="text-dark">Help Center & Safety</a> <br>
                    <a href="#" class="text-dark">Community guidelines</a>
                </div>
            <div>
                <h6><b>Apply</b></h6>
                <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#modal_signup">Become a Dog Walker</a>
            </div>
                <div class="d-flex align-self-end">
                    <a href="#" class="p-2"><img src="images/facebook.png" alt="facebookLogo" class="social"></a>
                    <a href="#" class="p-2"><img src="images/linkedin.png" alt="linkedinLogo" class="social"></a>
                    <a href="#" class="p-2"><img src="images/instagram.png" alt="intagramLogo" class="social"></a>
                </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script/signup.js"></script>
    <script src="./script/login.js"></script>


</body>

</html>