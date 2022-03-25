<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login - Dog Walk</title>
</head>

<body>
    <header>
        <h1><a href="./home.php"> <img src="images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></h1>
        <ul>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./signup.php">Signup</a></li>
        </ul>
    </header>


    <div>
        <!--Form for login-->
        <h1>Login</h1>
        <input id="uname" name="uname" type="email" placeholder="Email">
        <br>
        <input id="pass" name="pass" type="password" placeholder="Password">
        <br>
        <small id="errorMessage"></small>
        <br>
        <button id="loginBtn" type="submit">Login</button>
    </div>

    <script src="./script/login.js"></script>
</body>

</html>