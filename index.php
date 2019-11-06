<?php
    session_start();
    
    include_once 'layout/header.php' ; # не підключить 2 рази файл
    include_once 'layout/menu.php' ;
    

    if(isset($_GET["action"]))
        $valueAction = $_GET["action"];
    else    
        $valueAction="main";

    $pathFile = 'views/'.$valueAction.'.php';
    if (file_exists($pathFile)) {
        include_once $pathFile;
    }
    else {
        include_once 'views/main.php';
    }

    # include_once 'views/main.php';
    include_once 'layout/footer.php' ;

    # 7 варіант
?>

    

   
        
    