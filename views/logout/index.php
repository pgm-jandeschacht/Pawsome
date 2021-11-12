<?php
    session_start();
    session_destroy();

    header('location: login');
?>

<h1>Log out</h1>