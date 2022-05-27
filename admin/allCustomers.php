<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.phone_number, u.picture, u.is_verified, a.street, a.city, a.postal_code 
            FROM user u INNER JOIN address a ON u.address_id=a.id WHERE u.role = 'customer';";
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

<h1 class="m-3">Customers</h1>

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
            <th scope="col">Dog count</th>
            <th scope="col">Options</th>
        </tr>
        <?php
        $count = 1;
        foreach ($result as $r){

            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $sql = "SELECT COUNT(d.id) as c FROM dog d where d.owner_id=".$r['id'];
                $stmt = $conn->prepare($sql);
                if(!$stmt->execute()){
                    echo 'Could not read data from database';
                }
                else {
                    $dog = $stmt->fetch(PDO::FETCH_ASSOC);
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
                        <td>'.$r['city'].' '.$r['postal_code'].'</td>
                        <td>'.$dog['c'].'</td>
                        <td> <button class="btn btn-warning">Change</button> <button class="btn btn-danger">Delete</button> </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
