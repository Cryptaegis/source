<?php
session_start();

if(isset($_SESSION['user_id'])) {
    header("Location: mission.php");
    exit;
}

if(isset($_POST['submit'])) {
    require_once 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: mission.php");
            exit;
        } else {
            $error_msg = "Invalid password";
        }
    } else {
        $error_msg = "Invalid username";
    }
}

?>

<!-- FILEPATH: /login.html -->
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" name="submit" value="Login">
</form>

<!-- FILEPATH: /Accueil.html -->
<form action="mission.php" method="post">
    <label for="mission_name">Mission Name:</label>
    <input type="text" id="mission_name" name="mission_name" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>

    <input type="submit" value="Create Mission">
</form>
