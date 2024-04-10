<?php
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    include 'dbconnect.php';
    $sql = "select * from students where email='" . $email . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists";
    } else {
        $filename = $_FILES["image"]["name"];
        $filename = time() . $filename;
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = './images/' . $filename;
        $sql = "insert into students(name,email,phone,password,imgpath) values ('" . $name . "','" . $email . "','" . $phone . "', '" . $_POST['password'] . "','" . $filename . "')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($tempname, $folder)) {
            header('location:login.php');
            exit;
        } else {
            header('location:registration.php');
            exit;
        }
    }
}
