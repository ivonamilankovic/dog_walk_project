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
                    <form action="./options/updateBreed.php" method="post">
                        <td>'.$count.'</td>
                        <td><input type="text" name="breed_name" value="'.$r['breed_name'].'"></td>
                        <td> <button class="btn btn-warning" name="update" value="'.$r['id'].'">Update</button> 
                    </form>
                    <form action="./options/deleteBreed.php" method="post">
                        <button class="btn btn-danger" name="delete" value="'.$r['id'].'">Delete</button> 
                    </form>
                    </td>
                    </tr>
                ';
                $count++;
            }
        ?>

    </table>

</div>
