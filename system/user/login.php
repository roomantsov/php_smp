<?php
    if($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'){
        locate('view/main.php');   
    }
?>

<form action="" method="POST" role="form">
	<legend>Вход</legend>
    <div class="form-group">
		<label for="">Email</label>
		<input name="email" type="email" class="form-control" id="" placeholder="your@email.domain">
		<label for="">Password</label>
		<input name="password" type="password" class="form-control" id="" placeholder="Password">
	</div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>


<?php
    if(isset($_POST['email']) && isset($_POST['password'])){
        $user = mysqli_query($conn, 'SELECT * FROM users WHERE users.email = "'.$_POST['email'].'"');
        $user = mysqli_fetch_assoc($user);
        if($user === NULL){
            new_error(YELLOW, 'Такого почтового ящика не существует', 'Пожалуйста, зарегистрируйтесь');
            locate('index.php?request=system/user/register.php');
        } else if(crypt('solt', $_POST['password']) == $user['password']){
            new_error(GREEN, 'Здравствуйте, '.$user['nickname'], 'Вы успешно авторизовались');
            $_SESSION['role'] = $user['role'];
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['id'] = $conn->query("SELECT id FROM users WHERE email = '{$_POST['email']}'")->fetch_assoc()['id'];
            locate('index.php');
        } else {
            new_error(RED, 'Неверно введен пароль', 'Попробуйте еще раз');
            refresh('js');
        }
    }
?>