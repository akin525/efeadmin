<?php
$dbname="test1";
$con = new mysqli("localhost", "root", "", "test1");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
?>
