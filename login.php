<?php
include "db.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();

// session save
$_SESSION['user'] = $row['name'];
$_SESSION['email'] = $row['email'];

echo "<script>alert('✅ Login Success'); window.location='dashboard.php';</script>";

} else {
    echo "<script>alert('❌ Invalid Login'); window.location='loginn.html';</script>";
}

}
?>