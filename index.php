<?php
    header("Content-Type: text/html; charset=utf-8");
    require 'controller.php';
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>NOTES</title>

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" media="screen" href="<?= URL;?>/view/css/bootstrap.css">
        <link rel="stylesheet" href="<?= URL;?>/view/css/font-awesome.css">
		<link rel="stylesheet" href="<?= URL;?>/view/css/style.css" />
		<link rel="shortcut icon" href="<?= URL;?>/view/images/system/medical.png" type="image/png">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body onload="appear();">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?request=view/main.php">EasyNote</a>
            </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                   <?php if($_SESSION['role'] != 'guest'): ?>
                    <li><a href="index.php?request=view/pages/notes.php">Заметки</a></li>
                    <li><a href="index.php?request=view/pages/add_note.php">Добавить заметку</a></li>
                   <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <?php if($_SESSION['role'] === 'guest'): ?>
                    <li><a href="index.php?request=system/user/login.php">Вход</a></li>
                    <li><a href="index.php?request=system/user/register.php">Регистрация</a></li>
                   <?php else: ?>
                     <li><a href="#">Привет, <?=$_SESSION['nickname']; ?></a></li>
                     <li><a href="index.php?request=system/user/logout.php">Выход</a></li>
                   <?php endif;?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <nav class="navbar navbar-inverse" role="navigation">
        </nav>
           <div class="error_box">
                <?php for($i = 0; $i < count($_SESSION['errors']); $i++): ?>
                <div class="alert alert-<?=$_SESSION['errors'][$i]['type'] ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                    <strong><?=$_SESSION['errors'][$i]['title'] ?>! </strong> <?=$_SESSION['errors'][$i]['body'] ?>
                </div>
                <?php 
                    endfor;
                    $_SESSION['errors'] = [];
                ?>
           </div><!--/error box-->
        <div class="container">
        <?php
            if((isset($_GET['request']) && $_SESSION['role'] !== 'guest') || 
               (isset($_GET['request']) && ($_GET['request'] == 'system/user/register.php' || $_GET['request'] == 
                                            'system/user/login.php') && $_SESSION['role'] == 'guest')){
                include $_GET['request'];
            } else {
                include 'view/main.php';
            }
        ?>
        
        </div><!--/container-->

    <script src="<?= URL;?>/view/js/jquery.min.js"></script>
    <script src="<?= URL;?>/view/js/bootstrap.js"></script>
    <script src="<?= URL;?>/view/js/salvattore.min.js"></script>
    <script src="<?= URL;?>/view/js/custom.js"></script>
    <script>
        
    </script>
	</body>
</html>
