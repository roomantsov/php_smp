<?php
    $file = fopen('notes_dump.txt', 'r');
    $notes = json_decode(fread($file, filesize('notes_dump.txt')), true);
    fclose($file);

    $file = fopen('users_dump.txt', 'r');
    $users = json_decode(fread($file, filesize('users_dump.txt')), true);
    require 'db_connection.php';
    
    foreach($notes[0] as $note){
        $CONN->exec("INSERT INTO notes(id, title, content, image, author_id, date, access)
                    VALUES ('{$note['id']}','{$note['title']}',
                    '{$note['content']}','{$note['image']}',
                    '{$note['author_id']}','{$note['date']}','{$note['access']}')");
    }

    foreach($users[0] as $user){
        $CONN->exec("INSERT INTO users(id, email, nickname, password, role)
                    VALUES ('{$user['id']}','{$user['email']}',
                    '{$user['nickname']}','{$user['password']}','{$user['role']}')");
    }

echo '<script>alert("Success!\nDataBase is ready");</script>';
?>