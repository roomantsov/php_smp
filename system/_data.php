<?php
    if(!isset($_SESSION['role'])){ $_SESSION['role'] = 'guest'; };
    if(!isset($_SESSION['id'])){ $_SESSION['id'] = 'NULL'; };
    if(!isset($_SESSION['errors'])){ $_SESSION['errors'] = []; };
    
    const URL = '/note';
    //BS classes
    const WHITE = 'default';
    const DBLUE = 'primary';
    const GREEN = 'success';
    const LBLUE = 'info';
    const YELLOW = 'warning';
    const RED = 'danger';
?>