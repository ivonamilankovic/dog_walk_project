<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogWalker - dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- HEADER -->

<div style="background-color: #9c7a97">
    <div class="d-flex">
        <div class="me-auto p-4"><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" style="height: 60px"></a></div>
        <div class="p-4 align-self-center">
            <img src="https://picsum.photos/50/50" class="img-fluid rounded-circle m-2" alt="Profile picture">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">List of Walks</a></li>
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="#">Change password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">LogOut</a></li>
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
<div class="container">
    <table class="table">
        <tr>
            <th scope="col">Broj setnje</th>
            <th scope="col">Dogs</th>
            <th scope="col">Status</th>
            <th scope="col">Datum</th>
            <th scope="col">Rate</th>
            <th scope="col">Select</th>
        </tr>
        <tr>
            <td>1.</td>
            <td>Fluffy</td>
            <td>Pending</td>
            <td>2022.02.04</td>
            <td>-</td>
            <td>
                <select>
                    <option>Pending</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Declined">Declined</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Puppy</td>
            <td>Finished</td>
            <td>2022.11.10.</td>
            <td>***</td>
            <td>
                <select>
                    <option>Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Declined">Declined</option>
                </select>
            </td>
        </tr>
    </table>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php
