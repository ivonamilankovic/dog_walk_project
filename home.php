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
            <div class="me-auto p-3"><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></div>
            <div class="p-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_login">
                    Log in
                </button>
            </div>
            <div class="p-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_signup">
                    Sign up
                </button>
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
                        <input type="radio" id="roleUser" name="user-type" checked>I'm a Regular user</input>
                        <br>
                        <input type="radio" id="roleWalker" name="user-type">I'm a Dog walker</input>
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

            <!-- BEST DOG WALKERS -->
    <div class="container p-4 d-flex justify-content-center">
        <div class="row border rounded karta fixed">
            <h1 class="d-flex justify-content-center">Best dog walkers</h1>


                    <div id="carouselExample" class="carousel carousel-dark slide" >
<!--                        data-bs-ride="carousel"-->
                        <div
                                class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner d-flex justify-content-around">
                            <div class="carousel-item active w-500 h-400" data-bs-interval="4000">
                                <div class="card mb-3" style="max-width: 600px;">
                                    <div class="row g-0">
                                        <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Sara Babic</h5>
                                                <p class="card-text three-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto enim eos excepturi laborum nesciunt officia quas quis tempore voluptatum! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item w-500 h-400" data-bs-interval="4000">
                                <div class="card mb-3" style="max-width: 600px;">
                                    <div class="row g-0">
                                        <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Ivona Milankovic</h5>
                                                <p class="card-text three-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto enim eos excepturi laborum nesciunt officia quas quis tempore voluptatum! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item w-500 h-400" data-bs-interval="4000">
                                <div class="card mb-3" style="max-width: 600px;">
                                    <div class="row g-0">
                                        <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                            <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Gagi</h5>
                                                <p class="card-text three-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto enim eos excepturi laborum nesciunt officia quas quis tempore voluptatum! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <div class="carousel-item w-500 h-400" data-bs-interval="4000">
                            <div class="card mb-3" style="max-width: 600px;">
                                <div class="row g-0">
                                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Ivona Milankovic</h5>
                                            <p class="card-text three-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto enim eos excepturi laborum nesciunt officia quas quis tempore voluptatum! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item w-500 h-400" data-bs-interval="4000">
                            <div class="card mb-3" style="max-width: 600px;">
                                <div class="row g-0">
                                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Sara Babic</h5>
                                            <p class="card-text three-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto enim eos excepturi laborum nesciunt officia quas quis tempore voluptatum! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
        </div>

<!-- FOOTER -->
    <div class="footer fixed-bottom">
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
                <a href="#" class="text-dark">Become a Dog Walker</a>
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