<div class="p-4 align-self-center">
    <img src="<?php if(!empty($userData['picture'])) echo $userData['picture']; else echo '../include/profile_images/user-icon.png'; ?>" width="50" height="50" class="img-fluid rounded-circle m-2 mx-auto" alt="Profile picture">
    <div class="btn-group">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../customer_dashboard/dogAccount.php">Dog account</a></li>
            <li><a class="dropdown-item" href="../customer_dashboard/reservedWalks.php">Reserved walks</a></li>
            <li><a class="dropdown-item" href="../customer_dashboard/editCustomerProfile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="../pages/changePassword.php">Change password</a></li>
        </ul>
    </div>
</div>
