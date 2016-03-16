<?php
    header("Content-Type: text/html; charset=utf-8");

    require 'db_connection.php';
    $note_result = $CONN->query('SELECT * FROM notes');
    $user_result = $CONN->query('SELECT * FROM users');
    $notes = [];
    $users = [];

    while($note = $note_result->fetchAll(PDO::FETCH_ASSOC)){
        array_push($notes, $note);
    }

    while($user = $user_result->fetchAll(PDO::FETCH_ASSOC)){
        array_push($users, $user);
    }

    $file = fopen('notes_dump.txt', 'w');
    fwrite($file, json_encode($notes));
    fclose($file);

    $file = fopen('users_dump.txt', 'w');
    fwrite($file, json_encode($users));
    fclose($file);

echo '<script>alert("Success!\nDataBase successfully exported");</script>';
?>