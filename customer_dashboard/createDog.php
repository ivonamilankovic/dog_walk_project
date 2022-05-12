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
require_once ("../include/dbconfig.inc.php");
?>




<div class="container" style="padding: 50px 0">
    <div class="row gutters d-flex justify-content-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <form action="../include/createDog.inc.php" method="post" id="createDogForm">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Dog Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dogName">Dogs name</label>
                                    <input type="text" class="form-control" name="dogName" id="dogName" placeholder="Enter Dogs name" value="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="gender">Dogs gender</label>
                                    <select class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" name="dogGender" id="dogGender">
                                        <option value="choose" name="dogGender" disabled selected>--choose--</option>
                                        <option value="m" name="dogGender">male</option>
                                        <option value="f" name="dogGender">female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dogAge">Age</label>
                                    <input type="age" class="form-control" name="dogAge" id="dogAge" placeholder="Dogs age" min="0" max="30" maxlength="2" value="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dog_breed">Dogs breed</label> <br>
                                    <!--get options from database-->
                                    <?php

                                    $sql = "SELECT breed_name, id FROM breeds";
                                    try{
                                        $dsn = "mysql:host=" . HOST . ";dbname=" . DB;
                                        $conn = new PDO($dsn, USER, PASS);
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();
                                        $results = $stmt->fetchAll();
                                    }
                                    catch (Exception $ex){
                                        echo($ex -> getMessage());
                                    }

                                    ?>
                                    <select class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" name="breed_id" id="dogBreed">
                                        <option value="choose" name="breed_id" disabled selected>--choose--</option>
                                        <?php
                                        foreach ($results as $output) {?>
                                            <option value="<?php echo $output["id"];?>" name="breed_id"><?php echo $output["breed_name"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                     <label for="notes">Notes:</label>
                                    <textarea class="form-control" id="notes" name="notes" placeholder="About your Dog..." style="height: 200px" type="notes"></textarea>
                                </div>
                            </div>
                            <br>
                            <small id="errorDog" style="color: #ff0000"></small>
                            <br>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right d-flex justify-content-center">
                                        <button type="submit" name="createDog" id="createBtn" class="btn m-4" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000">Create a Dog</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/home.js"></script>
<script src="../script/createDog.js"></script>
<script src="../script/checkFunctions.js"></script>
</body>
</html>
