<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../pages/home.php");
}
if($_SESSION['role'] === 'walker'){
    header('location: ../walker_dashboard/editWalkerProfile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Paw Walks - My walks</title>
    <link rel="icon" href="../images/title-bar-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
</head>

<body>

    <?php
include_once '../page_parts/header.php';
require_once ("../include/dbconfig.inc.php");

$sqlRes = "SELECT w.id, w.walker_id, w.customer_id, w.walk_date, w.start_location, w.end_location, w.walk_end, w.status, wd.walk_id, wd.dog_id, d.id, d.dog_name, u.id, u.first_name, u.last_name 
            FROM walk w
               INNER JOIN walk_dogs wd ON w.id = wd.walk_id
               INNER JOIN dog d ON wd.dog_id = d.id
                INNER JOIN user u ON w.walker_id = u.id
               WHERE w.customer_id = ".$_SESSION['id'];

try{
    $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
    $stmtRes=$conn->prepare($sqlRes);
    $stmtRes->execute();
    $reservationData = $stmtRes->fetchAll(PDO::FETCH_ASSOC);

    $rows = array();
    while( $stmtRes->fetch(PDO::FETCH_ASSOC))
        $rows[] = $stmtRes;
}
catch (Exception $ex){
    echo($ex -> getMessage());
}


?>
    <div class="d-flex justify-content-center p-2">
        <h1>Reserved Walks</h1>
    </div>

    <!--table of reserved walks-->
    <div class="container mt-4">
        <table class="table">

            <tr>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">Start location</th>
                <th scope="col">End location</th>
                <th scope="col">Walker name</th>
                <th scope="col">Dogs name</th>
                <th scope="col">Status</th>
            </tr>
            <?php
    foreach ($reservationData as $walk){
        ?>
            <tr>
                <td><?php echo $walk['walk_date']; ?></td>
                <td><?php echo $walk['walk_end']; ?></td>
                <td><?php echo $walk['start_location']; ?></td>
                <td><?php echo $walk['end_location']; ?></td>
                <td><?php echo $walk['first_name']. " " .$walk['last_name']; ?></td>
                <td><?php echo $walk['dog_name']; ?></td>
                <td><?php echo $walk['status']; ?></td>
            </tr>
            <?php
    }
    ?>
        </table>

    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../script/home.js"></script>
    <script src="../script/checkFunctions.js"></script>
</body>

</html>