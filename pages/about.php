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
    <link rel="icon" href="../images/title-bar-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@100;300;600&display=swap" rel="stylesheet">
</head>

<body>

<?php
include_once '../page_parts/header.php';


if(isset($_GET['act']) === "success"){
    echo '<script> alert("You have successfully signed up!");</script>';
}
else if(isset($_GET['act']) === "expired"){
    echo '<script> alert("Your registration link has expired! Please sign up again.");</script>';
}

?>


<!--About us-->
<div class="container-fluid border rounded p-4 about_home" style="background-color: #C4C4C4; text-align: center;">
    <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>Here when you need us</h2></div>
    <p class="p-4 about-text">Whether you're looking for daily walks, planning a trip, stuck at work, or just want your best friend to have some company — we offer any day, anytime care.</p>
    <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>Safety is serious business</h2></div>
    <p class="p-4 about-text">Your dog's safety is our top priority. Every Pet Caregiver passes an enhanced background check, our services are insured, and support is standing by around the clock.</p>
    <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>We've been around the block</h2></div>
    <p class="p-4 about-text">Paw Walks has a trusted record of experience with over 10M pet care services across 4,600 cities and counting. More than 150,000 Pet Caregivers nationwide are dog people, and it shows.</p>
</div>



<!-- FOOTER -->
<div class="footer py-5">
    <div class="container-fluid d-flex justify-content-between p-4 all_in_footer">
        <img src="../images/pawwalks.svg" class="logo bottom-logo" alt="PawWalksLogo"/>
        <div class="links">
            <div class="footer-part">
                <h6><b>Company</b></h6>
                <a href="#" >About us</a> <br>
                <a href="#">Blog</a>
            </div>
            <div class="footer-part">
                <h6><b>Support</b></h6>
                <a href="#" >Trust and Safety</a> <br>
            </div>
            <div class="footer-part">
                <h6><b>Apply</b></h6>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_signup">Become a Walker</a>
            </div>
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
<script src="../script/checkFunctions.js"></script>

</body>

</html>