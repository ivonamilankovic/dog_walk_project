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
<div id="goodMessages"></div>
    <!--dog_walk picture-->
<div class="picture-text">
    <img src="../images/dog_walk.jpg" alt="dog" class="img-fluid w-100">
    <div class="centered text">Dog walking in your neighborhood!</div>
    <div class="centered-bottom btn_see_walkers"><a href="./allWalkers.php"><button type="button" class="btn btn-outline-dark rounded-pill" style=" background-color: #866464">See walkers</button></a></div>
</div>



    <div class="container mt-4 p-4" id="howToUse">
        <!--how to use site-->
        <div class="container-fluid border rounded-pill p-4 mt-4" style="background: rgb(255,239,159); background: radial-gradient(circle, rgba(255,239,159,0.8) 0%, rgba(201,196,196,1) 100%);">
            <div class="d-flex justify-content-between align-items-center site-journey">
                <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal_signup" style="width: 10rem; height:4rem; background-color: #866464"><b>Sign Up!</b></button>
                <div><img src="../images/arrow.png" alt="arrow" style="width: 90px; height: 80px"></div>
                <button id="findWalkers1" type="button" class="findWalkers btn btn-outline-dark rounded-pill" style="width: 10rem; height:4rem; background-color: #866464"><b>Find your dog walker!</b></button>
                <div><img src="../images/arrow.png" alt="arrow" style="width: 90px; height: 80px"></div>
                <button id="findWalkers2" type="button" class="findWalkers btn btn-outline-dark rounded-pill" style="width: 10rem; height:4rem; background-color: #866464"><b>Enjoy your freedom!</b></button>
            </div>
        </div>
    </div>


    <div class="container d-flex justify-content-between karte">
        <div class="row border rounded karta d-flex justify-content-center fixed">
            <h1 class="d-flex justify-content-center my-3">Best rated walkers</h1>
            <!--BEST RATED DOG WALKERS-->

            <?php
            include_once '../include/dbconfig.inc.php';

            $sqlWalkers = "SELECT avg(walk.rate) AS avg_rate, walk.walker_id, user.first_name, user.last_name, user.picture, walker_details.biography
                            FROM walk 
                            INNER JOIN user ON walk.walker_id = user.id
                            INNER JOIN walker_details ON walker_details.walker_id = walk.walker_id
                            WHERE status = 'finished' AND rate IS NOT NULL AND walker_details.is_active = 1 GROUP BY walker_id
                            ORDER BY avg_rate DESC
                            LIMIT 5;";

            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $stmtWalker=$conn->prepare($sqlWalkers);
                $stmtWalker->execute();
                $walkers= $stmtWalker->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            foreach ($walkers as $walker){
            ?>

            <!--karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="<?php if(!empty($walker['picture'])) echo $walker['picture']; else echo '../include/profile_images/user-icon.png'; ?>" class="img-fluid rounded-circle picture_card" alt="profile picture">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $walker['first_name']." ".$walker['last_name'];?> </h5>
                            <p class="card-text"><?php echo $walker['biography'];?></p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="./oneWalker.php?walker=<?php echo $walker['walker_id'];?>">View</a></small><small>Average rate: <?php echo round($walker['avg_rate'], 2);?></small></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    <!--    MOST ACTIVE DOG WALKERS -->

        <div class="row border rounded karta d-flex justify-content-center fixed">
            <h1 class="d-flex justify-content-center my-3">Most active walkers</h1>
            <?php
            $sqlWalkers2 = "SELECT count(walk.id) AS num_walks, walk.walker_id, user.first_name, user.last_name, user.picture, walker_details.biography
                            FROM walk 
                            INNER JOIN user ON walk.walker_id = user.id
                            INNER JOIN walker_details ON walker_details.walker_id = walk.walker_id
                            WHERE status = 'finished' AND rate IS NOT NULL GROUP BY walker_id
                            ORDER BY num_walks DESC
                            LIMIT 5;";

            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $stmtWalker2=$conn->prepare($sqlWalkers2);
                $stmtWalker2->execute();
                $walkers2= $stmtWalker2->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            foreach ($walkers2 as $walker){
            ?>
            <!--1.karta-->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="<?php if(!empty($walker['picture'])) echo $walker['picture']; else echo '../include/profile_images/user-icon.png'; ?>" class="img-fluid rounded-circle picture_card" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $walker['first_name']." ".$walker['last_name'];?></h5>
                            <p class="card-text"><?php echo $walker['biography'];?></p>
                            <span class=" d-flex justify-content-between"><small class="text-muted"><a href="./oneWalker.php?walker=<?php echo $walker['walker_id'];?>">View</a></small><small>Number of walks: <?php echo $walker['num_walks'];?></small></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!--About us-->
    <div class="container-fluid border rounded p-4" style="background-color: #C4C4C4; text-align: center;">
        <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>Here when you need us</h2></div>
        <p class="p-4 about-text">Whether you're looking for daily walks, planning a trip, stuck at work, or just want your best friend to have some company — we offer any day, anytime care.</p>
        <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>Safety is serious business</h2></div>
        <p class="p-4 about-text">Your dog's safety is our top priority. Every Pet Caregiver passes an enhanced background check, our services are insured, and support is standing by around the clock.</p>
        <div class="d-inline"><img src="../images/paw.svg" class="social"><h2>We've been around the block</h2></div>
        <p class="p-4 about-text">Paw Walks! has a trusted record of experience with over 10M pet care services across 4,600 cities and counting. More than 150,000 Pet Caregivers nationwide are dog people, and it shows.</p>
    </div>



    <!-- FOOTER -->
    <div class="footer py-5">
        <div class="container-fluid d-flex justify-content-between p-4 all_in_footer">
            <img src="../images/pawwalks.svg" class="logo bottom-logo" alt="PawWalksLogo"/>
            <div class="links">
                <div class="footer-part">
                    <h6><b>Company</b></h6>
                    <a href="#" >About PawWalks</a> <br>
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