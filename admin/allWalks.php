<?php

include_once '../include/dbconfig.inc.php';

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $sql = "SELECT w.id, w.walk_date, w.start_location, w.end_location, w.description, w.duration, w.path, w.status, w.rate, u1.email as cust, u2.email as walker 
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
?>

<h1 class="m-3">Walks</h1>

<div>

    <table class="table mt-3">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Customer</th>
            <th scope="col">Walker</th>
            <th scope="col">Dog count</th>
            <th scope="col">Date</th>
            <th scope="col">Start loc.</th>
            <th scope="col">End loc.</th>
            <th scope="col">Duration</th>
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
                        <td>'.$r['cust'].'</td>
                        <td>'.$r['walker'].'</td>
                        <td>'.$dogs['c'].'</td>
                        <td>'.$r['walk_date'].'</td>
                        <td>'.$r['start_location'].'</td>
                        <td>'.$r['end_location'].'</td>
                        <td>'.$r['duration'].'</td>
                        <td>'.$r['description'].'</td>
                        <td>'.$r['status'].'</td>
                        <td>'.$r['path'].'</td>
                        <td>'.$r['rate'].'</td>
                        <td> <button class="btn btn-warning">Change</button> <button class="btn btn-danger">Delete</button> </td>
                    </tr>
                ';
            $count++;
        }
        ?>

    </table>

</div>
