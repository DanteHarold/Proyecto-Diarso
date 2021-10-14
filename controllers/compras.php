<?php
    class Compras extends Controller{

        function __construct(){
            parent::__construct();
        }
        function render(){
            $this->view->render('compras/index');
        }
        //Metodos
    }


?>