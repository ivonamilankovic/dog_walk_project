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
    <title>Paw Walks - My dogs</title>
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
</head>

<body>

<?php
include_once '../page_parts/header.php';
?>

<!--cards-->
<?php
    require_once '../page_parts/header.php';
    require_once ("../include/dbconfig.inc.php");

    $sqlDog = "SELECT d.dog_name, d.gender, d.age, d.notes, d.breed_id, d.owner_id, b.breed_name FROM dog d
                    INNER JOIN breeds b ON b.id = d.breed_id
                    WHERE d.owner_id = ".$_SESSION['id'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $stmtDog=$conn->prepare($sqlDog);
        $stmtDog->execute();
        $dogData = $stmtDog->fetchAll(PDO::FETCH_ASSOC);

        $rows = array();
        while( $stmtDog->fetch(PDO::FETCH_ASSOC))
            $rows[] = $stmtDog;
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }


?>
<div class="container d-flex justify-content-around p-4">
    <?php
        foreach ($dogData as $dog){
    ?>
    <div class="border border-2 border-dark rounded p-4 text-center" style="background-color: rgba(191,172,170,0.75); border-color: #44310d;">
            <div class="p-2"><b><?php echo $dog['dog_name']; ?></b></div>
            <div class="p-2">Dogs breed: <?php echo $dog['breed_name']; ?></div>
            <div class="p-2">Gender:
                <?php
                if($dog['gender'] === 'm'){
                    echo "male";
                }
                elseif($dog['gender'] === "f"){
                    echo "female";
                }
                ?>
            </div>
            <div class="p-2">Age: <?php echo $dog['age']; ?></div>
            <div class="p-2"><?php echo $dog['notes']; ?></div>

        <!--uraditi da radi delete dugme-->
            <div class="p-2"><button class="btn btn-secondary btn-sm" style="background-color: #bfacd5">Delete Dog</button></div>
    </div>
    <?php
        }
    ?>
</div>











<div class="text-right d-flex justify-content-center">
    <button type="button" id="submit" name="submit" class="btn m-4" style="background-color: #9c7a97; border: 1px solid #000000"><a href="./createDog.php" style="color: #000000; text-decoration: none; font-weight: bold;">Add Dog to your profile...</a></button>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/home.js"></script>

</body>
</html>
