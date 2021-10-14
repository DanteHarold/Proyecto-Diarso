<?php
    class Empleados extends Controller{

        function __construct(){
            parent::__construct();
        }
        function render(){
            $this->view->render('empleados/index');
        }
        //Metodos
    }


?>