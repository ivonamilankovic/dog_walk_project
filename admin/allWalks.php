<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT w.id, w.walk_date, w.start_location, w.end_location, w.description, w.walk_end, w.path, w.status, w.rate, u1.email as cust, u2.email as walker 
            FROM walk w INNER JOIN user u1 ON u1.id=w.customer_id 
            INNER JOIN user u2 ON u2.id = w.walker_id;";
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
}

?>

<h1 class="m-3">Walks</h1>

<div>

    <table class="table mt-3">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Customer</th>
            <th scope="col">Walker</th>
            <th scope="col">Dog count</th>
            <th scope="col">Date start</th>
            <th scope="col">Date end</th>
            <th scope="col">Start loc.</th>
            <th scope="col">End loc.</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Path</th>
            <th scope="col">Rate</th>
            <th scope="col">Options</th>
        </tr>
        <?php
        $count = 1;
        foreach ($result as $r){

            try{
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $sql = "SELECT COUNT(id) as c FROM walk_dogs WHERE walk_id = ".$r['id'];
                $stmt = $conn->prepare($sql);
                if(!$stmt->execute()){
                    echo 'Could not read data from database';
                }
                else {
                    $dogs = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
            catch (Exception $ex){
                echo($ex -> getMessage());
            }

            echo '
                    <tr>
                        <td>'.$count.'</td>
                        <td style="color: gray;">'.$r['cust'].'</td>
                        <td style="color: gray;">'.$r['walker'].'</td>
                        <td><a href="./admin.php?a=d&walk='.$r['id'].'">'.$dogs['c'].'</a></td>
                        <form action="./options/updateWalk.php" method="post">
                        <td><input type="text" name="date" value="'.$r['walk_date'].'"></td>
                        <td><input type="text" name="dur" value="'.$r['walk_end'].'"></td>
                        <td><input type="text" name="start" value="'.$r['start_location'].'"></td>
                        <td><input type="text" name="end" value="'.$r['end_location'].'"></td>
                        <td><input type="text" name="desc" value="'.$r['description'].'"></td>
                        <td style="color: gray;">'.$r['status'].'</td>
                        <td><input type="text" name="path" value="'.$r['path'].'"></td>
                        <td style="color: gray;">'.$r['rate'].'</td>
                        <td> <button class="btn btn-warning" name="update" value="'.$r['id'].'" style="width: 100px; margin-bottom: 5px">Change</button> 
                        </form>
                        <form action="./options/deleteWalk.php" method="post">
                        <button class="btn btn-danger" name="delete" value="'.$r['id'].'" style="width: 100px">Delete</button> 
                        </form></td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
