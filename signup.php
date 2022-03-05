<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div>
        <!--Form for signup-->
        <h1>Signup</h1>
        <label>Status:</label>
        <input id="roleUser" name="role" type="radio" value="Regular user" checked>
        <label for="roleUser">Regular user</label>
        <input id="roleWalker" name="role" type="radio" value="Dog walker">
        <label for="roleWalker">Dog walker</label>
        <br>
        <!--this part will showfor both types of users-->
        <input id="fname" name="fname" type="text" placeholder="First name" required><br>
        <input id="lname" name="lname" type="text" placeholder="Last name" required><br>
        <input id="email" name="email" type="email" placeholder="Email" required><br>
        <input id="fname" name="fname" type="text" placeholder="First name" required><br>
        <input id="pass1" name="pass1" type="password" placeholder="New password" minlength="6" maxlength="15"
            required><br>
        <input id="pass2" name="pass2" type="password" placeholder="Repeat password" minlength="6" maxlength="15"
            required><br>
        <input id="fname" name="fname" type="text" placeholder="First name" required><br>
        <input id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" minlength="10" required><br>
        <input id="address" name="address" type="text" placeholder="Address" required><br>
        <!--this part will show just if user selects that he is dog walker-->
        <div id="signupWalker">
            <input id="favBreed" name="favBreed" type="text" placeholder="Your favourite breed of dog" required><br>
            <label for="picture">Your picture:</label>
            <input id="picture" name="picture" type="file" accept="image/*"><br>
            <textarea id="description" name="description" placeholder="Your short biography" rows="10"
                cols="40"></textarea><br>
        </div>
        <button id="signupBtn" type="submit">Signup</button>
    </div>


</body>

</html>