<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    // If password is not empty, update it
    if ($password != '') {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($db, "UPDATE user SET username='$username', role='$role', password='$password' WHERE id='$id'");
    } else {
        $query = mysqli_query($db, "UPDATE user SET username='$username', role='$role' WHERE id='$id'");
    } {
        // Update without changing the password
        $stmt = $db->prepare("UPDATE user SET username=?, role=? WHERE id=?");
        $stmt->bind_param("ssi", $username, $role, $id);
    }

    if ($query) {
        header("Location: daftarpengguna.php"); // Redirect to the account list page
    } else {
        echo "Error updating user";
    }
}
?>