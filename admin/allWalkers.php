<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.phone_number, u.picture, u.is_verified, a.id as addrID, a.street, a.city, a.postal_code 
            FROM user u INNER JOIN address a ON u.address_id=a.id WHERE u.role = 'walker';";
    $stmt = $conn->prepare($sql);
    if(!$stmt->execute()){
        echo 'Could not read data from database';
    }
    else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
catch (Exception $ex){
    echo($ex -> getMessage());
}



if(isset($_GET['e'])){
    if($_GET['e'] === "empty"){
        echo '<div class="alert alert-danger">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                You have some empty fields! It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "wrongFormat"){
        echo '<div class="alert alert-danger">
                Email is not in correct format! It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "wrongLengthPH"){
        echo '<div class="alert alert-danger">
                Phone can\'t be shorter than 5 or longer than 15 digits. It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "wrongLengthPC"){
        echo '<div class="alert alert-danger">
                Postal code must have 5 to 10 digits. It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "notNumPH"){
        echo '<div class="alert alert-danger">
                Phone must be numbers. It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "notNumPC"){
        echo '<div class="alert alert-danger">
                Postal code must be numbers. It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "verNotValid"){
        echo '<div class="alert alert-danger">
                Verification can be 1 (verified) or 0 (not verified). It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}


?>

<h1 class="m-3">Walkers</h1>

<div>

    <table class="table mt-3">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone number</th>
            <th scope="col">Picture</th>
            <th scope="col">Verified</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">PC</th>
            <th scope="col">Active</th>
            <th scope="col">Biography</th>
            <th scope="col">Fav. breed</th>
            <th scope="col">Options</th>
        </tr>
        <?php
        $count = 1;
        foreach ($result as $r){

            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $sql = "SELECT biography, is_active
                        FROM walker_details WHERE walker_id = ".$r['id'];
                $stmt = $conn->prepare($sql);
                if(!$stmt->execute()){
                    echo 'Could not read data from database';
                }
                else {
                    $details = $stmt->fetch(PDO::FETCH_ASSOC);
                    $stmt=null;

                    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                    $sql = "SELECT b.breed_name, b.id as breed_id FROM walker_favourite_breeds wb 
                            INNER JOIN breeds b ON wb.breed_id=b.id WHERE wb.walker_id = ".$r['id'];
                    $stmt = $conn->prepare($sql);
                    if(!$stmt->execute()){
                        echo 'Could not read data from database';
                    }
                    else {
                        $favBreed = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                }
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            echo '
                    <tr>
                        <td>'.$count.'</td>
                        <form action="./options/updateWalker.php" method="post">
                        <td><input type="text" name="fn" value="'.$r['first_name'].'"></td>
                        <td><input type="text" name="ln" value="'.$r['last_name'].'"></td>
                        <td><input type="email" name="email" value="'.$r['email'].'"></td>
                        <td><input type="tel" name="phone" value="'.$r['phone_number'].'"></td>
                        <td><input type="text" name="pic" value="'.$r['picture'].'"></td>
                        <td><input type="text" name="is_ver" value="'.$r['is_verified'].'"></td>
                        <td><input type="text" name="strt" value="'.$r['street'].'"></td>
                        <td><input type="text" name="city" value="'.$r['city'].'"></td>
                        <td><input type="text" name="PC" value="'.$r['postal_code'].'"></td>';

            if($details) {
                if ($details['is_active'] == 0) {
                    echo '<td><a href="./options/makeWalkerActive.php?id=' . $r['id'] . '" class="btn btn-success" >Make active</a> </td>';
                } elseif ($details['is_active'] == 1) {
                    echo '<td><input type="text" name="is_active" value="' . $details['is_active'] . '"></td>';
                }

                if (!empty($details['biography'])) {
                    echo '<td><input type="text" name="bio" value="' . $details['biography'] . '"></td>';
                } else {
                    echo '<td></td>';
                }

            }else{
                echo '<td></td>';
                echo '<td></td>';
            }
            if($favBreed){
                if (!empty($favBreed['breed_name'])) {
                    echo '<td>
                        <select name="breed">
                                <option value="' . $favBreed['breed_id'] . '" selected disabled>' . $favBreed['breed_name'] . '</option>';


                    try {
                        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                        $sql = "SELECT * FROM breeds";
                        $stmt = $conn->prepare($sql);
                        if (!$stmt->execute()) {
                            echo 'Could not read data from database';
                        } else {
                            $breeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        }
                    } catch (Exception $ex) {
                        echo($ex->getMessage());
                    }

                    foreach ($breeds as $breed) {
                        echo '<option value="' . $breed['id'] . '">' . $breed['breed_name'] . '</option>';
                    }

                    echo '</select></td>';
                } else {
                    echo '<td></td>';
                }
            }
            else{
                echo '<td></td>';
            }
            echo '
                        <td> <button class="btn btn-warning" name="update" value="'.$r['id'].' '.$r['addrID'].'">Change</button> 
                        </form>
                        <form action="./options/deleteWalker.php" method="post">
                        <button class="btn btn-danger" name="delete" value="'.$r['id'].' '.$r['addrID'].'">Delete</button>
                         </form></td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
