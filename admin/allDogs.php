<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT d.id, d.dog_name, d.gender, d.age, d.notes, b.breed_name , u.email 
            FROM dog d INNER JOIN user u ON d.owner_id = u.id INNER JOIN breeds b ON b.id= d.breed_id;";
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
                        <td>'.$r['dog_name'].'</td>
                        <td>'.$r['gender'].'</td>
                        <td>'.$r['age'].'</td>
                        <td>'.$r['breed_name'].'</td>
                        <td>'.$r['notes'].'</td>
                        <td>'.$r['email'].'</td>
                        <td> <button class="btn btn-warning">Change</button> <button class="btn btn-danger">Delete</button> </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
