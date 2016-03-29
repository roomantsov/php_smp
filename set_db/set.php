<?php
    require 'db_connection.php';
    $CONN->exec('CREATE TABLE
    users (
        id SMALLINT NOT NULL AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL UNIQUE,
        nickname TEXT NOT NULL,
        password TEXT NOT NULL,
        role VARCHAR(10) NOT NULL,
        PRIMARY KEY(id)
    )');
    $CONN->exec('CREATE TABLE
    notes (
        id SMALLINT NOT NULL AUTO_INCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        image TEXT NOT NULL,
        author_id TINYINT NOT NULL,
        date VARCHAR(11) NOT NULL,
        access VARCHAR(8) NOT NULL,
        PRIMARY KEY(id)
    )');

echo '<script>alert("Success!\nAll tables are set");</script>';
?>
