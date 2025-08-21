<?php include 'connection.php'?>
<?php
if (isset($_POST['update'])) {
    $new_username = $_POST['Username'];
    $new_password = $_POST['user_pass'];
    $old_username = $_POST['old_username'];  // This will hold the original username for the WHERE clause

    $update_query = "UPDATE userinfo SET Username='$new_username', user_pass='$new_password' WHERE Username='$old_username'";
    mysqli_query($con, $update_query);

    echo "Data updated successfully!";
}
?>

<!-- HTML form for updating -->
<form method="POST" action="">
    <input type="hidden" name="old_username" value="<?php echo $_GET['username']; ?>"> <!-- The original username -->
    Username: <input type="text" name="Username" value="">
    Password: <input type="text" name="user_pass" value="">
    <input type="submit" name="update" value="Update">
</form>