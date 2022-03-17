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
    <header>
        <h1><a href="./home.php">Dog Walk</a></h1>
        <ul>
            <li><a href="./allwalkers.php">All Walkers</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./signup.php">Signup</a></li>
        </ul>
    </header>

    <div class="container">
        <!--Form for signup-->
        <h1>Signup</h1>
        <!--this will be shown, and click on one of the buttons will open form-->
        <div id="chooseYourStatus" class="show">
            <h3>Hello new user! Please select your status:</h3>
            <button id="roleUser" name="regular-user">I'm a Regular user</button>
            <button id="roleWalker" name="dog-walker">I'm a Dog walker</button>
            <br>
        </div>
        <!--this part will show for both types of users-->
        <button id="back" class="dontShow">Go Back</button>
        <div id="inputsForEveryone" class="dontShow">
        <input id="firstName" name="fname" type="text" placeholder="First name" required><br>
        <input id="lastName" name="lname" type="text" placeholder="Last name" required><br>
        <input id="email" name="email" type="email" placeholder="Email" required><br>
        <input id="pass1" name="pass1" type="password" placeholder="New password" minlength="6" maxlength="15" required><br>
        <input id="pass2" name="pass2" type="password" placeholder="Repeat password" minlength="6" maxlength="15" required><br>
        <input id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" minlength="10" required><br>
        <input id="address" name="address" type="text" placeholder="Address" required><br>
        <!--this part will show just if user selects choose to be a dog walker-->
        </div>
        <div id="inputsForWalkers" class="dontShow">
            <input id="favBreed" name="favBreed" type="text" placeholder="Your favourite breed of dog" required><br>
            <textarea id="description" name="description" placeholder="Your short biography" rows="10" cols="40" required></textarea><br>
            <label for="picture">Your picture:</label>
            <input id="picture" name="picture" type="file" accept="image/*" required><br>
        </div>
        <small id="errorMsg"></small>
        <br>
        <button id="signupBtn" class="dontShow" type="submit">Signup</button>
    </div>


    <script src="./script/signup.js"></script>
</body>

</html>