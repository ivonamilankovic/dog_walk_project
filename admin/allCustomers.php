<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.phone_number, u.picture, u.is_verified, a.id as addrId, a.street, a.city, a.postal_code 
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
                        <form action="./options/updateCustomer.php" method="post">
                        <td><input type="text" name="first_name" value="'.$r['first_name'].'"></td>
                        <td><input type="text" name="last_name" value="'.$r['last_name'].'"></td>
                        <td><input type="email" name="email" value="'.$r['email'].'"></td>
                        <td><input type="tel" name="phone" value="'.$r['phone_number'].'"></td>
                        <td><input type="text" name="pic" value="'.$r['picture'].'"></td>
                        <td><input type="text" name="is_verified" value="'.$r['is_verified'].'"></td>
                        <td><input type="text" name="street" value="'.$r['street'].'"></td>
                        <td><input type="text" name="city" value="'.$r['city'].'"></td>
                        <td><input type="text" name="PC" value="'.$r['postal_code'].'"></td>
                        <td><a href="./admin.php?a=d&owner='.$r['id'].'">'.$dog['c'].'</a></td>
                        <td> <button class="btn btn-warning" name="update" value="'.$r['id'].' '.$r['addrId'].'">Update</button>
                         </form>
                         <form method="post" action="./options/deleteCustomer.php">
                            <button class="btn btn-danger" name="delete" value="'.$r['id'].' '.$r['addrId'].'">Delete</button> 
                         </form>
                         </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
