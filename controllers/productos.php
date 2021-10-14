<?php
    class Productos extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->datos = [];
        }
        function render(){
            //$productos = $this->view->datos = $this->model->get();
            $productos = $this->model->get();
            $this->view->datos = $productos;
            
            $this->view->render('productos/index');
        }
        function registrarProducto(){
            $name =     $_POST['name'];
            $surname =  $_POST['surname'];
            $email =    $_POST['email'];
            
            $mensaje = "";

            if($this->model->insert(['name'=> $name , 'surname' => $surname , 'email'=> $email])){

                $mensaje = "Producto Agregado";
            }else{
                $mensaje = "Producto No Agregado!";
            }

            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }


?>