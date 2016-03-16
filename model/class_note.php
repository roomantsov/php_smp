<?php
    class Note{
        function __construct($title, $content, $image, $author_id, $access){
            $conn = mysqli_connect('localhost', 'root', '', 'note');
            mysqli_set_charset($conn, 'utf8');
            mysqli_query($conn , 'INSERT INTO notes(title, content, image, author_id, date, access) 
            VALUE ("'.$title.'","'.$content.'","'.$image.'","'.$author_id.'","'.date('d/m/Y').'","'.$access.'")');
        }
    }
?>