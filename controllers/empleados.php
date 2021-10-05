<?php
    class Empleados extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('empleados/index');
        }
        //Metodos
    }


?>