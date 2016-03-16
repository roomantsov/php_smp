<?php
    require 'db_connection.php';
    $CONN->exec('CREATE TABLE
    users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL UNIQUE,
        nickname TEXT NOT NULL,
        password TEXT NOT NULL,
        role TEXT NOT NULL,
        PRIMARY KEY(id)
    )');
    $CONN->exec('CREATE TABLE
    notes (
        id INT NOT NULL AUTO_INCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        image TEXT NOT NULL,
        author_id TEXT NOT NULL,
        date TEXT NOT NULL,
        access TEXT NOT NULL,
        PRIMARY KEY(id)
    )');

echo '<script>alert("Success!\nAll tables are set");</script>';
?>