<?php
    $author_id = $conn->query('SELECT author_id FROM notes WHERE id = "'.$_GET['id'].'"')->fetch_assoc()['author_id'];
if($author_id == $_SESSION['id'] || $_SESSION['role'] == 'admin'){
    $conn->query("DELETE FROM notes WHERE id = '{$_GET['id']}'");
    locate('index.php?request=view/pages/notes.php');
} else {
    locate('index.php?request=view/pages/notes.php');
    new_error(RED, 'Permission denied', 'You are not author of that note');
}
?>