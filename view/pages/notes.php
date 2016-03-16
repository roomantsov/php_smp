<?php
    //Узнаем количество заметок
    $public = $conn->query('SELECT COUNT(*) FROM notes WHERE access = "public"')->fetch_array()[0];
    $private = $conn->query("SELECT COUNT(*) FROM notes WHERE author_id = '{$_SESSION['id']}'")->fetch_array()[0];
?>
   

    <ul class="nav nav-pills">
        <li <?php if(!isset($_GET['access']) || $_GET['access'] !== 'private') echo 'class="active"'; ?>>
            <a href="index.php?request=view/pages/notes.php&access=public">
                Общие заметки <span class="badge"><?=$public; ?></span>
            </a>
        </li>
        <li <?php if(isset($_GET['access']) && $_GET['access'] == 'private') echo 'class="active"'; ?>>
            <a href="index.php?request=view/pages/notes.php&access=private">
                Мои заметки<span class="badge"><?=$private; ?></span>
            </a>
        </li>
    </ul>
    <div class="row masonry" data-columns>
       <?php
        $all_notes = [];
        if(isset($_GET['access']) && $_GET['access'] == 'private'){
            $notes = $conn->query("SELECT * FROM notes WHERE notes.author_id = '{$_SESSION['id']}'");
        } else {
            $notes = $conn->query("SELECT * FROM notes WHERE notes.access = 'public'");
        }
        while($note = mysqli_fetch_assoc($notes)){
            $all_notes[] = $note;
        }
        $notes = $all_notes;
        ?>
        <?php //Вывод записей
            foreach($notes as $note):
        ?>
        <div class="item">
            <div class="thumbnail">
                 <img src="<?=$note['image']; ?>" class="img-responsive" alt="">
                 <div class="caption">
                    <h3><a href="#"><?=$note['title']; ?></a></h3>
                    <p><?=$note['content']; ?></p>
                    <?php if($note['author_id'] == $_SESSION['id'] || $_SESSION['role'] == 'admin'): ?>
                    <a href="index.php?request=view/pages/change_note.php&id=<?=$note['id']; ?>" class="btn btn-success">Изменить</a>
                    <a href="index.php?request=view/pages/delete_note.php&id=<?=$note['id']; ?>" class="btn btn-danger">Удалить</a>
                    <?php endif; ?>
                 </div><!--/.caption-->
            </div><!--/.thumbnail-->
        </div><!--/.item-->
        <?php
            endforeach;
        ?>
    </div><!--/.masonry-->
    <!--PAGER-->
    <!--/PAGER-->


<!--Разпределение по $_GET['access'] = publick/private;-->