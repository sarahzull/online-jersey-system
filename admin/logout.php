<?php
session_start();
if (isset($_SESSION["username"]))
{
    session_unset();
    session_destroy();
    echo "<script>
            alert('You have succesfully logged out');
            window.location.href='/account.php';
            </script>";
} else
{
    echo "<script>
    alert('No session exists or session is expired. Please login again');
    window.location.href='/account.php';
    </script>";
}