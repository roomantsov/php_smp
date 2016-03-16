<?php
    $author_id = $conn->query('SELECT author_id FROM notes WHERE id = "'.$_GET['id'].'"')->fetch_assoc()['author_id'];
    if($author_id !== $_SESSION['id'] && $_SESSION['role'] !== 'admin'){
        locate('index.php?request=view/pages/notes.php');
        new_error(RED, 'Permission denied', 'You are not author of that note');
        exit();   
    }
    $note = $conn->query("SELECT * FROM notes WHERE id = {$_GET['id']}")->fetch_assoc();
?>
<form action="" method="POST" enctype="multipart/form-data" role="form">
	<legend>Изменить заметку</legend>

	<div class="form-group">
		<label for="">Название</label>
		<input name="title" type="text" class="form-control" id="" placeholder="Название" value="<?=$note['title']; ?>">
		<label for="">Содержание</label>
		<textarea name="content" rows="5" type="text" class="form-control" id="" placeholder="Содержание"><?=$note['content']; ?></textarea>
        <label><input name="access" type="checkbox"> Public</label>
		
	</div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $check = TRUE;
        if(!isset($_POST['title']) || empty($_POST['title'])){
            new_error(RED, 'Отсутствует заголовок', 'Пожалуйста добавьте заголовок');
            $check = FALSE;
        }
        if(!isset($_POST['content']) || empty($_POST['content'])){
            new_error(RED, 'Отсутствует контент', 'Пожалуйста добавьте контент');
            $check = FALSE;
        }
        
        if(!$check){
            refresh();
        } else {
            if (isset($_POST['access'])){
                $access = 'public';
            } else {
                $access = 'private';
            }
            $title = addslashes($_POST['title']);
            $content = addslashes($_POST['content']);
            }
            $conn->query("UPDATE notes SET title = '{$title}', content = '{$content}', access = '{$access}'
                        WHERE id = '{$_GET['id']}'");
            locate('index.php?request=view/pages/notes.php');
        
    }
?>
