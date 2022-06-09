<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);

    if(isset($_GET['walk'])){
        $sql = "SELECT d.id as dogID, d.breed_id, d.dog_name, d.gender, d.age, d.notes, b.breed_name , u.email, w.id, wd.walk_id 
					FROM walk w
                    INNER JOIN walk_dogs wd ON w.id = wd.walk_id
                    INNER JOIN dog d ON d.id = wd.dog_id
                    INNER JOIN user u ON d.owner_id = u.id 
                    INNER JOIN breeds b ON b.id= d.breed_id
                    WHERE wd.walk_id = ".$_GET['walk'];
    }else {
        $sql = "SELECT d.id as dogID, d.breed_id, d.dog_name, d.gender, d.age, d.notes, b.breed_name , u.email 
            FROM dog d INNER JOIN user u ON d.owner_id = u.id INNER JOIN breeds b ON b.id= d.breed_id;";
    }
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
                You have some empty fields! It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "invalidGender"){
        echo '<div class="alert alert-danger">
                Gender must be \'m\' or \'f\'! It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($_GET['e'] === "notNumAge"){
        echo '<div class="alert alert-danger">
                Age must be number! It can not be updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}

?>

<h1 class="m-3">Dogs</h1>

<div>

    <table class="table mt-3">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Breed</th>
            <th scope="col">Notes</th>
            <th scope="col">Owner</th>
            <th scope="col">Options</th>
        </tr>
        <?php
        $count = 1;
        foreach ($result as $r){
            echo '
                    <tr>
                        <td>'.$count.'</td>
                        <form action="./options/updateDog.php" method="post">
                        <td><input type="text" name="name" value="'.$r['dog_name'].'"></td>
                        <td><input type="text" name="gender" value="'.$r['gender'].'"></td>
                        <td><input type="number" name="age" value="'.$r['age'].'"></td>
                        <td>    
                            <select name="breed">
                                <option value="'.$r['breed_id'].'" selected disabled>'.$r['breed_name'].'</option>';


            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $sql = "SELECT * FROM breeds";
                $stmt = $conn->prepare($sql);
                if(!$stmt->execute()){
                    echo 'Could not read data from database';
                }
                else {
                    $breeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            foreach ($breeds as $breed){
                echo '<option value="'.$breed['id'].'">'.$breed['breed_name'].'</option>';
            }

            echo'                </select>
                        </td>
                        <td><input type="text" name="notes" value="'.$r['notes'].'"></td>
                        <td style="color: gray;">'.$r['email'].'</td>
                        <td> <button class="btn btn-warning" name="update" value="'.$r['dogID'].'" style="width: 80px; margin-bottom: 5px">Change</button> </form>
                        <form action="./options/deleteDog.php" method="post">
                        <button class="btn btn-danger" name="delete" value="'.$r['dogID'].'" style="width: 80px">Delete</button>
                        </form> </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
