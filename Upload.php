<?php
$fn = $_POST['forename'];
if (isset($_POST['submit'])) {
    $forename = $_POST['forename'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    include_once "Login.php";
    $sql = "SELECT * FROM customer;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed!";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $sql = "INSERT INTO customer (forename, email, username, password) VALUES (?,?,?,?);";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $forename, $email, $username, $password);
            mysqli_stmt_execute($stmt);
            $forename = $_GET['forename'];
            setcookie("forename", $forename);
            $username = $_GET['username'];
            setcookie("username", $username);
            header("Location: ../welcome.php?upload=success");
        }
    }
}

?>