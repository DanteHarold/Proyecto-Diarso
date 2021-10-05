<?php
    class Proveedores extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('proveedores/index');
        }
        //Metodos
    }


?>