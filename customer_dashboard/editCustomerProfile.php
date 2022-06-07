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
    <title>Paw Walks - My profile</title>
    <link rel="stylesheet" type="text/css" href="../css/editProfileStyle.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    require_once ("../include/dbconfig.inc.php");

    $sqlUser = "SELECT u.first_name, u.last_name, u.email, u.phone_number, u.picture,a.street, a.city, a.postal_code FROM user u
                    INNER JOIN address a ON a.id = u.address_id
                    WHERE u.id = ".$_SESSION['id'];

    $sqlDogNames = "SELECT dog_name, owner_id FROM dog
                            WHERE owner_id = ".$_SESSION['id'];



try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        //for user
        $stmtUser=$conn->prepare($sqlUser);
        $stmtUser->execute();
        $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);

        //for dog names
        $stmtDogName=$conn->prepare($sqlDogNames);
        $stmtDogName->execute();
        $dogNameData = $stmtDogName->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

require_once '../page_parts/header.php';
?>
<div id="update2div"></div>
    <!--Edit Profile-->
    <div class="container d-flex align-self-center" style="padding: 50px 0 !important;">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar d-flex justify-content-center">
                                    <img src="<?php if(!empty($userData['picture'])) echo $userData['picture']; else echo '../include/profile_images/user-icon.png'; ?>" class="img-fluid rounded-circle m-2" alt="Profile picture">
                                </div>
                                <h5 id="emailCust" class="user-email" style="font-weight: bold"><?php echo $userData['email'];?></h5>
                                <h6 class="user-name"><?php echo $userData['first_name']." ".$userData['last_name'];?></h6>
                            </div>
                            <hr>
                            <div class="all-my-dogs">
                                <h5><b>My Dogs</b></h5>
                                <?php
                                if(!empty($dogNameData)){

                                    foreach ($dogNameData as $dogData) {
                                ?>
                                    <a href="./dogAccount.php" style="text-decoration: none; color: black;"><?php echo $dogData['dog_name'] ?></a> <br>

                                <?php
                                    }
                                }else{
                                    ?>
                                    <a href="./createDog.php">Here you can insert all your dogs!</a><br>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters" >
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstNameCust" placeholder="First name" value="<?php echo $userData['first_name'];?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastNameCust" placeholder="Last name" value="<?php echo $userData['last_name'];?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phoneCust" placeholder="Phone number" value="<?php echo $userData['phone_number'];?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-5">
                                    <label for="filename">Choose your profile image: </label> <br>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <form id="formC" action="../include/changeProfilePic.inc.php" enctype="multipart/form-data" method="post">
                                            <input type="file" id="myFileC" name="filename" accept="image/*">
                                            <input type="hidden" name="address" value="customer_dashboard/editCustomerProfile.php">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-1 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="text" class="form-control" id="streetCust" placeholder="Street" value="<?php echo $userData['street'];?>">
                                </div>
                            </div> <br>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="cityCust" placeholder="City" value="<?php echo $userData['city'];?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zip">Postal Code</label>
                                    <input type="text" class="form-control" id="zipCust" placeholder="Postal Code" value="<?php echo $userData['postal_code'];?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <small id="errorUpdateCust" style="color: red;">
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
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right d-flex justify-content-center">
                                    <button id="updateCustomer" class="btn m-4" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000">Update</button>
                                    <button class="btn m-4" type="submit" id="idC" name="id" value="<?php echo $_SESSION['id']; ?>" form="formC" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000">Update profile image</button>

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
<script src="../script/editCustomerProfile.js"></script>
<script src="../script/checkFunctions.js"></script>
<script src="../script/updateImage.js"></script>
</body>
</html>


