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

<!-- MAIN -->

<div class="container">
<div class="input-group rounded p-4">
    <!-- SEARCH -->

        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

    <!-- DROPDOWN -->

        <li class="nav-item dropdown lista">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                All walkers
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Ime Prezime</a></li>
                <li><a class="dropdown-item" href="#">Ime Prezime</a></li>
                <li><a class="dropdown-item" href="#">Ime Prezime</a></li>
            </ul>
        </li>

</div>

    <!-- GALLERY -->

    <div class="p-4 d-flex justify-content-center">
        <div id="carouselExample" class="carousel carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active w-1200 h-400" data-bs-interval="4000">
                    <img src="images/dog1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="carousel-item w-1200 h-400" data-bs-interval="4000">
                    <img src="images/dog2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="carousel-item w-1200 h-400" data-bs-interval="4000">
                    <img src="images/dog3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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

    <!-- CARDS -->

    <div class="row justify-content-around">
        <!-- BEST RATED DOG WALKERS -->
        <div class="border rounded col karta">
            <h3>Best rated dog walkers</h3>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOST ACTIVE DOG WALKERS -->
        <div class="border rounded col karta">
            <h3>Most active dog walkers</h3>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center d-flex justify-content-center p-2">
                        <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ime Prezime</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="card-text"><small class="text-muted">Ocena</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- WHY PAW WALKS -->

<div class=" p-5 d-flex justify-content-center">

    <table class="w-50">
        <tr>
            <td colspan="2"><h1 class="d-flex justify-content-center p-4">Why Paw Walks?</h1></td>
        </tr>
        <tr>
            <td class="d-flex justify-content-center"><div class="sirina"><img src="images/paw.svg" alt="paw" class="paw"></div></td>
            <td><h3>Here when you need us</h3></td>
        </tr>
        <tr>
            <td class="line">|</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
        </tr>
        <tr>
            <td class=" d-flex justify-content-center"><img src="images/paw.svg" alt="paw" class="paw"></td>
            <td><h3>Safety is serious business</h3></td>
        </tr>
        <tr>
            <td class="line">|</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
        </tr>
        <tr>
            <td class=" d-flex justify-content-center"><img src="images/paw.svg" alt="paw" class="paw"></td>
            <td><h3>All about convenience</h3></td>
        </tr>
        <tr>
            <td class="line"></td>
            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
        </tr>

    </table>
</div>


</div>
<!-- FOOTER -->
<div class="footer">
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

</body>

</html>