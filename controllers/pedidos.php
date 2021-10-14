<?php
    class Pedidos extends Controller{

        function __construct(){
            parent::__construct();
        }
        function render(){
            $this->view->render('pedidos/index');
        }
        //Metodos
    }


?>