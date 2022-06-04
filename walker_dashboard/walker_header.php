<?php
require_once '../include/dbconfig.inc.php';

$sql = "SELECT picture FROM user WHERE id=".$_SESSION['id'];
try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo($ex->getMessage());
}
?>

<div class="p-4 align-self-center">
    <img src="<?php if(!empty($user['picture'])) echo $user['picture']; else echo '../include/profile_images/user-icon.png'; ?>" width="50" height="50" class="img-fluid rounded-circle m-2 profile_picture" alt="Profile picture">
    <div class="btn-group">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../walker_dashboard/listOfWalks.php">List of Walks</a></li>
            <li><a class="dropdown-item" href="../walker_dashboard/editWalkerProfile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="../pages/changePassword.php">Change password</a></li>
        </ul>
    </div>
</div>