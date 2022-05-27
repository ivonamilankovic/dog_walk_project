<?php
session_start();
if(!isset($_SESSION['id'])){
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
        <link rel="stylesheet" href="../css/homeStyle.css">
        <link rel="stylesheet" href="../css/scrollbar.css">
    </head>
    <body>

<?php
include_once '../page_parts/header.php';
?>




<div class="container">

    <div class="d-flex justify-content-center p-4">
        <h1>Rate a walk!</h1>
    </div>

    <div class="d-flex justify-content-center">
        <p>Walkers comment for the walk:</p>
    </div>

    <div class="d-flex justify-content-center">
        <form action="../include/rateWalk.inc.php" method="post">
            <table class="p-4">
                <tr><td class="px-4">1</td><td class="px-4">2</td><td class="px-4">3</td><td class="px-4">4</td><td class="px-4">5</td></tr>
                <tr><td class="px-4"><input type="radio" name="rate" value="1"></td>
                    <td  class="px-4"><input type="radio" name="rate" value="2"></td>
                    <td class="px-4"><input type="radio" name="rate" value="3"></td>
                    <td class="px-4"><input type="radio" name="rate" value="4"></td>
                    <td class="px-4"><input type="radio" name="rate" value="5"></td>
                </tr>
            </table>
            <div class="d-flex justify-content-center p-4">
                <button type="submit" name="rate" id="rate" class="btn btn-success">Rate!</button>
            </div>

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
