<?php
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$username= isset($_POST['username']) ? $_POST['username']:'';
$email=isset($_POST['email']) ? $_POST['email']:'';
echo "recieved username:".htmlspecialchars($username)."<br>";
echo "recieved email:".htmlspecialchars($email);

// further processing, e.g. saving to a database.
}
else
{
echo "form not submitted via POST method.";
}
?>