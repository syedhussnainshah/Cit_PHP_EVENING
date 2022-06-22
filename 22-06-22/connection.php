<?php
$dbname = 'cit_web_evening';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn) {
    echo "Connected";
} else {
    echo "Not Connected";
}
