<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.phone_number, u.picture, u.is_verified, a.street, a.city, a.postal_code 
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
                $sql = "SELECT wd.biography, wd.is_active, b.breed_name 
                        FROM walker_details wd INNER JOIN walker_favourite_breeds wb ON wb.walker_id =".$r['id']." 
                        INNER JOIN breeds b ON b.id= wb.breed_id WHERE wd.walker_id = ".$r['id'];
                $stmt = $conn->prepare($sql);
                if(!$stmt->execute()){
                    echo 'Could not read data from database';
                }
                else {
                    $details = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            echo '
                    <tr>
                        <td>'.$count.'</td>
                        <td>'.$r['first_name'].'</td>
                        <td>'.$r['last_name'].'</td>
                        <td>'.$r['email'].'</td>
                        <td>'.$r['phone_number'].'</td>
                        <td>'.$r['picture'].'</td>
                        <td>'.$r['is_verified'].'</td>
                        <td>'.$r['street'].'</td>
                        <td>'.$r['city'].' '.$r['postal_code'].'</td>';


            if($details['is_active'] == 0){
                echo '<td><button class="btn btn-success">Make active</button> </td>';
            }
            elseif ($details['is_active'] == 1){
                echo '<td>'.$details['is_active'].'</td>';
            }

            if(!empty($details['biography'])){
                echo '<td>'.$details['biography'].'</td>';
            }
            else {
                echo '<td></td>';
            }

            if(!empty($details['breed_name'])){
                echo '<td>'.$details['breed_name'].'</td>';
            }
            else {
                echo '<td></td>';
            }
            echo '
                        <td> <button class="btn btn-warning">Change</button> <button class="btn btn-danger">Delete</button> </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
