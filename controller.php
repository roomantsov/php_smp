<?php
    session_start();
    require 'system/_db.php';
    require 'system/_data.php';
    require 'system/_functions.php';
    
    $request = $_SERVER['REQUEST_URI'];
    $REQUEST = '';
    switch($request){
        case URL."/intro":
            $REQUEST = 'view/main.php';
            break;
        case URL."/notes":
            $REQUEST = "view/pages/notes.php";
            break;
        case URL."/login":
            $REQUEST = "system/user/login.php";
            break;
        case URL."/registration":
            $REQUEST = "system/user/register.php";
            break;
        case URL."/logout":
            $REQUEST = "system/user/logout.php";
            break;
        case URL."/addnote":
            $REQUEST = "view/pages/add_note.php";
            break;
        case URL."/delete":
            $REQUEST = "";
            break;
        case URL."":
            $REQUEST = "";
            break;
        case URL."":
            $REQUEST = "";
            break;
        case URL."":
            $REQUEST = "";
            break;
        case URL."":
            $REQUEST = "";
            break;
            
        default:
            $REQUEST = "404.php";
            break;
    }

//    echo '<script>alert("'.$REQUEST.'");</script>';
?>