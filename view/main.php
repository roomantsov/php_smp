</div> <!--For accessable include-->
     <div class="jumbotron">
      <div class="container">
        <h1>EasyNote <i class="fa fa-gg"></i></h1>
        <p>Уникальный сервис заметок. Вы можете оставлять как личные заметки, напоминания, записи, задания; так и выражать идеи и мысли в общий доступ в реальном времени</p>
        <?php if($_SESSION['role'] === 'guest'): ?>
        <p><a class="btn btn-primary btn-lg" href="index.php?request=system/user/register.php" role="button">Начать сейчас &raquo;</a></p>
        <?php endif; ?>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Добавление</h2>
          <p>Сервис обеспечивает простое добавление записей, полностью адаптированный и удобный для пользователя интерфейс </p>
          <?php if($_SESSION['role'] !== 'guest'): ?>
          <p><a class="btn btn-success" href="index.php?request=view/pages/add_note.php" role="button">Добавить &raquo;</a></p>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <h2>Просмотр</h2>
          <p>Интуитивно понятный и доступный инерфейс позволит быстро найти нужные заметки и быть всегда в курсе своих задач. Мы поможем вам быть ответственным </p>
          <?php if($_SESSION['role'] !== 'guest'): ?>
          <p><a class="btn btn-primary" href="index.php?request=view/pages/notes.php" role="button">К записям &raquo;</a></p>
          <?php endif; ?>
       </div>
        <div class="col-md-4">
          <h2>Безопасность</h2>
          <p>Безопасность ваших личных данных гарантированна, к ней открыт доступ только вам и никому больше. Все пароли переданы в зашифрованном формате и не доступны никому. Общедоступные записи всегда находятся под модеррацией дабы противостоять разрозненности в нашем сервисе.</p>
          <?php if($_SESSION['role'] !== 'guest'): ?>
          <p><a class="btn btn-warning" href="index.php?request=view/pages/rights.php" role="button">Все правила здесь &raquo;</a></p>
          <?php endif; ?>
        </div>
      </div>
      
      <hr>
      
      
      <h1>Latest notes</h1>
      <div class="row masonry mass" data-columns>
       <?php
        $all_notes = $conn->query("SELECT * FROM notes WHERE access = 'public' ORDER BY id DESC LIMIT 8");
        $notes = [];
          while($note = $all_notes->fetch_assoc()){
              $notes[] = $note;
          }
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

      <hr>

      <footer>
        <b><p>&copy; Kyrylo Romantsov 2016</p></b>
      </footer>
    </div>
<div> <!--For accessable include-->