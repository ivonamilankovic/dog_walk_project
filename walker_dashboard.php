<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogWalker - dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/editProfileStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- HEADER -->

<div class="fixed-top" style="background-color: #9c7a97">
    <div class="d-flex container">
        <div class="me-auto p-4"><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" style="height: 60px"></a></div>
        <div class="p-4 align-self-center">
            <img src="https://picsum.photos/50/50" class="img-fluid rounded-circle m-2" alt="Profile picture">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </button>
                <ul class="dropdown-menu">
                    <form method="post">
                    <li><a class="dropdown-item" id="btnListOfWalks" name="btnListOfWalks" href="#">List of Walks</a></li>
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
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

<!--List of walks-->
<!--<div class="container">
    <table class="table">
        <tr>
            <th scope="col">Broj setnje</th>
            <th scope="col">Dogs</th>
            <th scope="col">Breeds</th>
            <th scope="col">Status</th>
            <th scope="col">Datum</th>
            <th scope="col">Rate</th>
            <th scope="col">Select</th>
        </tr>
        <tr>
            <td>1.</td>
            <td>Fluffy</td>
            <td>American Bulldog - Američki Bulldog</td>
            <td>Pending</td>
            <td>2022.02.04</td>
            <td>-</td>
            <td>
                <select>
                    <option>Select</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Declined">Declined</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Puppy</td>
            <td>Africanis - Afrički Pas</td>
            <td>Finished</td>
            <td>2022.11.10.</td>
            <td>***</td>
            <td>
                <select>
                    <option>Select</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Declined">Declined</option>
                </select>
            </td>
        </tr>
    </table>
</div> -->

<!--Edit Profile-->
<div class="container d-flex align-self-center" style="padding: 120px 0 0 0">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle m-2" alt="Profile picture">
                            </div>
                            <h5 class="user-name">Ime Prezime</h5>
                            <h6 class="user-email">imeprezime@gmail.com</h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">First name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your first name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Last name</label>
                                <input type="email" class="form-control" id="eMail" placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="favbreed">Favourite dog breeds</label>
                                <input class="form-control" id="favbreed" placeholder="Enter your favourite dog breed">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="biography">Biography:</label>
                                <input class="form-control" id="biography" placeholder="Biography..." style="height: 200px">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="filename">Choose imege: </label> <br>
                                <img src="https://picsum.photos/100/100" class="img-fluid rounded-circle m-2" alt="Profile picture">
                                <form action="/action_page.php">
                                    <input type="file" id="myFile" name="filename">
                                    <input type="submit" value="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Postal Code</label>
                                <input type="text" class="form-control" id="zIp" placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php
