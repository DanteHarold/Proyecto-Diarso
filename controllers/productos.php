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
        function verProducto($param = null){
            $idProducto = $param[0];
            $producto = $this->model->getById($idProducto);
            $this->view->producto = $producto;

            //CARGA LOS DATOS DE FONDO
            $productos = $this->model->get();
            $this->view->datos = $productos;

            session_start();
            $_SESSION['id_producto'] =  $idProducto;
            $this->view->mensaje = "DETALLE DEL ALUMNO ".$_SESSION['id_producto'] ;
            
            $this->view->render('productos/consulta');
        }
        function actualizarProducto($param = null){
            
            $idProducto = $param[0];
            $producto = $this->model->getById($idProducto);
            $this->view->producto = $producto;

            //CARGA LOS DATOS DE FONDO
            $productos = $this->model->get();
            $this->view->datos = $productos;

            session_start();
            $_SESSION['id_producto'] =  $idProducto;
            $this->view->mensaje = "ACTUALIZANDO ALUMNO ".$_SESSION['id_producto'] ;

            $this->view->render('productos/editar');
        }
        function editarProducto(){
            session_start();
            $idProducto =  $_SESSION['id_producto'];
            $name =     $_POST['name'];
            $surname =  $_POST['surname'];
            $email =    $_POST['email'];

            if($this->model->update(['id'=>$idProducto,'name'=>$name,'surname'=>$surname,'email'=>$email])){
                
                $producto = new Producto();
                $producto->id = $idProducto;
                $producto->nombre = $name;
                $producto->apellido = $surname;
                $producto->email = $email;

                $this->view->producto = $producto;
                $this->view->mensaje = "actualizado correctamente";
            }else{
                $this->view->mensaje = "No actualizado";
            }

            $productos = $this->model->get();
            $this->view->datos = $productos;

            $this->view->render('productos/editar');

        }
        function eliminarProducto($param = null){
            $idProducto = $param[0];
            
            if($this->model->delete($idProducto)){
                $this->view->mensaje = "actualizado";
            }else{
                $this->view->mensaje = "No actualizado";
            }
            $productos = $this->model->get();
            $this->view->datos = $productos;
            $this->render();

        }
    }
?>