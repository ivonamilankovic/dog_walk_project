<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../pages/home.php");
}
if($_SESSION['role'] === 'customer'){
    header('location: ../customer_dashboard/editCustomerProfile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Walks - My profile</title>
    <link rel="stylesheet" type="text/css" href="../css/editProfileStyle.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<!--HEADER-->
<?php

    require_once ("../include/dbconfig.inc.php");

        $sql1 = "SELECT u.first_name, u.last_name, u.email, u.phone_number, u.picture,a.street, a.city, a.postal_code FROM user u
                INNER JOIN address a ON a.id = u.address_id
                WHERE u.id =".$_SESSION['id'];

        $sql2 ="SELECT wd.biography, wd.is_active FROM walker_details wd 
                INNER JOIN user u ON u.id = wd.walker_id
                WHERE u.id = ".$_SESSION['id'];

        $sql3="SELECT b.id, b.breed_name FROM breeds b 
                INNER JOIN walker_favourite_breeds wb ON wb.breed_id=b.id
                INNER JOIN user u ON u.id = wb.walker_id
                WHERE u.id=".$_SESSION['id'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $stmt1=$conn->prepare($sql1);
        $stmt1->execute();
        $userData = $stmt1->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }
    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $stmt2=$conn->prepare($sql2);
        $stmt2->execute();
        $userDetails = $stmt2->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }
    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $stmt3=$conn->prepare($sql3);
        $stmt3->execute();
        $userFavBreed = $stmt3->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

require_once '../page_parts/header.php';
?>

<div id="updatemsg"> </div>
<div class="loader"><img src="../images/loading-img.gif" alt="loading..."></div>

<!--Edit Profile-->
<div class="container d-flex align-self-center" style="padding: 50px 0 !important;">
    <div class="row mx-auto gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body" style="padding: 1rem 1rem !important;">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar d-flex justify-content-center">
                                <img src="<?php if(!empty($userData['picture'])) echo $userData['picture']; else echo '../include/profile_images/user-icon.png'; ?>" class="img-fluid rounded-circle m-2" alt="Profile picture">
                            </div>
                            <h5 id="emailWalker" class="user-email" style="font-weight: bold"><?php if(!empty($userData['email'])) echo $userData['email'];?></h5>
                            <h6 class="user-name"><?php if(!empty($userData['first_name']) && !empty($userData['last_name'])) echo $userData['first_name']. " " . $userData['last_name'];?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p><?php if(!empty($userDetails['biography'])) echo $userDetails['biography'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstNameW" placeholder="First name" value="<?php if(!empty($userData['first_name'])) echo $userData['first_name'];?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastNameW" placeholder="Last name" value="<?php if(!empty($userData['last_name'])) echo $userData['last_name'];?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phoneW" placeholder="Phone number" value="<?php if(!empty($userData['phone_number'])) echo $userData['phone_number'];?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="favbreed">Favourite dog breed</label> <br>
                                <!--get options from database-->
                                <?php

                                $sql = "SELECT * FROM breeds";
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
                                <select id="favBreedSelect" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-select js-example-basic-single"  <?php if($userDetails['is_active'] == 0){ echo 'disabled readonly';} ?>>
                                    <option value="<?php if(!empty($userFavBreed['id'])) echo $userFavBreed['id'];?>"><?php if(!empty($userFavBreed['breed_name'])) echo $userFavBreed['breed_name'];?></option>
                                    <?php
                                        foreach ($results as $output) {?>
                                        <option value="<?php echo $output["id"];?>"><?php echo $output["breed_name"];?></option>
                                        <?php
                                        }
                                        ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="biography">Biography:</label>
                                <textarea <?php if($userDetails['is_active'] == 0){ echo 'disabled readonly';} ?> class="form-control" id="biography" placeholder="Biography..." style="height: 200px"><?php if(!empty($userDetails['biography'])) echo $userDetails['biography'];?></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group choose_img_fg">
                                <label for="filename">Choose your profile image: </label> <br>
                                <form id="formW" enctype="multipart/form-data" action="../include/changeProfilePic.inc.php" method="post">
                                    <input type="file" id="myFileW" name="filename" accept="image/*">
                                    <input type="hidden" name="address" value="walker_dashboard/editWalkerProfile.php">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="text" class="form-control" id="streetW" placeholder="Street" value="<?php if(!empty($userData['street'])) echo $userData['street'];?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="cityW" placeholder="City" value="<?php if(!empty($userData['city'])) echo $userData['city'];?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zip">Postal Code</label>
                                <input type="text" class="form-control" id="zipW" placeholder="Postal Code" value="<?php if(!empty($userData['postal_code'])) echo $userData['postal_code'];?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <small id="errUpdateWalker" style="color: red; text-align: center;">
                    <?php
                    if(isset($_GET['e'])){
                        if($_GET['e'] == "wrongImgFormat"){
                            echo "Wrong picture format.";
                        }
                        elseif($_GET['e'] == "fileError"){
                            echo "Unexpected file error.";
                        }
                        elseif($_GET['e'] == "bigImg"){
                            echo "Image too big.";
                        }
                        elseif($_GET['e'] == "couldNotMoveImg"){
                            echo "Some issues occurred.";
                        }
                        elseif($_GET['e'] == "failedStmt"){
                            echo "Failed to update. Please try again.";
                        }
                    }

                    ?>
                    </small>
                    <br>
                    <input type="hidden" id="is_active" value="<?php echo $userDetails['is_active']; ?>" name="is_active">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right justify-content-center buttons_editprof">
                                <button id="updateWalker" class="btn m-4" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000" >Update</button>
                                <button class="btn m-4" type="submit" id="idW" name="id" value="<?php echo $_SESSION['id']; ?>" form="formW" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000">Update profile image</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/home.js"></script>
<script src="../script/editWalkerProfile.js"></script>
<script src="../script/checkFunctions.js"></script>
<script src="../script/updateImage.js"></script>
<script src="../script/updateImage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
</body>
</html>



