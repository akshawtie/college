<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user  = $_POST["user"];
    $pass  = $_POST["pass"];
    $email = $_POST["email"];

    $sql = "INSERT INTO log (user, pass, email) VALUES ('$user', '$pass', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Spicify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-box {
            background: #222;
            padding: 20px;
            border-radius: 10px;
            width: 320px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.5);
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="signup-box">
        <h2>Sign Up</h2>
        <form method="POST">
  Username: <input type="text" name="user" required><br>
  Password: <input type="password" name="pass" required><br>
  Email: <input type="email" name="email" required><br>
  <input type="submit" value="Signup">
</form>
    </div>
</body>
</html>
