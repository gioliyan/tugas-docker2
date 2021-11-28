<?php
echo "Hello there, this is a PHP Apache container<br>";

// The MySQL service named in the docker-compose.yml.
$host = '172.20.0.2';

// Database use name
$user = 'root';

//database user password
$pass = 'admin';

// database name
$mydatabase = 'php_user';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $mydatabase);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully! <br>";
}

// select query
$sql = 'SELECT * FROM users';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}
?>