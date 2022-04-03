<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Paw Walks - Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/homeStyle.css"/>
</head>

<body>

<!-- HEADER -->

    <div class="header">
        <div class="container d-flex">
            <div class="me-auto p-3"><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></div>
            <div class="p-4"><button type="button" class="btn btn-light"><a href="./login.php" class="link text-dark">log-in</a></button></div>
            <div class="p-4"><button type="button" class="btn btn-light"><a href="./signup.php" class="link text-dark">sign-up</a></button></div>
        </div>
    </div>

        <!-- proba -->
    <div class="containerp-4 d-flex justify-content-center">
    <div class="row border rounded karta fixed">
        <h1 class="d-flex justify-content-center">The best dog walkers</h1>
            <div class="p-4 d-flex justify-content-center">
                <div id="carouselExample" class="carousel carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active w-800 h-400" data-bs-interval="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Sara Babic</h5>
                                            <p class="card-text">sectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                            <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item w-800 h-400" data-bs-interval="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Ivona Milankovic</h5>
                                            <p class="card-text">sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <p class="card-text"><small class="text-muted"><a href="#">View</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item w-800 h-400" data-bs-interval="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Gagi</h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<<<<<<< HEAD
=======
<h>hello</h>
>>>>>>> aa615564aed71a609504069040632be9a1c246a5
</body>

</html>