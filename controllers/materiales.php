<?php
    class Materiales extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('materiales/index');
        }
        //Metodos
    }


?>