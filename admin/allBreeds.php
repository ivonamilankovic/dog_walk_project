<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT * FROM breeds";
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

<h1 class="m-3">Breeds</h1>

<div>

    <table class="table mt-3">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Breed name</th>
            <th scope="col">Options</th>
        </tr>
        <?php
        $count = 1;
            foreach ($result as $r){
                echo '
                    <tr>
                        <td>'.$count.'</td>
                        <td>'.$r['breed_name'].'</td>
                        <td> <button class="btn btn-warning">Change</button> <button class="btn btn-danger">Delete</button> </td>
                    </tr>
                ';
                $count++;
            }
        ?>

    </table>

</div>
