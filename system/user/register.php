<?php
    if(isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['password'])){
        $_POST['password'] = crypt('solt', $_POST['password']);
        $_POST['email'] = addslashes($_POST['email']);
        $_POST['password'] = addslashes($_POST['password']);
        $_POST['nickname'] = addslashes(mb_strtoupper(mb_substr($_POST['nickname'], 0, 1)).mb_strtolower(mb_substr($_POST['nickname'], 1, mb_strlen($_POST['nickname'])-1)));
        mysqli_query($conn, "INSERT INTO users(nickname, email, password, role) 
                    VALUES ('{$_POST['nickname']}','{$_POST['email']}','{$_POST['password']}' , 'user')");
        if(mysqli_error($conn) == "Duplicate entry '{$_POST['email']}' for key 'email'"){
            new_error(RED, 'Такой почтовый ящик уже существует', 'Если у вас нет доступа к аккаунту, воспользуйтесь восстановлением пароля');  
            refresh();
            exit();
        }
        $_SESSION['role'] = 'user';
        $_SESSION['nickname'] = $_POST['nickname'];
        $_SESSION['id'] = $conn->query("SELECT id FROM users WHERE email = '{$_POST['email']}'")->fetch_assoc()['id'];
        new_error(GREEN, 'Здравствуйте, '.$_POST['nickname'], 'Вы успешно зарегистрировались');
        header('Location: '.URL);
    }
?>


<form action="" method="POST" role="form">
	<legend>Регистрация</legend>

	<div class="form-group">
		<label for="">Имя на сайте:</label>
		<input name="nickname" required type="text" pattern="[A-Za-zА-Яа-я-_\.]*" class="form-control" id="" placeholder="name">
		<label for="">Email:</label>
		<input name="email" required type="email" class="form-control" id="" placeholder="example@example.com">
		<label for="">Password:</label>
		<input name="password" required type="password" class="form-control" id="" placeholder="••••••••••••">
		
	</div>



	<button id="user" type="submit" class="btn btn-primary">Submit</button>
</form>
