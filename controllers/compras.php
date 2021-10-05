<?php
    class Compras extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('compras/index');
        }
        //Metodos
    }


?>