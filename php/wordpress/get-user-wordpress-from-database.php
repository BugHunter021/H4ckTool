<?php
$username = "DB_user";
$password = "DB_pas";
$database = "DB_name";

$mysqli = new mysqli("localhost", $username, $password, $database);

// $table_prefix = 'wp_'; *** Important *** Next line

$query = "SELECT * FROM wp_users";

echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["user_login"];


        echo $field1name.'<br />';
        echo $field2name.'<br />';
    }
$result->free();
}
