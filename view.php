<?php
include("config.php");

// Fetch all records from the log table
$sql = "SELECT user, pass, email FROM log";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Database - Spicify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            background: #222;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.6);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #007bff;
        }
        a {
            color: #00aaff;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>User List</h2>

    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['user']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pass']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>

    <a href="signup.php">← Go back to Sign Up</a>
</body>
</html>
