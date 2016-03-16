<form action="" method="POST" enctype="multipart/form-data" role="form">
	<legend>Добавить заметку</legend>

	<div class="form-group">
		<label for="">Название</label>
		<input name="title" type="text" class="form-control" id="" placeholder="Название">
        <label for="">Изображение</label>
		<input name="image" type="file" class="form-control" id="" placeholder="">
		<label for="">Содержание</label>
		<textarea name="content" rows="5" type="text" class="form-control" id="" placeholder="Содержание"></textarea>
        <label><input name="access" class="" type="checkbox"> Public</label>
		
	</div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php
    require 'model/class_note.php';
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
        if(!is_uploaded_file($_FILES['image']["tmp_name"])){
            new_error(RED, 'Отсутствует Изображение', 'Пожалуйста добавьте Изображение');
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
            if (is_uploaded_file($_FILES['image']['tmp_name'])){
                $name = 'view/images/'.uniqid().substr($_FILES['image']['name'], -4);
                move_uploaded_file ( $_FILES['image']['tmp_name'] ,$name );
                $image = $name;
            }
            $image = addslashes($image);
            $author_id = addslashes($_SESSION['id']);
            new Note($title, $content, $image, $author_id, $access); //in class_note.php
        }
    }
?>
