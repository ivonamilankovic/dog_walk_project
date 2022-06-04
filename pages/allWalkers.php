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
    <title>Paw Walks - All Walkers</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
</head>

<body>

<?php
include_once '../page_parts/header.php';
include_once '../include/dbconfig.inc.php';

if(isset($_GET['name'])){
    $sqlWalkers = "SELECT u.id, u.first_name, u.last_name, u.picture, wd.biography FROM user u
                INNER JOIN walker_details wd ON wd.walker_id = u.id
                WHERE  u.role='walker' AND (u.first_name LIKE '%".$_GET['name']."%' OR u.last_name LIKE '%".$_GET['name']."%' ) AND wd.is_active = 1;";
}else {

    $sqlWalkers = "SELECT avg(walk.rate) AS avg_rate, walk.walker_id, user.first_name, user.last_name, user.picture, walker_details.biography
                            FROM walk 
                            INNER JOIN user ON walk.walker_id = user.id
                            INNER JOIN walker_details ON walker_details.walker_id = walk.walker_id
                            WHERE status = 'finished' AND rate IS NOT NULL AND walker_details.is_active = 1 GROUP BY walker_id";
}
try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $stmtWalker=$conn->prepare($sqlWalkers);
    $stmtWalker->execute();
    $walkers= $stmtWalker->fetchAll(PDO::FETCH_ASSOC);
}
catch (Exception $ex){
    echo($ex -> getMessage());
}

if(!empty($walkers)){

foreach ($walkers as $walker){
    ?>

    <div class="container ">
        <div class="row border rounded karta mx-auto" style="max-width: 900px;">
            <div class="card mb-3" style="max-width: 900px;">
                <div class="row g-0">
                    <div class="col-md-4 align-self-center p-2">
                        <img src="<?php if(!empty($walker['picture'])) echo $walker['picture']; else echo '../include/profile_images/user-icon.png'; ?>" width="130" height="130" class="img-fluid rounded-circle picture_card" alt="profile picture">
                    </div>
                    <div class="col-md-8 my-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $walker['first_name']." ".$walker['last_name'];?></h5>
                            <p class="card-text"><?php echo $walker['biography'];?></p>
                            <span class="d-flex justify-content-between align-middle">
                                <small class="text-muted">
                                    <a id="viewWalker" href="./oneWalker.php?walker=<?php echo $walker['walker_id'];?>">View</a>
                                </small>
                                <small>Average rate: <?php echo round($walker['avg_rate'], 2);?></small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
}
else{
    ?>
    <h5 class="mt-5 text-center">No results.</h5>
<?php
}
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/signup.js"></script>
<script src="../script/login.js"></script>
<script src="../script/home.js"></script>
<script src="../script/checkFunctions.js"></script>
</body>
</html>
