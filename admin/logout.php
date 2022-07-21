<?php
session_start();
if (isset($_SESSION["id"]))
{   
    session_unset();
    session_destroy();
    echo "<script>
            alert('You have succesfully logged out');
            window.location.href='/login.php';
            </script>";
} else
{
    echo "<script>
    alert('No session exists or session is expired. Please login again');
    window.location.href='/login.php';
    </script>";
}