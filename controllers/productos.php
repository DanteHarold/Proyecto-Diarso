<?php
    class Productos extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('productos/index');
        }
        //Metodos
    }


?>