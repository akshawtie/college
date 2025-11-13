<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM log WHERE user='$user' AND pass='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["user"] = $user;

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            echo json_encode(["status" => "success"]);
            exit;
        } else {
            header("Location: htmm/MusicSite.html");
            exit;
        }
    } else {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            echo json_encode(["status" => "error", "message" => "Invalid username or password!"]);
            exit;
        } else {
            $error_message = "Invalid username or password!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 

<link rel="stylesheet" href="htmm/musicA1.css">
    <link rel="icon" href="htmm/r/mikuu.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/pixelify-sans" rel="stylesheet">
    <title>Spicify - Login</title>
    <style>
        body {
            font-family: 'Pixelify Sans';
            color: #eee;
            height: 100vh;
            margin-top:3%;
            background-image: url('bg2.png'); 
            background-repeat: no-repeat;             
            background-size: cover;                   
            background-position: center;              
            background-attachment: fixed;             
        }
        body::before {
  content: "";
  position: fixed; /* fixed = covers the entire viewport */
  inset: 0; /* shorthand for top:0; right:0; bottom:0; left:0 */
  background: url('bg2.png') center/cover no-repeat;
  filter: blur(10px);        /* 🔹 main blur effect */
  transform: scale(1);     /* prevents edge clipping */
  z-index: -1;               /* keeps it behind all content */
}
        .login-box {
            background: #222;
            font-family: 'Pixelify Sans';
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.5);
        }
        input {
            width: 95%;
            font-family: 'Pixelify Sans';
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #28a745;
            font-family: 'Pixelify Sans';
            color: white;
            width:50%;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
            font-family: 'Pixelify Sans';
        }
        .error {
            color: #ff4c4c;
            margin-bottom: 10px;
        }
        .mainvi{
            width:100%;
            height:100%;
            display:flex;
            justify-content:center;
            align-items:center;            /* keeps it fixed when scrolling */
        }


.login-box {
  position: absolute;
  z-index: 1;
  background: rgba(0, 0, 0, 0.6);
  padding: 20px;
  top:33%;
  left:40%;
  border-radius: 10px;
  color: white;
  backdrop-filter: blur(4px); 
.navbar {
    z-index: 10;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 25px;
  color: #c922d5;
  

    background-color: rgba(0, 0, 0, 0);
    padding:0px 0px;
}
.nav-left a{
  font-size: 2.4em;
  text-decoration: none;
  color:#f1cdf4;
  font-family: 'Pixelify Sans', sans-serif;
                                                
}
.nav-right a {
    font-size: 1.5em;
    text-decoration: none;
    font-family: 'Pixelify Sans', sans-serif;
                                                
  color: #f1cdf4;
    font-weight: bold;
    margin-right: 20px;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-left">
            <a href="MusicSite.html" class="main_logo"> <img src="htmm/r/mikuu.png" class="melody2_img"> Spicify</a>
        </div>
               <label class="search-label">
    <input type="text" name="text" class="input" required="" placeholder="Search Your Music...    ">
    <kbd class="slash-icon">/</kbd>
    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 512 512" xml:space="preserve">
      <g>
        <path d="M55.146 51.887 41.588 37.786A22.926
         22.926 0 0 0 46.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 0 0 .083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626
          17-17 17-17-7.626-17-17 7.626-17 17-17z" fill="currentColor" data-original="#000000" class=""></path>
      </g>
    </svg>
  </label>


        <div class="nav-right">
            <a><img src="home icon.png" class="melody_img">Home</a>
            <a><img src="contact.png" class="melody_img">Profile</a>
        </div>
        
       
    </div>
    <hr>
    <div class="mainvi">
    <div class="login-box">
        <h2>Login</h2>
        <?php if (!empty($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <input type="submit" value="Login">
        </form>
        <form method="GET" action="signup.php">
            <input type="submit" value="Sign Up">
        </form>
    </div>
        </div>
        <script>
document.querySelector("form[method='POST']").addEventListener("submit", async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch("login.php", {
        method: "POST",
        body: formData,
        headers: { "X-Requested-With": "XMLHttpRequest" }
    });
    const result = await response.json();
    if (result.status === "success") {
        window.location.href = "htmm/MusicSite.html";
    } else {
        document.querySelector(".error").textContent = result.message;
    }
});
</script>

</body>
</html>
