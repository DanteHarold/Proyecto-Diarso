<?php
    require_once 'controllers/errores.php';
    class App{
        function __construct(){
            //echo "<p>Nueva APP</p>";
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            //echo $url;
            $url = rtrim($url,'/');
            $url = explode('/',$url);
            //var_dump($url);
            //Cuando se Ingresa sin definir Controlador
            if(empty($url[0])){
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }
            
            $archivoController = 'controllers/'.$url[0].'.php';
            
            if(file_exists($archivoController)){

                require_once $archivoController;
                //inicializa Controlador
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                //Si hay método que se requiere cargar
                if(isset($url[1])){
                    //Llama al metódo -> convierte a metodo
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }
            }else{        
                $controller = new Errores();
            }

        }
    }
?>