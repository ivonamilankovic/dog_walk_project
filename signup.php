<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Signup - Dog Walk</title>
</head>

<body>
<div class="header h-75">
    <header>
        <h1><a href="./home.php"><img src="images/pawwalks.svg" alt="PawWalks-logo" class="logo"></a></h1>
        <ul>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./signup.php">Signup</a></li>
        </ul>
    </header>
</div>

    <div class="container">
        <!--Form for signup-->
        <h1>Signup</h1>
        <!--this will be shown, and click on one of the buttons will open form-->
        <div id="chooseYourStatus" >
            <h3>Hello new user! Please select your status:</h3>
            <input type="radio" id="roleUser" name="user-type" checked>I'm a Regular user</input>
            <br>
            <input type="radio" id="roleWalker" name="user-type">I'm a Dog walker</input>
            <br>
        </div>
        <!--inputs for all the users-->
        <div id="inputsForEveryone">
            <input id="firstName" name="fname" type="text" placeholder="First name" required><br>
            <input id="lastName" name="lname" type="text" placeholder="Last name" required><br>
            <input id="email" name="email" type="email" placeholder="Email" required><br>
            <input id="pass1" name="pass1" type="password" placeholder="New password" minlength="6" maxlength="15" required><br>
            <input id="pass2" name="pass2" type="password" placeholder="Repeat password" minlength="6" maxlength="15" required><br>
            <input id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" minlength="10" required><br>
            <input id="address" name="address" type="text" placeholder="Address" required><br>
        </div>
        <small id="errorMsg"></small>
        <br>
        <button id="signupBtn" type="submit" name="submit" >Signup</button>
    </div>


    <script src="./script/signup.js"></script>
</body>

</html>