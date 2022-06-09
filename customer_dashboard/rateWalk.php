<?php
session_start();
if($_SESSION['role'] === 'walker'){
    header('location: ../walker_dashboard/editWalkerProfile.php');
}
if(!isset($_GET['id_walk'])){
    header("location: ../pages/home.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Paw Walks - My walks</title>
        <link rel="icon" href="../images/title-bar-icon.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/homeStyle.css">
        <link rel="stylesheet" href="../css/scrollbar.css">
        <style>
            input[type=radio] {
                display: none;
            }
            label {
                font-size: 30px;
            }
            input:checked ~ label {
                background-color: #ebebeb;
                border-radius: 50px;
            }
            td{
                width: fit-content;
                text-align: center;
            }
        </style>
    </head>
    <body>

<?php
include_once '../page_parts/header.php';

require_once ("../include/dbconfig.inc.php");

$sql = "SELECT walk.path FROM walk WHERE walk.id = ". $_GET['id_walk'];


try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    //for user
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

}
catch (Exception $ex){
    echo($ex -> getMessage());
}
?>


<div class="container">

    <div class="d-flex justify-content-center p-4">
        <h1>Rate a walk!</h1>
    </div>

    <div class="d-flex justify-content-center">
        <p>Walkers comment for the walk:</p>
    </div>

    <div class="d-flex justify-content-center">
        <p><?php echo $data['path'];?></p>
    </div>

    <div class="d-flex justify-content-center">
        <form action="../include/rateWalk.inc.php" method="post">
            <table class="p-4">
                <tr>
                    <td class="px-4">1</td>
                    <td class="px-4">2</td>
                    <td class="px-4">3</td>
                    <td class="px-4">4</td>
                    <td class="px-4">5</td>
                </tr>
                <tr>
                    <td class="px-4"><input id="r1" type="radio" name="rate" value="1"><label for="r1"><img src="../images/star.png" alt="star"></label></td>
                    <td  class="px-4"><input id="r2" type="radio" name="rate" value="2"><label for="r2"><img src="../images/star.png" alt="star"></label></td>
                    <td class="px-4"><input id="r3" type="radio" name="rate" value="3" checked><label for="r3"><img src="../images/star.png" alt="star"></label></td>
                    <td class="px-4"><input id="r4" type="radio" name="rate" value="4"><label for="r4"><img src="../images/star.png" alt="star"></label></td>
                    <td class="px-4"><input id="r5" type="radio" name="rate" value="5"><label for="r5"><img src="../images/star.png" alt="star"></label></td>
                </tr>
            </table>
            <div class="d-flex justify-content-center p-4">
                <button type="submit" name="rateBtn" id="rate" class="btn btn-success">Rate!</button>
            </div>
            <input type="hidden" id="id_walk" name="id_walk" value="<?=$_GET['id_walk']?>">
        </form>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/home.js"></script>
<script src="../script/checkFunctions.js"></script>
    </body>
</html>
