<?php
// change the information according to your database
$conn = mysqli_connect("localhost","root","","homeshoppee");
// CHECK DATABASE CONNECTION
if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
}