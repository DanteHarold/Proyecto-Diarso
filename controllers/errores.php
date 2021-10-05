<?php
    class Errores extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje = "Error al Cargar el Recurso :(";
            $this->view->render('errores/index');
            //echo "<p>Error al Cargar Recurso</p>";
        }
    }

?>