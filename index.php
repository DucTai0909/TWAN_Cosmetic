
<?php
            spl_autoload_register(function($class){
                include_once 'system/libs/'.$class.'.php';
            });
            include_once './Config/config.php';

            $main =new Main();
?> 
