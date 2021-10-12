<?php
    class Productos extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('productos/index');
        }
        function registrarProducto(){
            $name =     $_POST['name'];
            $surname =  $_POST['surname'];
            $email =    $_POST['email'];
            
            if($this->model->insert(['name'=> $name , 'surname' => $surname , 'email'=> $email])){

                echo "Producto Agregado";
            }else{
                echo "Producto No Agregado!";
            }

        }
    }


?>