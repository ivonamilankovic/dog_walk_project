<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../pages/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Walks - My walks</title>
    <link rel="stylesheet" type="text/css" href="../css/editProfileStyle.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!--HEADER-->
<?php
require_once '../page_parts/header.php';
require_once ("../include/dbconfig.inc.php");

$sqlList = "SELECT w.id AS reservation_id, w.walker_id, w.customer_id, w.walk_date, w.start_location, w.end_location, w.description, w.duration, w.status, w.rate, wd.walk_id, wd.dog_id, d.id, d.dog_name, u.id, u.first_name, u.last_name, u.email
            FROM walk w
            INNER JOIN walk_dogs wd ON w.id = wd.walk_id
            INNER JOIN dog d ON wd.dog_id = d.id
            INNER JOIN user u ON w.customer_id = u.id
            WHERE w.walker_id = ".$_SESSION['id'];

try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $stmtList=$conn->prepare($sqlList);
    $stmtList->execute();
    $listData = $stmtList->fetchAll(PDO::FETCH_ASSOC);

    $rows = array();
    while( $stmtList->fetch(PDO::FETCH_ASSOC))
        $rows[] = $stmtList;
}
catch (Exception $ex){
    echo($ex -> getMessage());
}


?>

<!--List of walks-->
<div class="container" style="margin-top: 100px">
    <table class="table">
        <tr>
            <th scope="col">Customer name</th>
            <th scope="col">Dogs name</th>
            <th scope="col">Date</th>
            <th scope="col">Start location</th>
            <th scope="col">End location</th>
            <th scope="col">Description</th>
            <th scope="col">Duration</th>
            <th scope="col">Rate</th>
            <th scope="col">Status</th>
            <th scope="col">Change status</th>
            <th scope="col">Save changes</th>
            <th scope="col">Finish walk</th>
        </tr>

        <?php
        foreach ($listData as $data){
            ?>
        <form action="../include/updateStatus.inc.php" method="post">
            <tr>
                <td><?php echo $data['first_name']. " " .$data['last_name']; ?></td>
                <td><?php echo $data['dog_name']; ?></td>
                <td><?php echo $data['walk_date']; ?></td>
                <td><?php echo $data['start_location']; ?></td>
                <td><?php echo $data['end_location']; ?></td>
                <td><?php echo $data['description']; ?></td>
                <td><?php echo $data['duration']; ?></td>
                <td><?php echo $data['rate']; ?></td>
                <td><?php echo $data['status']; ?></td>
                    <td><select name="status" id="status" class="form-select">
                            <option value="<?php echo $data['status']; ?>" disabled selected><?php echo $data['status']; ?></option>
                            <option value="confirmed">confirmed</option>
                            <option value="declined">declined</option>
                            <option value="in progress">in progress</option>
                        </select>
                        <input value="<?php echo $data['reservation_id']; ?>" type="hidden" id="idWalk" name="idWalk">
                        <input type="hidden" value="<?php echo $data['email']; ?>" name="customer_email" id="customer_email">
                    </td>
                    <td><button type="submit" class="btn btn-outline-success" name="saveStatus" id="saveStatus">Save</button> </td>
                    <td><a href="./finishWalk.php" class="btn btn-success">Finish!</a></td>
            </tr>
        </form>
            <?php
        }
        ?>
        
    </table>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/home.js"></script>
<script src="../script/checkFunctions.js"></script>

</body>
</html>

<?php
