<?php
session_start();
include('config.php'); // Apni DB file ka naam check kar lein

if(isset($_POST['new_balance']) && isset($_SESSION['user_id'])){
    $u_id = $_SESSION['user_id'];
    $new_bal = mysqli_real_escape_string($con, $_POST['new_balance']);
    mysqli_query($con, "UPDATE users SET balance = '$new_bal' WHERE id = '$u_id'");
}
?>
