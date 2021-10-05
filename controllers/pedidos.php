<?php
    class Pedidos extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('pedidos/index');
        }
        //Metodos
    }


?>