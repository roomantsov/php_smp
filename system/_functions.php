<?php
    function new_error($type, $title, $body){
        array_push($_SESSION['errors'], ['type' => $type, 'title' => $title, 'body' => $body]);
    };

    function refresh($type = 'php'){
        if(strtolower($type) === 'php'){
            header('Location: '.$_SERVER['REQUEST_URI']);
        } else{
            echo '<script type="text/javascript">
                document.location.href = "'.$_SERVER['REQUEST_URI'].'";
            </script>';
        }
    }

    function locate($url){
        echo '<script>document.location.href = "'.URL.'/'.$url.'"</script>';
    }
?>