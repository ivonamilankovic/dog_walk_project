<!-- HEADER -->

<div class="fixed-top" style="background-color: #9c7a97">
    <div class="d-flex container">
        <div class="me-auto p-4"><a href="../home.php"> <img src="../images/pawwalks.svg" alt="PawWalks-logo" style="height: 60px"></a></div>
        <div class="p-4 align-self-center">
            <img src="https://picsum.photos/50/50" class="img-fluid rounded-circle m-2" alt="Profile picture">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </button>
                <ul class="dropdown-menu">
                    <form method="post">
                        <li><a class="dropdown-item" id="btnListOfWalks" name="btnListOfWalks" href="./listOfWalks.php">List of Walks</a></li>
                        <li><a class="dropdown-item" href="./editProfile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="#">Change password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">LogOut</a></li>
                    </form>
                </ul>
            </div>
        </div>
        <div class="p-4 align-self-center">
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal_signup">
                LogOut
            </button>
        </div>
    </div>
</div>
