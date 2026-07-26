<?php
include "db.php";

// error show
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// check empty
if(empty($name) || empty($email) || empty($password)){
    echo "❌ All fields required";
    exit();
}

// check duplicate email
$check = "SELECT * FROM students WHERE email='$email'";
$result = $conn->query($check);

if($result->num_rows > 0){
    echo "<script>alert('Email already exists'); window.location='register.html';</script>";
} else {

$sql = "INSERT INTO students (name,email,password)
VALUES ('$name','$email','$password')";

if($conn->query($sql)){
    echo "<script>alert('✅ Registered Successfully'); window.location='loginn.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

}
}
?>