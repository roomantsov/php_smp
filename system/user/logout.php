<?php
    if($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')
        session_destroy();
    locate('index.php');
?>