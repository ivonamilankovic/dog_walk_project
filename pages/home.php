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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
</head>

<body>

<?php
    include_once '../page_parts/header.php';
?>
    <!--freedom for your dog-->
    <div class="container mt-4 p-4 mx-auto" >
        <img src="../images/freedom.jpg" alt="dog" id="homePicture">
    </div>
    <!--how to use site-->
    <div class="container border rounded-pill p-4 mt-4" style="background-color: #C4C4C4">
            <div class="d-flex justify-content-between align-items-center site-journey">
                <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal_signup" style="width: 10rem; height:4rem; background-color: #866464"><b>Sign Up!</b></button>
                <div><img src="../images/arrow.png" alt="arrow" style="width: 90px; height: 80px"></div>
                <button id="findWalkers1" type="button" class="findWalkers btn btn-outline-dark rounded-pill" style="width: 10rem; height:4rem; background-color: #866464"><b>Find your dog walker!</b></button>
                <div><img src="../images/arrow.png" alt="arrow" style="width: 90px; height: 80px"></div>
                <button id="findWalkers2" type="button" class="findWalkers btn btn-outline-dark rounded-pill" style="width: 10rem; height:4rem; background-color: #866464"><b>Enjoy your freedom!</b></button>
            </div>
    </div>


<!--all walkers-->

    <div class="container d-flex justify-content-between karte">
        <div class="row border rounded karta d-flex justify-content-center fixed">
            <h1 class="d-flex justify-content-center">Best rated dog walkers</h1>
            <!--    BEST RATED DOG WALKERS-->
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
                    <div class="col-md-4 align-self-center p-2 ">
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
    </div>

    <!--About us-->
    <div class="container border rounded p-4 mb-4" style="background-color: #C4C4C4; ">
        <div class="d-flex align-items-start "><img src="../images/paw.svg" class="social"><h2>Here when you need us</h2></div>
        <p class="p-4 about-text">Whether you're looking for daily walks, planning a trip, stuck at work, or just want your best friend to have some company — we offer any day, anytime care.</p>
        <div class="d-flex align-items-start"><img src="../images/paw.svg" class="social"><h2>Safety is serious business</h2></div>
        <p class="p-4 about-text">Your dog's safety is our top priority. Every Pet Caregiver passes an enhanced background check, our services are insured, and support is standing by around the clock.</p>
        <div class="d-flex align-items-start"><img src="../images/paw.svg" class="social"><h2>We've been around the block</h2></div>
        <p class="p-4 about-text">Paw Walks! has a trusted record of experience with over 10M pet care services across 4,600 cities and counting. More than 150,000 Pet Caregivers nationwide are dog people, and it shows.</p>
    </div>



    <!-- FOOTER -->
    <div class="footer">
        <div class="container d-flex justify-content-between p-4">
            <img src="../images/pawwalks.svg" class="logo bottom-logo" alt="PawWalksLogo"/>

                <div class="footer-part">
                    <h6><b>Company</b></h6>
                    <a href="#" >About PawWalks</a> <br>
                    <a href="#">Blog</a>
                </div>
                <div class="footer-part">
                    <h6><b>Support</b></h6>
                    <a href="#" >Trust and Safety</a> <br>
                    <a href="#">Help Center & Safety</a> <br>
                    <a href="#" >Community guidelines</a>
                </div>
                <div class="footer-part">
                    <h6><b>Apply</b></h6>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_signup">Become a Dog Walker</a>
                </div>
                <div class="d-flex align-self-end soc-icons footer-part">
                    <a href="#" class="p-2"><img src="../images/facebook.png" alt="facebookLogo" class="social"></a>
                    <a href="#" class="p-2"><img src="../images/linkedin.png" alt="linkedinLogo" class="social"></a>
                    <a href="#" class="p-2"><img src="../images/instagram.png" alt="intagramLogo" class="social"></a>
                </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/signup.js"></script>
    <script src="../script/login.js"></script>
    <script src="../script/home.js"></script>

</body>

</html>